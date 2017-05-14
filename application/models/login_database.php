<?php

Class Login_Database extends CI_Model {

// Insert registration data in database
    public function registration_insert($data) {

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
        } else {
            return false;
        }
    }

// Read data using username and password
    public function login($data) {

        $condition = "correo =" . "'" . $data['correo'] . "' AND " . "password =" . "'" . $data['password'] . "'";
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
    public function read_user_information($correo) {

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

}

?>