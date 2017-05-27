<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_horarios extends CI_Controller {

	public function cargar_vista(){
		$vista = $this->uri->segment(3);
	    if($vista==='crear'){ 
	      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																			 '2'=> array('Gestion de horarios','#'),
	                                     '3'=> array('Crear horario','#')),
	                    
										'select' => '');

	  		$this->load->view('plantillas/header');
	  		$this->load->view('administrador/menu',$data);
	      	$this->load->view('administrador/crear_horario');
	  		$this->load->view('plantillas/footer');

	    }else {
	      $this->load->view('error404');
	    }

	}

	public function validar(){
        redirect_if_not_logged_in();
		$config = array(
      array(
							'field' => 'fecha_inicio',
							'label' => 'Fecha de inicio',
							'rules' => 'required'
			),
			array(
							'field' => 'fecha_fin',
							'label' => 'Fecha de finalización',
							'rules' => 'required',
			),
			array(
							'field' => 'hora',
							'label' => 'Hora',
							'rules' => 'required'
			)
			);
			$this->form_validation->set_rules($config);
			return $this->form_validation->run();
	}

  public function crear_nuevo(){
        redirect_if_not_logged_in();
		if ($this->validar() == FALSE)
	    {
				$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																			 '2'=> array('Gestion de horarios','#'),
																			 '3'=> array('Crear horario','#')),
											'fecha_inicio' => $fecha_inicio=$this->input->post('fecha_inicio'),
											'fecha_fin' => $fecha_fin=$this->input->post('fecha_fin'),
										   'hora' => $hora = $this->input->post("hora"));
				$this->load->view('plantillas/header');
				$this->load->view('administrador/menu',$data);
				$this->load->view('administrador/crear_horario');
				$this->load->view('plantillas/footer');
			}
		else{
			$this->load->model('Horario');
		    $fecha_inicio = $this->input->post("fecha_inicio");
		    $fecha_fin = $this->input->post("fecha_fin");
		    $hora = $this->input->post("hora");
      		$this->Horario->fecha_inicio = date('Y-m-d',strtotime($fecha_inicio));
      		$this->Horario->fecha_fin = date('Y-m-d',strtotime($fecha_fin));
      		$this->Horario->cancha = 1;
      		$this->Horario->hora=date('H:i',strtotime($hora));
      		if($this->Horario->insertar()){
      			$this->Horario->cancha = 2;
      			if($this->Horario->insertar()){
      				$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de horarios','#'),
																		 '3'=> array('Crear horario','#')),
                    'fecha_inicio' => '',
											'fecha_fin' => '',
										   'hora' => '');
					$this->session->set_flashdata('success', 'Curso creado satisfactoriamente');
					$this->load->view('plantillas/header');
					$this->load->view('administrador/menu',$data);
					$this->load->view('administrador/crear_horario');
					$this->load->view('plantillas/footer');
					$this->session->unset_userdata('success');
      			}
      			else{
      				$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de horarios','#'),
																		 '3'=> array('Crear horario','#')),
                    'fecha_inicio' => '',
											'fecha_fin' => '',
										   'hora' => '');
					$this->session->set_flashdata('danger', 'Horario no fue creado satisfactoriamente para la cancha 2');
					$this->load->view('plantillas/header');
					$this->load->view('administrador/menu',$data);
					$this->load->view('administrador/crear_horario');
					$this->load->view('plantillas/footer');
					$this->session->unset_userdata('danger');
      			}
      		}
      		else{
      				$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de horarios','#'),
																		 '3'=> array('Crear horario','#')),
                    'fecha_inicio' => '',
											'fecha_fin' => '',
										   'hora' => '');
					$this->session->set_flashdata('danger', 'Horario no fue creado satisfactoriamente para la cancha 1');
					$this->load->view('plantillas/header');
					$this->load->view('administrador/menu',$data);
					$this->load->view('administrador/crear_horario');
					$this->load->view('plantillas/footer');
					$this->session->unset_userdata('danger');
      			}
			

		}
	}
}

