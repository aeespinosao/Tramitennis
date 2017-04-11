<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_cursos extends CI_Controller {

	public function cargar_vista()
	{
    $vista = $this->uri->segment(3);
    if($vista==='crear'){
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
                                     '2'=> array('Crear curso','#')));
  		$this->load->view('plantillas/header');
  		$this->load->view('administrador/menu',$data);
      $this->load->view('administrador/crear_curso');
  		$this->load->view('plantillas/footer');
    }elseif($vista==='editar'){
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
                                     '2'=> array('Editar curso','#')));
  		$this->load->view('plantillas/header');
  		$this->load->view('administrador/menu',$data);
      $this->load->view('administrador/editar_curso');
  		$this->load->view('plantillas/footer');
    }elseif($vista==='eliminar'){
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/administrador'),
                                     '2'=> array('Eliminar curso','#')));
  		$this->load->view('plantillas/header');
  		$this->load->view('administrador/menu',$data);
      $this->load->view('administrador/eliminar_curso');
  		$this->load->view('plantillas/footer');
    }elseif($vista==='matricular'){
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
                                     '2'=> array('Matricular curso','#')));
  		$this->load->view('plantillas/header');
  		$this->load->view('jugador/menu',$data);
      $this->load->view('jugador/matricular');
  		$this->load->view('plantillas/footer');
    }elseif($vista==='cancelar'){
      $data = array('bread' => array('1'=> array('Página principal',base_url().'index.php/login/jugador'),
                                     '2'=> array('Cancelar curso','#')));
  		$this->load->view('plantillas/header');
  		$this->load->view('jugador/menu',$data);
      $this->load->view('jugador/cancelar');
  		$this->load->view('plantillas/footer');
    }else {
      $this->load->view('error404');
    }

	}

}
