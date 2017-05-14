<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_logged_in() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    $user = $CI->session->userdata('logged_in');
    if (!isset($user)) { return false; } else { return true; }
}

function load_login() {
    header('location: '.base_url().'index.php/user_authentication');
}

function redirect_if_not_logged_in(){
    if(!is_logged_in()) load_login();
}