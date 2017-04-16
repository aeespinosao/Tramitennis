<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cancha extends CI_Model {
	public $numero;

	public function get_all(){
		$this->load->database();
		$query = $this->db->get('cancha');
		return $query->result();
	}
}?>
	