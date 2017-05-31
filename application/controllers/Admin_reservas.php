<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_reservas extends CI_Controller {
	public function cargar_vista(){
		$vista = $this->uri->segment(3);
	    if($vista==='hacer'){ 
	    	$this->load->model('Horario');
	    	$horarios = [];
      		$horarios = $this->Horario->obtener_disponibles();
	     	$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
										   '2'=> array('Gestion de reservas','#'),
	                                       '3'=> array('Hacer reserva','#')),
	                                       'horarios' => $horarios	                    
										);

	  		$this->session->set_flashdata('horarios_checked',array());
	  		$this->load->view('plantillas/header');
	  		$this->load->view('jugador/menu',$data);
	      	$this->load->view('jugador/hacer_reserva');
	  		$this->load->view('plantillas/footer');

	    }elseif($vista==='editar'){
      		$this->load->model('Horario');
      		$this->load->model('Reserva');
      		$this->load->model('Jugador');
      		$jugador = $this->Jugador->obtener_actual();
      		$reservas = [];
      		$reservas = $this->Reserva->obtener_reservas($jugador->cedula);
      		$horarios = [];
	    	foreach ($reservas as $reserva) {
	    		$horarios = $this->Horario->obtener_horario_curso($reserva->horario);
        		$reserva->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
	    	}
	    	      		
	     	$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
										   '2'=> array('Gestion de reservas','#'),
	                                       '3'=> array('Editar reserva','#')),
	                                       'reservas' => $reservas	                    
										);

	  		$this->session->set_flashdata('horarios_checked',array());
	  		$this->load->view('plantillas/header');
	  		$this->load->view('jugador/menu',$data);
	      	$this->load->view('jugador/editar_reservas');
	  		$this->load->view('plantillas/footer');

    	}elseif($vista==='eliminar'){
      		$this->load->model('Horario');
      		$this->load->model('Reserva');
      		$this->load->model('Jugador');
      		$jugador = $this->Jugador->obtener_actual();
      		$reservas = [];
      		$reservas = $this->Reserva->obtener_reservas($jugador->cedula);
      		$horarios = [];
	    	foreach ($reservas as $reserva) {
	    		$horarios = $this->Horario->obtener_horario_curso($reserva->horario);
        		$reserva->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
	    	}
	    	      		
	     	$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
										   '2'=> array('Gestion de reservas','#'),
	                                       '3'=> array('Editar reserva','#')),
	                                       'reservas' => $reservas	                    
										);

	  		$this->session->set_flashdata('horarios_checked',array());
	  		$this->load->view('plantillas/header');
	  		$this->load->view('jugador/menu',$data);
	      	$this->load->view('jugador/eliminar_reserva');
	  		$this->load->view('plantillas/footer');

    }else {
	      $this->load->view('error404');
	    }

	}

	public function hacer_reserva(){
		redirect_if_not_logged_in();
		$this->load->model('Jugador');
		$this->load->model('Reserva');
		$this->load->model('Horario');
		$this->form_validation->set_rules('horarios_seleccionados', 'Horarios_seleccionados', 'required');
		$jugador = $this->Jugador->obtener_actual();
		$horario = $this->input->post('horarios_seleccionados');

		if ($this->form_validation->run() == TRUE){
			$this->Reserva->horario = $horario;
			$this->Reserva->ced_jugador = $jugador->cedula;
			if ($this->Reserva->guardar()){
				$this->Horario->editar_estado($horario);
			}
	    	$horarios = [];
      		$horarios = $this->Horario->obtener_disponibles();
	     	$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
										   '2'=> array('Gestion de reservas','#'),
	                                       '3'=> array('Hacer reserva','#')),
	                                       'horarios' => $horarios	                    
										);
	     	$this->session->set_flashdata('success', 'Se realizo la reserva satisfactoriamente');
	  		$this->session->set_flashdata('horarios_checked',array());
	  		$this->load->view('plantillas/header');
	  		$this->load->view('jugador/menu',$data);
	      	$this->load->view('jugador/hacer_reserva');
	  		$this->load->view('plantillas/footer');
		}else{

	    	$horarios = [];
      		$horarios = $this->Horario->obtener_disponibles();
	     	$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
										   '2'=> array('Gestion de reservas','#'),
	                                       '3'=> array('Hacer reserva','#')),
	                                       'horarios' => $horarios	                    
										);

	  		$this->session->set_flashdata('horarios_checked',array());
	  		$this->load->view('plantillas/header');
	  		$this->load->view('jugador/menu',$data);
	      	$this->load->view('jugador/hacer_reserva');
	  		$this->load->view('plantillas/footer');
		}		
		
	}

	public function editar()
  	{
	    redirect_if_not_logged_in();
	    $this->load->model('Horario');
	    $this->load->model('Reserva');
	    $codigo_reserva = $this->uri->segment(3);
	    	    
	    $this->session->set_flashdata('codigo_reserva', $codigo_reserva);

	    $horarios = [];
      	$horarios = $this->Horario->obtener_disponibles();

	    $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
										   '2'=> array('Gestion de reservas','#'),
	                                       '3'=> array('Editar reserva','#')),
	                                       'horarios' => $horarios	                    
										);
	  		$this->session->set_flashdata('horarios_checked',array());
	  		$this->load->view('plantillas/header');
	  		$this->load->view('jugador/menu',$data);
	      	$this->load->view('jugador/editar_reserva');
	  		$this->load->view('plantillas/footer');
  }
  public function guardar_edicion(){
  	$this->load->model('Horario');
	$this->load->model('Reserva');
	$this->load->model('Jugador');
  	$codigo_reserva = $this->session->flashdata('codigo_reserva');
  	$this->Reserva->codigo = $codigo_reserva;
    
  	$horario = $this->input->post("horarios_seleccionados");
  	#$horario_anterior = [];
  	$horario_aux = $this->Reserva->obtener_horario($codigo_reserva);
  	$horario_anterior = $horario_aux[0]->horario;
  	
  	#print_r($horario);
  	
  	
  	$this->Reserva->horario = $horario;
  	if (is_null($horario)) {
		$horario = $horario_anterior;
		$jugador = $this->Jugador->obtener_actual();
      	$reservas = [];
      	$reservas = $this->Reserva->obtener_reservas($jugador->cedula);
      	$horarios = [];
	    foreach ($reservas as $reserva) {
	    	$horarios = $this->Horario->obtener_horario_curso($reserva->horario);
        	$reserva->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
	    }
	    	      		
	    $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
										  '2'=> array('Gestion de reservas','#'),
	                                      '3'=> array('Editar reserva','#')),
	                                      'reservas' => $reservas	                    
									);

	  	$this->session->set_flashdata('horarios_checked',array());
	  	$this->load->view('plantillas/header');
	  	$this->load->view('jugador/menu',$data);
	    $this->load->view('jugador/editar_reservas');
	  	$this->load->view('plantillas/footer');
	}else{

		$this->Horario->editar_estado($horario_anterior);
		$this->Horario->editar_estado($horario);
	
	if($this->Reserva->editar_reserva()){
		$jugador = $this->Jugador->obtener_actual();
      	$reservas = [];
      	$reservas = $this->Reserva->obtener_reservas($jugador->cedula);
      	$horarios = [];
	    foreach ($reservas as $reserva) {
	    	$horarios = $this->Horario->obtener_horario_curso($reserva->horario);
        	$reserva->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
	    }
	    	      		
	    $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
										  '2'=> array('Gestion de reservas','#'),
	                                      '3'=> array('Editar reserva','#')),
	                                      'reservas' => $reservas	                    
									);
	    $this->session->set_flashdata('success', 'Se realizo la edicion correctamente');
	  	$this->session->set_flashdata('horarios_checked',array());
	  	$this->load->view('plantillas/header');
	  	$this->load->view('jugador/menu',$data);
	    $this->load->view('jugador/editar_reservas');
	  	$this->load->view('plantillas/footer');
		}
	}

  }
  public function eliminar(){
  	redirect_if_not_logged_in();
	$codigo = $this->uri->segment(3);
	$horario = $this->uri->segment(4);
	$this->load->model('Jugador');
	$this->load->model('Reserva');
	$this->load->model('Horario');
	if ($this->Reserva->eliminar_reserva($codigo)){
		$this->Horario->editar_estado($horario);
      	
      	$jugador = $this->Jugador->obtener_actual();
      	$reservas = [];
      	$reservas = $this->Reserva->obtener_reservas($jugador->cedula);
      	$horarios = [];
	    foreach ($reservas as $reserva) {
	    	$horarios = $this->Horario->obtener_horario_curso($reserva->horario);
        	$reserva->horarioObj = count($horarios) > 0 ? $horarios[0] : null;
	    }
	          		
	    $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
									   '2'=> array('Gestion de reservas','#'),
	                                      '3'=> array('Editar reserva','#')),
	                                      'reservas' => $reservas	                    
									);
	    $this->session->set_flashdata('success', 'Reserva eliminada correctamente');
  		$this->session->set_flashdata('horarios_checked',array());
  		$this->load->view('plantillas/header');
  		$this->load->view('jugador/menu',$data);
      	$this->load->view('jugador/eliminar_reserva');
  		$this->load->view('plantillas/footer');

	}


  }


}