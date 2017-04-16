<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horario extends CI_Model {
	public $fecha_inicio;
	public $fecha_fin;
	public $hora;
	public $estado;
	public $numero;
	public $cancha;

	public function get_all(){
		$this->load->database();
		$query = $this->db->get('horario');
		return $query->result();
	}
}?>
	