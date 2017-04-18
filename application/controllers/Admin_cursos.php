<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_cursos extends CI_Controller {

	public function cargar_vista()
	{
    $vista = $this->uri->segment(3);
    if($vista==='crear'){
      $this->load->model('Horario');
      $horarios = [];
      $horarios = $this->Horario->get_disponibles();

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
      $cursos = [];
      $cursos = $this->Curso->get_all();
      #var_dump($cursos);
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de cursos','#'),
                                     '3'=> array('Editar cursos','#')),
                    'cursos' => $cursos);
  		$this->load->view('plantillas/header');
  		$this->load->view('administrador/menu',$data);
      $this->load->view('administrador/editar_cursos');
  		$this->load->view('plantillas/footer');
    }elseif($vista==='eliminar'){
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de cursos','#'),
                                     '3'=> array('Eliminar curso','#')));
  		$this->load->view('plantillas/header');
  		$this->load->view('administrador/menu',$data);
      $this->load->view('administrador/eliminar_curso');
  		$this->load->view('plantillas/footer');
    }elseif($vista==='matricular'){
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
																		 '2'=> array('Gestion de cursos','#'),
                                     '3'=> array('Matricular curso','#')));
  		$this->load->view('plantillas/header');
  		$this->load->view('jugador/menu',$data);
      $this->load->view('jugador/matricula');
  		$this->load->view('plantillas/footer');
    }elseif($vista==='cancelar'){
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
																		 '2'=> array('Gestion de cursos','#'),
                                     '3'=> array('Cancelar curso','#')));
  		$this->load->view('plantillas/header');
  		$this->load->view('jugador/menu',$data);
      $this->load->view('jugador/cancelar');
  		$this->load->view('plantillas/footer');
    }else {
      $this->load->view('error404');
    }

	}

  public function crear_nuevo(){
		$this->session->set_flashdata('horarios_checked',[]);
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
		if ($this->form_validation->run() == FALSE)
	    {
				$this->load->model('Horario');
	      $horarios = [];
	      $horarios = $this->Horario->get_disponibles();
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
      $horario = $this->input->post("horarios_seleccionados");

      $this->Curso->nivel = $nivel;
      $this->Curso->cupos = $cupos;
      foreach ($horario as $value) {
        $this->Curso->horario = $value;
        if($this->Curso->save()){
          echo "guardado!!".$value ;
          $this->Horario->editar_estado($value);
        }
      }
      $horarios = [];
      $horarios = $this->Horario->get_disponibles();
			$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de cursos','#'),
																		 '3'=> array('Crear curso','#')),
										'horarios' => $horarios,
                    'select' => '');
			$this->session->set_flashdata('success', 'Datos insertados correctamente');
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
    $curso_seleccionado = $this->Curso->get_curso($codigo_curso);
    $horarios = [];
    $horarios = $this->Horario->get_disponibles();
    $numero_horario = $this->Curso->get_horario($codigo_curso);
    $nivel = $this->Curso->get_nivel($codigo_curso);
    #var_dump($numero_horario[0]->horario);
    $horario_propio = $this->Horario->get_propio($numero_horario[0]->horario);
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
			if ($this->form_validation->run() == FALSE)
		    {
					$this->load->model('Horario');
			    $this->load->model('Curso');
			    $codigo_curso = $codigo_curso = $this->session->flashdata('codigo_curso');
			    $curso_seleccionado = $this->Curso->get_curso($codigo_curso);
			    $horarios = [];
			    $horarios = $this->Horario->get_disponibles();
			    $numero_horario = $this->Curso->get_horario($codigo_curso);
			    $nivel = $this->Curso->get_nivel($codigo_curso);
			    #var_dump($numero_horario[0]->horario);
			    $horario_propio = $this->Horario->get_propio($numero_horario[0]->horario);
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
		    if ($this->Curso->update_curso()) {
					$this->load->model('Curso');
		      $cursos = [];
		      $cursos = $this->Curso->get_all();
		      #var_dump($cursos);
		      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																				 '2'=> array('Gestion de cursos','#'),
		                                     '3'=> array('Editar cursos','#')),
		                    'cursos' => $cursos);
				  $this->session->set_flashdata('success', 'Datos actualizados correctamente');
		  		$this->load->view('plantillas/header');
		  		$this->load->view('administrador/menu',$data);
		      $this->load->view('administrador/editar_cursos');
		  		$this->load->view('plantillas/footer');
		    }
			}
			/*
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
      echo $horario.'::'.$horario_anterior;
      $this->Horario->editar_estado($horario_anterior);
      $this->Horario->editar_estado($horario);
    }

    $this->Curso->codigo = $codigo_curso;
    $this->Curso->nivel = $nivel;
    $this->Curso->cupos_disponibles = $cupos;
    $this->Curso->horario = $horario;
    if ($this->Curso->update_curso()) {
      echo 'actualizado';
    }




	echo 'en proceso...';*/
	}
}
