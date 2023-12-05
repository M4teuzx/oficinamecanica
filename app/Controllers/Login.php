<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;


class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function processLogin()
    {
        $model = new LoginModel();
        $nome = $this->request->getPost('nome');
        $senha = $this->request->getPost('senha');

        $user = $model->getUser($nome, $senha);

        if ($user) {
            return redirect()->to('/home');
        } else {
            return redirect()->to('/')->with('error', 'Credenciais inválidas');
        }
    }
}
