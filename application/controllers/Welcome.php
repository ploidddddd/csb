<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __Construct(){
    	parent::__Construct ();
     	$this->load->database(); // load database
     	$this->load->library('session');
  	}
 	
	public function index()
	{
		if($this->session->userdata('empSession')){
			redirect('cLogin/index');
		} else {
			$this->load->view('vLogin');
		}
	}
}
