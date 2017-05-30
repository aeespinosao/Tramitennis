<?php

Class Autenticacion extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Load database
        $this->load->model('Usuario');
    }

// Show login page
    public function index() {
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

// Show registration page
    public function nuevo() {
        $this->load->view('registration_form');
    }

// Validate and store registration data in database
    public function crear() {

// Check validation for user input in SignUp form
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required');
        $this->form_validation->set_rules('cedula', 'Cedula', 'trim|required');
        $this->form_validation->set_rules('telefono', 'Telefono', 'trim|required');
        $this->form_validation->set_rules('correo', 'Correo', 'trim|required');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registration_form');
        } else {
            $data = array(
                'nombre' => $this->input->post('username'),
                'cedula' => $this->input->post('username'),
                'telefono' => $this->input->post('username'),
                'correo' => $this->input->post('email_value'),
                'password' => $this->input->post('password')
            );
            $result = $this->Usuario->crear($data);
            if ($result == TRUE) {
                $data['message_display'] = 'Se ha registrado correctamente !';
                $this->load->view('plantillas/header.php');
                $this->load->view('login_form', $data);
                $this->load->view('plantillas/footer.php');
            } else {
                $data['message_display'] = 'El usuario ya existe!';
                $this->load->view('registration_form', $data);
            }
        }
    }

// Check for user login process
    public function login() {

        $this->form_validation->set_rules('correo', 'Correo', 'trim|required');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
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
        } else {
            $data = array(
                'correo' => $this->input->post('correo'),
                'password' => $this->input->post('password')
            );
            $result = $this->Usuario->login($data);
            if ($result == TRUE) {

                $correo = $this->input->post('correo');
                $result = $this->Usuario->obtener($correo);
                if ($result != false) {
                    $session_data = array(
                        'nombre' => $result[0]->nombre,
                        'correo' => $result[0]->correo,
                    );
// Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('plantillas/header');

                    $usuario = $this->Usuario->obtener($session_data['correo']);
                    $data = array('bread' => array('1'=> array('Página principal','#')));
                    if($this->Usuario->is_admin($usuario[0]->cedula)){
                        $this->load->view('administrador/menu',$data);
                    }else{
                        $this->load->view('jugador/menu',$data);
                    }

                    $this->load->view('plantillas/footer');
                }
            } else {
                $data = array(
                    'error_message' => 'Correo o Contraseña invalido'
                );
                $this->load->view('plantillas/header.php');
                $this->load->view('login_form', $data);
                $this->load->view('plantillas/footer.php');

            }
        }
    }

// Logout from admin page
    public function logout() {

// Removing session data
        $sess_array = array(
            'correo' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $this->load->view('plantillas/header.php');
        $this->load->view('login_form');
        $this->load->view('plantillas/footer.php');

    }

}

?>