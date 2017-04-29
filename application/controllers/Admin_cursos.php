<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_cursos extends CI_Controller {

	public function cargar_vista()
	{
    $vista = $this->uri->segment(3);
    if($vista==='crear'){
      $this->load->model('Horario');
      $horarios = [];
      $horarios = $this->Horario->obtener_disponibles();

      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de cursos','#'),
                                     '3'=> array('Crear curso','#')),
                    'horarios' => $horarios,
									'select' => '');
		  $this->session->set_flashdata('horarios_checked',array());
  		$this->load->view('plantillas/header');
  		$this->load->view('administrador/menu',$data);
      $this->load->view('administrador/crear_curso');
  		$this->load->view('plantillas/footer');

    }elseif($vista==='editar'){
      $this->load->model('Curso');
      $this->load->model('Horario');
      $cursos = [];
      $cursos = $this->Curso->obtener_cursos();

      foreach ($cursos as $curso) {
        $horarios = $this->Horario->obtener_horario_curso($curso->horario);
        $curso->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
      }
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de cursos','#'),
                                     '3'=> array('Editar cursos','#')),
                    'cursos' => $cursos);
  		$this->load->view('plantillas/header');
  		$this->load->view('administrador/menu',$data);
      $this->load->view('administrador/editar_cursos');
  		$this->load->view('plantillas/footer');

    }elseif($vista==='eliminar'){
			$this->load->model('Curso');
      $this->load->model('Horario');
      $cursos = [];
      $cursos = $this->Curso->obtener_cursos();
      foreach ($cursos as &$curso) {
        $horarios = $this->Horario->obtener_horario_curso($curso->horario);
        $curso->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
      }
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de cursos','#'),
                                     '3'=> array('Eliminar curso','#')),
																	'cursos' => $cursos);
  		$this->load->view('plantillas/header');
  		$this->load->view('administrador/menu',$data);
      $this->load->view('administrador/eliminar_curso');
  		$this->load->view('plantillas/footer');
    }elseif($vista==='matricular'){
        $this->load->model('Curso');
        $this->load->model('Matricula');
        $this->load->model('Jugador');
        $cursos = [];
        $mis_cursos = [];
        if($jugador = $this->Jugador->obtener_jugador_actual()){
            $mis_cursos = $this->Matricula->obtener_cursos_jugador($jugador);
            if(count($mis_cursos) >= 2){
                $cursos = [];
            }else{
                $cursos = $this->Matricula->obtener_matricula($jugador);
            }

        }

        $this->db->reset_query();

        $this->load->model('Horario');

        foreach ($cursos as &$curso){
            $horarios =  $this->Horario->obtener_horario_curso($curso->horario);
            $curso->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
        }

      $data = array(
          'bread' => array(
              '1'=> array('Página principal',base_url().'index.php/login/jugador'),
              '2'=> array('Gestion de cursos','#'),
              '3'=> array('Matricular curso','#')
          ),
          'cursos' => $cursos
      );
  		$this->load->view('plantillas/header');
  		$this->load->view('jugador/menu',$data);
      $this->load->view('jugador/matricula');
  		$this->load->view('plantillas/footer');
    }elseif($vista==='cancelar'){

        $this->load->model('Curso');
        $this->load->model('Jugador');
        $this->load->model('Matricula');
        $mis_cursos = [];
        $jugador = null;
        if($jugador = $this->Jugador->obtener_jugador_actual()){
            $mis_cursos = $this->Matricula->obtener_cursos_jugador($jugador);
        }

        $this->db->reset_query();
        $this->load->model('Horario');
        $cursos = [];

        if(count($mis_cursos) > 0){
            $this->db->select('*');
            $this->db->from('curso');
            $this->db->where_in('codigo', $mis_cursos);
            $query = $this->db->get();


            foreach ($query->result() as $curso){
                $horarios =  $this->Horario->obtener_horario_curso($curso->horario);
                $curso->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
                $cursos[] = $curso;
            }
        }


      $data = array(
          'bread' => array(
              '1'=> array('Página principal',base_url().'index.php/login/jugador'),
              '2'=> array('Gestion de cursos','#'),
              '3'=> array('Cancelar curso','#')
          ),
          'cursos' => $cursos,
          'jugador' => $jugador,
      );
  		$this->load->view('plantillas/header');
  		$this->load->view('jugador/menu',$data);
      $this->load->view('jugador/cancelar');
  		$this->load->view('plantillas/footer');
    }else {
      $this->load->view('error404');
    }

	}

	public function validar(){
		$config = array(
      array(
							'field' => 'selector',
							'label' => 'Nivel',
							'rules' => 'required'
			),
			array(
							'field' => 'cupos',
							'label' => 'Cupos',
							'rules' => 'required',
			),
			array(
							'field' => 'horarios_seleccionados[]',
							'label' => 'Horario',
							'rules' => 'required'
			)
			);
			$this->form_validation->set_rules($config);
			return $this->form_validation->run();
	}

  public function crear_nuevo(){
		$this->session->set_flashdata('horarios_checked',[]);
		if ($this->validar() == FALSE)
	    {
				$this->load->model('Horario');
	      $horarios = $this->Horario->obtener_disponibles();
				$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																			 '2'=> array('Gestion de cursos','#'),
																			 '3'=> array('Crear curso','#')),
											'horarios' => $horarios,
										   'select' => $nivel = $this->input->post("selector"));
				$this->session->set_flashdata('cupos',$this->input->post("cupos"));
				$this->session->set_flashdata('horarios_checked',$this->input->post("horarios_seleccionados"));
				$this->load->view('plantillas/header');
				$this->load->view('administrador/menu',$data);
				$this->load->view('administrador/crear_curso');
				$this->load->view('plantillas/footer');
			}
		else{
			$this->load->model('Horario');
      $this->load->model('Curso');
      $nivel = $this->input->post("selector");
      $cupos = $this->input->post("cupos");
      $horarios = $this->input->post("horarios_seleccionados");
      $this->Curso->nivel = $nivel;
      $this->Curso->cupos = $cupos;
      foreach ($horarios as $horario) {
        $this->Curso->horario = $horario;
        if($this->Curso->guardar()){
          $this->Horario->editar_estado($horario);
        }
      }
      $horarios = $this->Horario->obtener_disponibles();
			$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de cursos','#'),
																		 '3'=> array('Crear curso','#')),
										'horarios' => $horarios,
                    'select' => '');
			$this->session->set_flashdata('success', 'Curso creado satisfactoriamente');
			$this->load->view('plantillas/header');
			$this->load->view('administrador/menu',$data);
			$this->load->view('administrador/crear_curso');
			$this->load->view('plantillas/footer');
			$this->session->unset_userdata('success');

		}
  }

  public function editar()
  {
    $this->load->model('Horario');
    $this->load->model('Curso');
    $codigo_curso = $this->uri->segment(3);
    $curso_seleccionado = $this->Curso->obtener_curso($codigo_curso);
    $horarios = $this->Horario->obtener_disponibles();
    $numero_horario = $this->Curso->obtener_horario($codigo_curso);
    $nivel = $this->Curso->obtener_nivel($codigo_curso);
    $horario_propio = $this->Horario->obtener_horario_curso($numero_horario[0]->horario);
    $this->session->set_flashdata('horario_propio', $horario_propio[0]->numero);
    $this->session->set_flashdata('codigo_curso', $codigo_curso);

    $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
                                   '2'=> array('Gestion de cursos','#'),
                                   '3'=> array('Editar cursos',base_url().'index.php/admin_cursos/cargar_vista/editar'),
                                   '4'=> array('Editar curso','#')),
                  'curso' => $curso_seleccionado,
                  'horarios' => $horarios,
                  'horario_propio' => $horario_propio,
                  'select' => $nivel[0]->nivel);
    $this->load->view('plantillas/header');
    $this->load->view('administrador/menu',$data);
    $this->load->view('administrador/editar_curso');
    $this->load->view('plantillas/footer');
  }

  public function guardar_edicion(){
			if ($this->validar() == FALSE)
		    {
					$this->load->model('Horario');
			    $this->load->model('Curso');
			    $codigo_curso = $codigo_curso = $this->session->flashdata('codigo_curso');
			    $curso_seleccionado = $this->Curso->obtener_curso($codigo_curso);
			    $horarios = [];
			    $horarios = $this->Horario->obtener_disponibles();
			    $numero_horario = $this->Curso->obtener_horario($codigo_curso);
			    $nivel = $this->Curso->obtener_nivel($codigo_curso);
			    #var_dump($numero_horario[0]->horario);
			    $horario_propio = $this->Horario->obtener_horario_curso($numero_horario[0]->horario);
			    $this->session->set_flashdata('horario_propio', $horario_propio[0]->numero);
			    $this->session->set_flashdata('codigo_curso', $codigo_curso);

			    $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
			                                   '2'=> array('Gestion de cursos','#'),
			                                   '3'=> array('Editar cursos',base_url().'index.php/admin_cursos/cargar_vista/editar'),
			                                   '4'=> array('Editar curso','#')),
			                  'curso' => $curso_seleccionado,
			                  'horarios' => $horarios,
			                  'horario_propio' => $horario_propio,
			                  'select' => $nivel[0]->nivel);
			    $this->load->view('plantillas/header');
			    $this->load->view('administrador/menu',$data);
			    $this->load->view('administrador/editar_curso');
			    $this->load->view('plantillas/footer');
				}
			else{
				$this->load->model('Horario');
		    $this->load->model('Curso');
		    $nivel = $this->input->post("selector");
		    $cupos = $this->input->post("cupos");
		    $horario = $this->input->post("horarios_seleccionados");

		    $horario_anterior = $this->session->flashdata('horario_propio');
		    $codigo_curso = $this->session->flashdata('codigo_curso');
		    if (is_null($horario)) {
		      $horario = $horario_anterior;
		    }else{
		      $this->Horario->editar_estado($horario_anterior);
		      $this->Horario->editar_estado($horario);
		    }

		    $this->Curso->codigo = $codigo_curso;
		    $this->Curso->nivel = $nivel;
		    $this->Curso->cupos_disponibles = $cupos;
		    $this->Curso->horario = $horario;
		    if ($this->Curso->actualizar_curso()) {
					$this->load->model('Curso');
          $this->load->model('Horario');
		      $cursos = [];
		      $cursos = $this->Curso->obtener_cursos();
          foreach ($cursos as $curso) {
            $horarios = $this->Horario->obtener_horario_curso($curso->horario);
            $curso->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
          }
		      #var_dump($cursos);
		      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																				 '2'=> array('Gestion de cursos','#'),
		                                     '3'=> array('Editar cursos','#')),
		                    'cursos' => $cursos);
				  $this->session->set_flashdata('success', 'Curso actualizado correctamente');
		  		$this->load->view('plantillas/header');
		  		$this->load->view('administrador/menu',$data);
		      $this->load->view('administrador/editar_cursos');
		  		$this->load->view('plantillas/footer');
		    }
			}
	}

	public function eliminar(){
		$codigo = $this->uri->segment(3);
		$horario = $this->uri->segment(4);
		$this->load->model('Curso');
		$this->load->model('Horario');
		if (!$this->Curso->eliminar_curso($codigo)) {
			$this->Horario->editar_estado($horario);
			$this->load->model('Curso');
      $cursos = [];
      $cursos = $this->Curso->obtener_cursos();
			foreach ($cursos as &$curso) {
				$horarios = $this->Horario->obtener_horario_curso($curso->horario);
				$curso->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
			}
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de cursos','#'),
                                     '3'=> array('Eliminar curso','#')),
																	'cursos' => $cursos);
			$this->session->set_flashdata('success', 'Datos eliminados correctamente');
  		$this->load->view('plantillas/header');
  		$this->load->view('administrador/menu',$data);
      $this->load->view('administrador/eliminar_curso');
  		$this->load->view('plantillas/footer');
		}
	}

	public function matricular_cursos(){
        $guardado = true;
        $this->load->model('Curso');
        $this->load->model('Matricula');
        $this->load->model('Jugador');

        if($jugador = $this->Jugador->obtener_jugador_actual()){
            $cursos = $this->input->post('cursos');
            if(count($cursos) <= 0 || !$this->Matricula->validar_matriculas($cursos, $jugador)) $guardado = false;

            if($guardado && count($cursos) > 0){
                foreach ($cursos as $codigo_curso){
                    $this->Matricula->codigo_curso = $codigo_curso;
                    $this->Matricula->cedula_jugador = $jugador->cedula;
                    $this->Matricula->guardar();
                }
            }
        }

        $cursos = [];
        if($jugador = $this->Jugador->obtener_jugador_actual()){
            $cursos = $this->Matricula->obtener_matricula($jugador);
        }

        $this->load->model('Horario');

        foreach ($cursos as &$curso){
            $horarios =  $this->Horario->obtener_horario_curso($curso->horario);
            $curso->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
        }

        $data = array(
            'bread' => array(
                '1'=> array('Página principal',base_url().'index.php/login/jugador'),
                '2'=> array('Gestion de cursos','#'),
                '3'=> array('Matricular curso','#')
            ),
            'cursos' => $cursos,
            'guardado' => $guardado
        );
        $this->load->view('plantillas/header');
        $this->load->view('jugador/menu',$data);
        $this->load->view('jugador/matricula');
        $this->load->view('plantillas/footer');
    }


    public function eliminar_matricula(){

        $this->load->model('Matricula');
        $this->load->model('Curso');
        $this->load->model('Jugador');

        $codigo = $this->uri->segment(3);
        $cedula = $this->uri->segment(4);
        $this->load->database();
        $this->Matricula->codigo_curso = $codigo;
        $this->Matricula->cedula_jugador = $cedula;
        $this->Matricula->delete();

        $mis_cursos = [];
        $jugador = null;
        if($jugador = $this->Jugador->obtener_jugador_actual()){
            $mis_cursos = $this->Matricula->obtener_cursos_jugador($jugador);
        }

        $this->db->reset_query();


        $this->load->model('Horario');

        $cursos = [];

        if(count($mis_cursos) > 0){
            $this->db->select('*');
            $this->db->from('curso');
            $this->db->where_in('codigo', $mis_cursos);
            $query = $this->db->get();


            foreach ($query->result() as &$curso){
                $horarios =  $this->Horario->obtener_horario_curso($curso->horario);
                $curso->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
                $cursos[] = $curso;
            }
        }



        $data = array(
            'bread' => array(
                '1'=> array('Página principal',base_url().'index.php/login/jugador'),
                '2'=> array('Gestion de cursos','#'),
                '3'=> array('Cancelar curso','#')
            ),
            'cursos' => $cursos,
            'jugador' => $jugador,
        );
        $this->load->view('plantillas/header');
        $this->load->view('jugador/menu',$data);
        $this->load->view('jugador/cancelar');
        $this->load->view('plantillas/footer');
    }
}
