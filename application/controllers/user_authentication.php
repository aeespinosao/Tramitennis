<?php

Class User_Authentication extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Load database
        $this->load->model('login_database');
    }

// Show login page
    public function index() {
        $this->load->view('plantillas/header.php');
        $this->load->view('login_form');
        $this->load->view('plantillas/footer.php');
    }

// Show registration page
    public function user_registration_show() {
        $this->load->view('registration_form');
    }

// Validate and store registration data in database
    public function new_user_registration() {

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
            $result = $this->login_database->registration_insert($data);
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
    public function user_login_process() {

        $this->form_validation->set_rules('correo', 'Correo', 'trim|required');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['logged_in'])){
                $data = array('bread' => array('1'=> array('Página principal','#')));
                $this->load->view('plantillas/header');
                $this->load->view('jugador/menu',$data);
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
            $result = $this->login_database->login($data);
            if ($result == TRUE) {

                $correo = $this->input->post('correo');
                $result = $this->login_database->read_user_information($correo);
                if ($result != false) {
                    $session_data = array(
                        'nombre' => $result[0]->nombre,
                        'correo' => $result[0]->correo,
                    );
// Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $data = array('bread' => array('1'=> array('Página principal','#')));
                    $this->load->view('plantillas/header');
                    $this->load->view('jugador/menu',$data);
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