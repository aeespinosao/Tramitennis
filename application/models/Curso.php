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

    public function update_curso(){
        $this->load->database();
        try{
            $this->db->set('nivel', $this->nivel);
            $this->db->set('cupos_disponibles', $this->cupos_disponibles);
            $this->db->set('horario', $this->horario);
            $this->db->where('codigo', $this->codigo);
            $this->db->update('curso');
        }catch (Exception $e){
            return false;
        }
        return true;
    }

    public function get_all(){
        $this->load->database();
        $query = $this->db->get('curso');
        return $query->result();
    }

    public function get_for_matricula($jugador){
        $this->load->database();
        $mis_cursos = $this->get_mis_cursos($jugador);
        $query = $this->db->get_where('curso', array('nivel' => $jugador->nivel));

        $cursos = [];
        foreach ($query->result() as $curso){
            if (!in_array($curso->codigo, $mis_cursos)) {
                $cursos[] = $curso ;
            }
        }



        return $cursos;
    }

    public function get_mis_cursos($jugador){
        $this->load->database();
        $this->db->select('codigo_curso');
        $query = $this->db->get_where('matricula', array(
            'cedula_jugador' => $jugador->cedula
        ));

        $mis_cursos = [];
        foreach($query->result() as $row)
            $mis_cursos[] = $row->codigo_curso;

        return $mis_cursos;
    }

    public function get_curso($cod){
        $this->load->database();
        $query = $this->db->get_where('curso', array('codigo' => $cod));
        return $query->result();
    }

    public function get_horario($cod){
        $this->load->database();
        $this->db->select('horario');
        $query = $this->db->get_where('curso', array('codigo' => $cod));
        return $query->result();
    }

    public function get_nivel($cod){
        $this->load->database();
        $this->db->select('nivel');
        $query = $this->db->get_where('curso', array('codigo' => $cod));
        return $query->result();
    }

		public function delete($cod){
        $this->load->database();
        $query = $this->db->delete('curso', array('codigo' => $cod));
        $query = $this->db->get_where('curso', array('codigo' => $cod));
        return $query->result();
    }

    public function get_current_jugador(){
        $this->load->database();
        $query = $this->db->get('jugador');
        $jugadores = $query->result();
        if(count($jugadores) > 0) return $jugadores[0];
        return false;
    }
}?>
