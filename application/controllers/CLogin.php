<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');


  class CLogin extends CI_Controller {

    public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
     	$this->load->model('MEmployee');
      $this->load->model('MUser');
      $this->load->model('MSoftware');
      $this->load->library('session');
  	}

    public function userLogin()
    {
      $pass = $this->input->post('empPassword');
      $this->MUser->setUserEmpID($this->input->post('empID'));
      $this->MUser->setUserPassword( hash('sha512',$this->input->post('empPassword')) );

      $result = $this->MUser->attempLogin();
    
      if ($result) {
        $this->createSession($result,$pass);
        $this->index();
      } else{
        $data['error'] = array('msg' => 'Invalid Login Attempt.' );
        // print_r($data);
        $this->load->view('vLogin',$data);
        //redirect('Welcome');
      }
      
    }

    public function index()
    {

      $this->load ->view('imports/vHeader');
      $this->load->view('vDashboard');
      $this->load->view('imports/vFooter');
    }

    public function createSession($result,$pass)
    {
      $emp = new MEmployee();
      foreach ($result as $row) {
      $sessionData = array('empID' => $row->empID, 
                           'userID' => $row->userID, 
                           'userPassword' => $pass,
                           'empName' =>  $row->empFName." ".$row->empMName." ".$row->empLName,
                           'empPosition' => $row->empPosition
                      );

        $this->session->set_userdata('empSession', $sessionData);
      }
    // print_r($sessionData);
    }

    public function userLogout()
    {
      $this->session->unset_userdata('empSession');
      $this->session->unset_userdata('devSession');
      session_destroy();
      // session_destroy();
      redirect('Welcome');
      # code...
    }

    public function radio()
    {
      $val = $this->input->post('os');
      $val2 = $this->input->post('office');
      $val3 = $this->input->post('special');
      $val4 = $this->input->post('anti');
     
      

    } 
  	
  }


?>


