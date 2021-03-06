<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'usuario.php';

class Jugador extends Usuario {
    public $cedula;
    public $eps;
    public $estamento;
    public $dependencia;
    public $nivel;

    public function obtener($cedula) {

        $condition = "cedula =" . "'" . $cedula . "'";
        $this->db->select('*');
        $this->db->from('jugador');
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
        $jugador = $this->obtener($usuario->cedula);
        if($jugador) return $jugador[0];
        echo "la persona actual no es un jugador";exit;
    }

}?>
