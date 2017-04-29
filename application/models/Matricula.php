<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matricula extends CI_Model {
	public $codigo_curso;
	public $cedula_jugador;


	public function get_all(){
		$this->load->database();
		$query = $this->db->get('matricula');
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

    public function save(){

        $this->load->database();
        try{
            $this->db->insert("matricula", array(
                'codigo_curso' => $this->codigo_curso,
                'cedula_jugador' => $this->cedula_jugador,
            ));
        }catch (Exception $e){
            return false;
        }
        return true;

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

    public function delete(){
        $this->load->database();
        try{
            $this->db->delete('matricula', array(
                'codigo_curso' => $this->codigo_curso,
                'cedula_jugador' => $this->cedula_jugador
            ));
        }catch (Exception $e){
            return false;
        }
        return true;
    }

    public function validar_matriculas($cursos, $jugador){
        $this->load->model('Curso');
        $matriculados = count($cursos);
        $mis_cursos = $this->get_mis_cursos($jugador);
        $matriculados += count($mis_cursos);
        if($matriculados > 2) return false;

        foreach ($cursos as $curso_id) {

            $return = $this->Curso->get_curso($curso_id);
            $curso = $return[0];
            $numero_inscritos = $this->get_numero_matriculados($curso);
            if(($numero_inscritos + 1) > $curso->cupos_disponibles) return false;
        }

        return true;
    }


    public function get_matriculados($curso){
        $this->load->database();
        $this->db->select('cedula_jugador');
        $query = $this->db->get_where('matricula', array(
            'codigo_curso' => $curso->codigo
        ));

        $matriculados = [];
        foreach($query->result() as $row)
            $matriculados[] = $row->cedula_jugador;

        return $matriculados;
    }

    public function get_numero_matriculados($curso){
        $matriculados = $this->get_matriculados($curso);
        return count($matriculados);
    }

}?>
	