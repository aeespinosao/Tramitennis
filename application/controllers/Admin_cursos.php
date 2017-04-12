<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_cursos extends CI_Controller {

	public function cargar_vista()
	{
    $vista = $this->uri->segment(3);
    if($vista==='crear'){
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de cursos','#'),
                                     '3'=> array('Crear curso','#')));
  		$this->load->view('plantillas/header');
  		$this->load->view('administrador/menu',$data);
      $this->load->view('administrador/crear_curso');
  		$this->load->view('plantillas/footer');
    }elseif($vista==='editar'){
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																		 '2'=> array('Gestion de cursos','#'),
                                     '3'=> array('Editar cursos','#')));
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
      $this->load->view('jugador/matricular');
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

	public function editar()
	{
		$data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
																	 '2'=> array('Gestion de cursos','#'),
																	 '3'=> array('Editar cursos',base_url().'index.php/admin_cursos/cargar_vista/editar'),
																   '4'=> array('Editar curso','#')),
									'curso' => array('codigo'=>'1','nombre'=>'mat','nivel'=>'principiantes','cupos'=>'8'));
		$this->load->view('plantillas/header');
		$this->load->view('administrador/menu',$data);
		$this->load->view('administrador/editar_curso');
		$this->load->view('plantillas/footer');
	}

}
