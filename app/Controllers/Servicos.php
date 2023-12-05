<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Servicos extends BaseController
{
    private $servicosModel;

    public function __construct()
    {
        $this->servicosModel = new \App\Models\servicosModel();
    }

    public function index()
    {
        return view('servicos', [
            'servicos' => $this->servicosModel->paginate(10),
            'pager' => $this->servicosModel->pager
        ]);
    }

    public function delete($id)
    {
        $this->servicosModel->delete($id);
        return redirect()->to('/servicos');
    }

    public function create()
    {
        return view('formservicos');
    }

    public function store()
    {
        $this->servicosModel->save($this->request->getPost());
        return redirect()->to('/servicos');
    }

    public function edit($id)
    {
        return view('formservicos', [
            'servicos' => $this->servicosModel->find($id)
        ]);
    }
}
