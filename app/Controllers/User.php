<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
    }

    public function index()
{
    $user = $this->userModel->paginate(10);

    foreach ($user as &$veiculo) {
        $equipeModel = new \App\Models\EquipeModel();
        $equipe = $equipeModel->find($veiculo['equipe']);
        $veiculo['nome_equipe'] = $equipe ? $equipe['nome'] : '';
    }

    return view('users', [
        'users' => $user,
        'pager' => $this->userModel->pager
    ]);
}


    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/users');
    }

    public function create()
    {   
        $data['equipe'] = $this->userModel->obterEquipes();
        return view('form', $data);
    }

    public function store()
    {
        $this->userModel->save($this->request->getPost());
        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        $data['equipe'] = $this->userModel->obterEquipes();
    
        return view('form', $data);
    }

}

