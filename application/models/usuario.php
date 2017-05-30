<?php

Class Usuario extends CI_Model {

    public $nombre;
    public $cedula;
    public $telefono;
    public $correo;
    public $password;

// Insert registration data in database
    public function crear($data) {

// Query to check whether username already exist or not
        $condition = "correo =" . "'" . $data['correo'] . "'";
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {

// Query to insert data in database
            $this->db->insert('usuario', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        }
        return false;
    }

// Read data using username and password
    public function login($data) {

        $condition = "correo =" . "'" . $data['correo'] . "' AND " . "password  =" . "'" . $data['password'] . "' COLLATE latin1_general_cs";
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

// Read data from database to show data in admin page
    public function obtener($correo) {
        $condition = "correo =" . "'" . $correo . "'";
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function obtener_actual(){
        if($logged_in = $this->session->userdata['logged_in']){
            $usuario = $this->obtener($logged_in['correo']);
            if($usuario) return $usuario[0];
        }
        return false;
    }

    public function is_admin($cedula){
        $this->load->model('Administrador');
        if(!$this->Administrador->obtener($cedula)) return false;
        return true;
    }

}

?>