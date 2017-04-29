<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jugador extends CI_Model {
    public $cedula;
    public $eps;
    public $estamento;
    public $dependencia;
    public $nivel;

    public function get_current_jugador(){
        $this->load->database();
        $query = $this->db->get('jugador');
        $jugadores = $query->result();
        if(count($jugadores) > 0) return $jugadores[0];
        return false;
    }

}?>
	