<?php

class M_usuario extends  CI_Model{
    function __construct(){
        parent::__construct();
    }
    function verificarUsuario($user, $pass){
        $sql = "SELECT *
                  FROM persons
                 WHERE usuario = ?
                   AND pass = ?";
        $result = $this->db->query($sql, array($user, $pass));
        return $result->result();
    }
}