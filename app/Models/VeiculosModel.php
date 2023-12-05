<?php

namespace App\Models;

use CodeIgniter\Model;

class VeiculosModel extends Model
{
    protected $table            = 'veiculos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
    'marca',
    'modelo',
    'problema',
    'placa',
    'cliente'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function obterClientes()
    {
        $clienteModel = new \App\Models\ClienteModel();
        return $clienteModel->findAll();
    }

}
