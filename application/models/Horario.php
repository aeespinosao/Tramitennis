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

	public function get_disponibles(){
		$this->load->database();
		$query = $this->db->get_where('horario', array('estado' => 'disponible'));
		return $query->result();
	}

	public function get_propio($cod){
		$this->load->database();
		$query = $this->db->get_where('horario', array('numero' => $cod));
		return $query->result();
	}

	public function editar_estado($num){
		$this->load->database();
		$resultado = []; 
		$this->db->select('estado');

		$resultado = $this->db->get_where('horario', array('numero' => $num))->row();
		#echo $resultado->estado;	
		
		if ($resultado->estado = 'disponible'){			
			$this->db->set('estado', 'no disponible');
			$this->db->where('numero', $num);
			$this->db->update('horario');
		}
		else{			
			$this->db->set('estado', 'disponible');
			$this->db->where('numero', $num);
			$this->db->update('horario');
		}
	}		
		
}?>
	