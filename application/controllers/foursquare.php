<?php 

require_once '../libraries/FoursquareAPI.class.php';

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FoursquareAPI extends CI_Controller {
    
    public function index() {
        $this->load->view('welcome_message');
    }
    
}

