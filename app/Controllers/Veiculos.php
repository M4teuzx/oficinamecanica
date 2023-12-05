<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Veiculos extends BaseController
{
    private $veiculosModel;

    public function __construct()
    {
        $this->veiculosModel = new \App\Models\VeiculosModel();
    }

    public function index()
    {
         $veiculos = $this->veiculosModel->paginate(10);

         foreach ($veiculos as &$veiculo) {
             $clienteModel = new \App\Models\ClienteModel();
             $cliente = $clienteModel->find($veiculo['cliente']);
             $veiculo['nome_cliente'] = $cliente ? $cliente['nome'] : '';
         }
 
         return view('veiculos', [
             'veiculos' => $veiculos,
             'pager' => $this->veiculosModel->pager
         ]);
    }

    public function delete($id)
    {
        $this->veiculosModel->delete($id);
        return redirect()->to('/veiculos');
    }

    public function create()
    {   
        $data['cliente'] = $this->veiculosModel->obterClientes();

        return view('formveiculos', $data);
    }

    public function store()
    {
        $this->veiculosModel->save($this->request->getPost());
        return redirect()->to('/veiculos');
    }

    public function edit($id)
    {
        $data['veiculos'] = $this->veiculosModel->find($id);
        $data['cliente'] = $this->veiculosModel->obterClientes();
    
        return view('formveiculos', $data);
    }
}
