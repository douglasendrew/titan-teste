<?php 

namespace Titan\Sistema\Models;

use Init\Route;
use Titan\Sistema\Database\DB;

class ContasAPagarModel {
    private $db;

    public function __construct() {  
        $this->db = new DB();
    }

    public function listagemContas() {
        $sql = $this->db->conn()->prepare("SELECT 
            e.nome_empresa,
            cp.*
        FROM tbl_conta_pagar cp 
            LEFT JOIN  tbl_empresa e ON cp.id_empresa = e.id_empresa");

        $sql->execute();
        return $sql->fetchAll();
    }


    public function excluirConta($id_conta) {
        $sql = $this->db->conn()->prepare("DELETE FROM tbl_conta_pagar WHERE id_conta_pagar = '$id_conta'");
        return $sql->execute();
    }

    public function pagarConta($id_conta) {
        $sql = $this->db->conn()->prepare("UPDATE tbl_conta_pagar SET pago = '1', 
            valor = 
            CASE 
                WHEN CURDATE() < data_pagar THEN valor * 0.95  -- 5% de desconto
                WHEN data_pagar = CURDATE() THEN valor  -- Sem desconto ou acréscimo
                ELSE valor * 1.10  -- 10% de acréscimo
            END 
        WHERE id_conta_pagar = '$id_conta'");

        return $sql->execute();
    }

    public function pesquisaConta($id_conta) {
        $sql = $this->db->conn()->prepare("SELECT 
            e.nome_empresa,
            cp.*
        FROM tbl_conta_pagar cp 
            LEFT JOIN  tbl_empresa e ON cp.id_empresa = e.id_empresa
        WHERE id_conta_pagar = '$id_conta'");

        $sql->execute();
        return $sql->fetchAll();
    }
}