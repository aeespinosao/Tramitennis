<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('plantillas/header.php');
      $this->load->view('login_form');
		$this->load->view('plantillas/footer.php');
	}
}
