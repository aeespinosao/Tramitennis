<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function administrador()
	{
		$data = array('bread' => array('1'=> array('Página principal','#')));
		$this->load->view('plantillas/header');
		$this->load->view('administrador/menu',$data);
		$this->load->view('plantillas/footer');
	}

  public function jugador()
	{
		$data = array('bread' => array('1'=> array('Página principal','#')));
		$this->load->view('plantillas/header');
		$this->load->view('jugador/menu',$data);
		$this->load->view('plantillas/footer');
	}
}
