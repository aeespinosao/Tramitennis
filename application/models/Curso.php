<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Model {
	public $codigo;
	public $nivel;
	public $cupos;
	public $horario;

    public function __construct($value = null) {
        parent::__construct();
        $this->load->database();
        if ($value != null) {
            if (is_array($value))
                settype($value, 'object');

            if (is_object($value)) {
                $this->codigo = isset($value->codigo) ? $value->codigo : null;
                $this->nivel = isset($value->nivel) ? $value->nivel : null;
                $this->cupos = isset($value->cupos) ? $value->cupos : null;
                $this->horario = isset($value->horario) ? $value->horario : null;                
            }
        }
    }

	public function save(){

        $this->load->database();
        try{
            $this->db->insert("curso", array(                      	
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
	