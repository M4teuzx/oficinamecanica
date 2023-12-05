<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Equipe extends BaseController
{
    private $equipeModel;

    public function __construct()
    {
        $this->equipeModel = new \App\Models\EquipeModel();
    }

    public function index()
    {
         $equipe = $this->equipeModel->paginate(10);

         foreach ($equipe as &$veiculo) {
             $servicoModel = new \App\Models\ServicosModel();
             $servico = $servicoModel->find($veiculo['servico']);
             $veiculo['nome_servico'] = $servico ? $servico['tipo'] : '';
         }
 
         return view('equipe', [
             'equipe' => $equipe,
             'pager' => $this->equipeModel->pager
         ]);
    }

    public function delete($id)
    {
        $this->equipeModel->delete($id);
        return redirect()->to('/equipe');
    }

    public function create()
    {   
        $data['servico'] = $this->equipeModel->obterServico();
        return view('formequipe', $data);
    }

    public function store()
    {
        $this->equipeModel->save($this->request->getPost());
        return redirect()->to('/equipe');
    }

    public function edit($id)
    {
        $data['equipe'] = $this->equipeModel->find($id);
        $data['servico'] = $this->equipeModel->obterServico();
    
        return view('formequipe', $data);
    }

}
