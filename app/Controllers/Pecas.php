<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pecas extends BaseController
{
    private $pecasModel;

    public function __construct()
    {
        $this->pecasModel = new \App\Models\PecasModel();
    }

    public function index()
    {
        return view('pecas', [
            'pecas' => $this->pecasModel->paginate(10),
            'pager' => $this->pecasModel->pager
        ]);
    }

    public function delete($id)
    {
        $this->pecasModel->delete($id);
        return redirect()->to('/pecas');
    }

    public function create()
    {
        return view('formpecas');
    }

    public function store()
    {
        $this->pecasModel->save($this->request->getPost());
        return redirect()->to('/pecas');
    }

    public function edit($id)
    {
        return view('formpecas', [
            'pecas' => $this->pecasModel->find($id)
        ]);
    }
}
