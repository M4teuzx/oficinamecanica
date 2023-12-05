<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdemModel extends Model
{
    protected $table            = 'ordem';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['carro', 'descricao'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function salvarPecasOrdem($ordemId, $pecasIds, $quantidadesPecas)
{
    $data = [];
    foreach ($pecasIds as $pecaId) {
        $data[] = [
            'ordem_id' => $ordemId,
            'peca_id' => $pecaId,
            'quantidade' => $quantidadesPecas[$pecaId],
        ];
    }
    $this->db->table('peca_ordemdeservico')->insertBatch($data);
}


    public function salvarServicosOrdem($ordemId, $servicosIds)
    {
        $data = [];
        foreach ($servicosIds as $servicoId) {
            $data[] = ['ordem_id' => $ordemId, 'servico_id' => $servicoId];
        }
        $this->db->table('servico_ordemdeservico')->insertBatch($data);
    }

    public function getPecasOrdem($ordemId)
    {
        return $this->db
            ->table('peca_ordemdeservico po')
            ->distinct()
            ->select('p.*')
            ->join('pecas p', 'po.peca_id = p.id')
            ->where('po.ordem_id', $ordemId)
            ->get()
            ->getResultArray();
    }


    public function getServicosOrdem($ordemId)
    {
        return $this->db
            ->table('servico_ordemdeservico po')
            ->distinct()
            ->select('s.*')
            ->from('servico_ordemdeservico so')
            ->join('servico s', 'so.servico_id = s.id')
            ->where('so.ordem_id', $ordemId)
            ->get()
            ->getResultArray();
    }

    public function obterPeca()
    {
        $pecasModel = new \App\Models\PecasModel();
        return $pecasModel->findAll();
    }

    public function obterServico()
    {
        $servicoModel = new \App\Models\ServicosModel();
        return $servicoModel->findAll();
    }

    public function findAll(int $limit = 0, int $offset = 0)
{
    $ordens = parent::findAll($limit, $offset);
    
    foreach ($ordens as &$ordem) {
        $ordem['servicos'] = $this->getServicosOrdem($ordem['id']);
        $ordem['pecas'] = $this->getPecasOrdem($ordem['id']);
    }

    return $ordens;
}

public function calcularValorTotalPecas($ordemId)
    {
    
        $query = $this->db->table('peca_ordemdeservico po');
        $query->select('po.*, p.preco');
        $query->join('pecas p', 'p.id = po.peca_id');
        $query->where('po.ordem_id', $ordemId);
        $pecas = $query->get()->getResultArray();

        $totalPecas = array_reduce($pecas, function ($acc, $peca) {
            return $acc + ($peca['preco'] * $peca['quantidade']);
        }, 0);

        return $totalPecas;
    }

    public function calcularValorTotalServicos($ordemId)
{
    $query = $this->db->table('servico_ordemdeservico so');
    $query->select('so.*, s.preco');
    $query->join('servico s', 's.id = so.servico_id');
    $query->where('so.ordem_id', $ordemId);
    $servicos = $query->get()->getResultArray();

    $totalServicos = array_reduce($servicos, function ($acc, $servico) {
        return $acc + $servico['preco'];
    }, 0);

    return $totalServicos;
}


}
