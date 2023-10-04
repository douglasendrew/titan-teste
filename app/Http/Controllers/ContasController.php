<?php 

namespace Titan\Sistema\Controllers;

use Init\Route;
use Titan\Sistema\Models\ContasAPagarModel;
use Titan\Sistema\Models\EmpresasModel;

class ContasController {
    public function execute( $data ) {
        $model = new EmpresasModel();

        $routing  = new Route();
        $empresas = $model->listagemEmpresas();

        return $routing->render( "/Conta/Adicionar", $data, $empresas );
    }


    public function adicionarConta($data) {
        $model    = new EmpresasModel();
        $routing  = new Route();

        if($model->adicionarConta($data['valor_pagar'],$data['data'],$data['empresa'])) {
            return $routing->redirect('/conta/listagem');
        }

        return $routing->returnError(500);
    }


    public function listagemContas($data) {
        $routing  = new Route();
        $contasAPagarModel = new ContasAPagarModel();

        $routing->render( "/Conta/Listagem", $data, $contasAPagarModel->listagemContas());
    }


    public function exluirConta($data) {
        $routing  = new Route();
        $contasAPagarModel = new ContasAPagarModel();

        if(isset($data['id_conta'])) {
            $contasAPagarModel->excluirConta($data['id_conta']);
        }

        $routing->redirect( "/conta/listagem" );
    }


    public function pagarConta($data) {
        $routing  = new Route();
        
        $contasAPagarModel = new ContasAPagarModel();

        if(isset($data['id_conta'])) {
            $contasAPagarModel->pagarConta($data['id_conta']);
        }


        $routing->redirect("/conta/listagem");
    }

    
    public function editarConta($data) {
        $routing  = new Route();
        $contasAPagarModel = new ContasAPagarModel();
        $model = new EmpresasModel();
        $empresas = $model->listagemEmpresas();

        if(isset($data['id_conta'])) {
            $conta = $contasAPagarModel->pesquisaConta($data['id_conta']);
            return $routing->render("/Conta/Editar", $empresas, $conta);
        }

        return $routing->redirect("/conta/listagem");
    }


    public function atualizarConta($data) {
        $model    = new EmpresasModel();
        $routing  = new Route();

        if($model->atualizarConta($data['id_conta'],$data['valor_pagar'],$data['data'],$data['empresa'])) {
            return $routing->redirect('/conta/listagem');
        }

        return $routing->returnError(500);
    }
}