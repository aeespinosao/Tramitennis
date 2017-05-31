<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Model {
	public $codigo;
	public $horario;
	public $ced_jugador;

	public function guardar(){
		try{
            $this->db->insert("reserva", array(
                'horario' => $this->horario,
                'ced_jugador' => $this->ced_jugador                
            ));
        }catch (Exception $e){
            return false;
        }
        return true;
	}
	public function obtener_reservas($jugador){
		
		$query = $this->db->get_where('reserva', array('ced_jugador' => $jugador));
		return $query->result();
	}

	public function editar_reserva(){
		try{
            $this->db->set('horario', $this->horario);              
            $this->db->where('codigo', $this->codigo);
            $this->db->update('reserva');
        }catch (Exception $e){
            return false;
        }
        return true;
	}
	public function obtener_horario($codigo){
		$this->load->database();
		$this->db->select('horario');
        $query = $this->db->get_where('reserva', array('codigo' => $codigo));        
        return $query->result();
	}
	public function eliminar_reserva($cod){

		try{
			$this->db->where('codigo', $cod);
			$this->db->delete('reserva');
		}catch (Exception $e){
            return false;
        }
        return true;
		
	}
}