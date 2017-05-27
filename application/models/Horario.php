<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horario extends CI_Model {
	public $fecha_inicio;
	public $fecha_fin;
	public $hora;
	public $estado;
	public $numero;
	public $cancha;

	public function insertar(){
		echo var_dump($this);
		try{
            $this->db->insert("horario", array(
                'fecha_inicio' => $this->fecha_inicio,
                'fecha_fin' => $this->fecha_fin,
                'hora' => $this->hora,
                'cancha' => $this->cancha
            ));
        }catch (Exception $e){
            return false;
        }
        return true;
	}
	
	public function get_all(){
		$query = $this->db->get('horario');
		return $query->result();
	}

	public function obtener_disponibles(){
		$query = $this->db->get_where('horario', array('estado' => 'disponible'));
		return $query->result();
	}

	public function obtener_horario_curso($cod){
		$query = $this->db->get_where('horario', array('numero' => $cod));
		return $query->result();
	}

	public function editar_estado($codigo){
		$resultado = [];
		$this->db->select('estado');
		$resultado = $this->db->get_where('horario', array('numero' => $codigo))->row();
		if ($resultado->estado == 'disponible'){
			$this->db->set('estado', 'no disponible');
			$this->db->where('numero', $codigo);
			$this->db->update('horario');
		}
		else{
			$this->db->set('estado', 'disponible');
			$this->db->where('numero', $codigo);
			$this->db->update('horario');
		}
	}

}?>
