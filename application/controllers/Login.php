<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function administrador()
	{
		$this->load->view('plantillas/header.php');
		$this->load->view('administrador/menu.php');
		$this->load->view('plantillas/footer.php');
	}

  public function jugador()
	{
		$this->load->view('plantillas/header.php');
		$this->load->view('jugador/menu.php');
		$this->load->view('plantillas/footer.php');
	}
}
