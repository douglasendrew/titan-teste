<?php 

namespace Titan\Sistema\Models;

use Init\Route;
use Titan\Sistema\Database\DB;

class EmpresasModel {
    private $db;

    public function __construct() {  
        $this->db = new DB();
    }

    public function listagemEmpresas() {
        $sql = $this->db->conn()->prepare("SELECT * FROM tbl_empresa");
        $sql->execute();
        return $sql->fetchAll();
    }


    public function adicionarConta($valor,$data_pagamento,$empresa) {
        $sql = $this->db->conn()->prepare("INSERT INTO tbl_conta_pagar (valor,data_pagar,pago,id_empresa) VALUES ('$valor','$data_pagamento','0','$empresa')");
        return $sql->execute();
    }

    public function atualizarConta($id_conta,$valor,$data_pagamento,$empresa) {
        $sql = $this->db->conn()->prepare("UPDATE tbl_conta_pagar SET valor = '$valor', data_pagar = '$data_pagamento', id_empresa = '$empresa' WHERE id_conta_pagar = '$id_conta'");
        return $sql->execute();
    }
}