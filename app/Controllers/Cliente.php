<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cliente extends BaseController
{
    private $clienteModel;

    public function __construct()
    {
        $this->clienteModel = new \App\Models\ClienteModel();
    }

    public function index()
    {
        return view('cliente', [
            'cliente' => $this->clienteModel->paginate(10),
            'pager' => $this->clienteModel->pager
        ]);
    }

    public function delete($id)
    {
        $this->clienteModel->delete($id);
        return redirect()->to('/cliente');
    }

    public function create()
    {
        return view('formcliente');
    }

    public function store()
    {
        $this->clienteModel->save($this->request->getPost());
        return redirect()->to('/cliente');
    }

    public function edit($id)
    {
        return view('formcliente', [
            'cliente' => $this->clienteModel->find($id)
        ]);
    }
}
