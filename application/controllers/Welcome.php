<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


    public function index() {
        $this->load->model('Usuario');
        if(isset($this->session->userdata['logged_in'])){
            $this->load->view('plantillas/header');
            $usuario = $this->Usuario->obtener_actual();
            $data = array('bread' => array('1'=> array('Página principal','#')));
            if($this->Usuario->is_admin($usuario->cedula)){
                $this->load->view('administrador/menu',$data);
            }else{
                $this->load->view('jugador/menu',$data);
            }
            $this->load->view('plantillas/footer');
        }else{
            $this->load->view('plantillas/header.php');
            $this->load->view('login_form');
            $this->load->view('plantillas/footer.php');
        }
    }
}
