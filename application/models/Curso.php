<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Model {
	public $codigo;
	public $nivel;
	public $cupos;
	public $horario;

	public function save(){

        $this->load->database();
        try{
            $this->db->insert("curso", array(
                'codigo' => $this->codigo,        	
                'nivel' => $this->nivel,
                'cupos_disponibles' => $this->cupos,
                'horario' => $this->horario
            ));
        }catch (Exception $e){
            return false;
        }
        return true;	

	}
}?>
	