<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'usuario.php';

class Administrador extends Usuario {
    public $cedula;

    public function obtener($cedula) {

        $condition = "cedula =" . "'" . $cedula . "'";
        $this->db->select('*');
        $this->db->from('administrador');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function obtener_actual(){
        $this->load->model('Usuario');
        $usuario = $this->Usuario->obtener_actual();
        $admin = $this->obtener($usuario->cedula);
        if($admin) return $admin[0];
        echo "la persona actual no es un jugador";exit;
    }
}?>
