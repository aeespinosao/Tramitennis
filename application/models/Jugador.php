<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jugador extends CI_Model {
    public $cedula;
    public $eps;
    public $estamento;
    public $dependencia;
    public $nivel;

    public function obtener_jugador_actual(){
        $query = $this->db->get('jugador');
        $jugadores = $query->result();
        if(count($jugadores) > 0) return $jugadores[0];
        return false;
    }

}?>
