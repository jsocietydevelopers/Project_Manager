<?php

class M_usuario extends  CI_Model{
    function __construct(){
        parent::__construct();
    }
    function insertarDatos($arrayInsert, $tabla){
      $this->db->insert($tabla, $arrayInsert);
      $sol = $this->db->insert_id();
      if($this->db->affected_rows() != 1){
          throw new Exception('Error al insertar');
          $data['error'] = EXIT_ERROR;
      }
      return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "Id" => $sol);
    }
    function updateDatos($arrayData, $id, $tabla){
      $this->db->where('Id', $id);
      $this->db->update($tabla, $arrayData);
      if ($this->db->trans_status() == false){
          throw new Exception('No se pudo actualizar los datos');
      }
      return array('error' => EXIT_SUCCESS,'msj' => MSJ_UPT);
    }
    function verificarUsuario($user, $pass){
        $sql = "SELECT *
                  FROM persons
                 WHERE usuario = ?
                   AND pass = ?";
        $result = $this->db->query($sql, array($user, $pass));
        return $result->result();
    }
    function getProyectos($user){
        $sql = "SELECT *
                  FROM proyectos";
        $result = $this->db->query($sql, array($user));
        return $result->result();
    }
    function getTareas($id_user){
      $sql = "SELECT t.*,
                     t.Nombre AS tarea,
                     p.*
                FROM tareas t,
                     proyectos p
               WHERE p.Id = t.id_project
                 AND t.id_project = ?";
      $result = $this->db->query($sql, array($id_user));
      // echo $this->db->last_query();
      // exit;
      return $result->result();
    }
    function getActividades($id_user){
      $sql = "SELECT t.*,
                     t.Nombre AS tarea,
                     p.*
                FROM tareas t,
                     proyectos p
               WHERE p.Id = t.id_project
                 AND t.id_project = ?";
      $result = $this->db->query($sql, array($id_user));
      return $result->result();
    }
    function getIdProyecto($proyecto){
      $sql = "SELECT p.Id
                FROM proyectos p
               WHERE (p.Nombre LIKE '".$proyecto."')";
      $result = $this->db->query($sql);
      return $result->row()->Id;
    }
}