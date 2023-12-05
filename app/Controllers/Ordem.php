<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ordem extends BaseController
{
    private $ordemModel;

    public function __construct()
    {
        $this->ordemModel = new \App\Models\OrdemModel();
        $this->pecasModel = new \App\Models\PecasModel();
        $this->servicosModel = new \App\Models\ServicosModel();
    }

    public function index()
    {
        return view('ordem', [
            'ordem' => $this->ordemModel->paginate(10),
            'pager' => $this->ordemModel->pager
        ]);
    }

    public function delete($id)
    {
        $this->ordemModel->delete($id);
        return redirect()->to('/ordem');
    }

    public function create()
    {
        return view('formordem');
    }

    public function store()
{
    $ordemId = $this->request->getPost('id');

    $dataOrdem = [
        'carro' => $this->request->getPost('carro'),
        'descricao' => $this->request->getPost('descricao'),
    ];

    if (empty($ordemId)) {
        $ordemId = $this->ordemModel->insert($dataOrdem);
    } else {
        $this->ordemModel->update($ordemId, $dataOrdem);
    }

    $pecasIds = $this->request->getPost('pecas');
    $quantidadesPecas = $this->request->getPost('quantidade_peca'); 

    if (!empty($pecasIds)) {
        $this->ordemModel->salvarPecasOrdem($ordemId, $pecasIds, $quantidadesPecas);
    }

    $servicosIds = $this->request->getPost('servicos');
    if (!empty($servicosIds)) {
        $this->ordemModel->salvarServicosOrdem($ordemId, $servicosIds);
    }

    return redirect()->to('/ordem');
}


    


    public function edit($id)
    {
        $ordem = $this->ordemModel->find($id);
        $pecas = $this->ordemModel->getPecasOrdem($id);
        $servicos = $this->ordemModel->getServicosOrdem($id);
    
        $pecasSelecionadas = array_column($pecas, 'peca_id');
        $servicosSelecionados = array_column($servicos, 'servico_id');
    
        return view('formordem', [
            'ordem' => $ordem,
            'pecas' => $this->ordemModel->obterPeca(),
            'servicos' => $this->ordemModel->obterServico(),
            'pecasSelecionadas' => $pecasSelecionadas,
            'servicosSelecionados' => $servicosSelecionados,
        ]);
    }
    
}
