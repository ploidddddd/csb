<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cInstall extends CI_Controller {

	public function __Construct(){
      	parent::__Construct ();
      	$this->load->database(); // load database
      $this->load->model('MEmployee');
      $this->load->model('MBranch');
      $this->load->model('MDevice');
      $this->load->model('MLogs');
      $this->load->model('MUser');
      $this->load->model('MSoftware');
      $this->load->model('MInstall');
      $this->load->library('session');
     	
  	}


	public function index()
	{
		print_r($this->session->userdata['devSession']['deviceID']);
	}



	public function getInstalled()
	{
		 $id = $this->session->userdata['devSession']['deviceID'];
		 $draw = intval($this->input->get("draw"));
         $start = intval($this->input->get("start"));
         $length = intval($this->input->get("length"));

          
        $ins = $this->MInstall->getInstalled($id);

        $data = array();


        foreach($ins->result() as $b) {
          $query = $this->MUser->getUser($b->softwareLastModifiedBy);
               $data[] = array(
                    $b->installID,
                    $b->softwareName,
                    date('Y-m-d h:i a', strtotime($b->installLastModified)),
                    $b->installLastModifiedBy." - ".$query[0]->empFName." ".$query[0]->empMName." ".$query[0]->empLName,
                    $b->installStatus,
                    '<div class="btn-group"><a  id="lviewButton" class="btn btn-primary lviewButton" data-id ="'.$b->installID.'" data-toggle="modal" data-target="#viewLog"><i class="fa fa-eye"></i> View Log</a></div>',
               );
          }

          $output = array(
              "draw" => $draw,
              "recordsTotal" => $ins->num_rows(),
              "recordsFiltered" => $ins->num_rows(),
              "data" => $data
            );
          echo json_encode($output);
          exit();
		
	}



  public function installSoftware()
  { 
    $id = $this->input->post('deviceID');
    $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
    $data = array('installSoftwareID' => $this->input->post('software') , 
                  'installDeviceID' => $this->input->post('deviceID'),
                  'installStatus' => 'INSTALLED',
                  'installAdded' => $now->format('Y-m-d H:i:s a'),
                  'installAddedBy' => $this->session->userdata['empSession']['userID'],
                  'installLastModified' => $now->format('Y-m-d H:i:s a'),
                  'installLastModifiedBy' => $this->session->userdata['empSession']['userID']
                  );
    $query = $this->MInstall->insert($data);
    if ($query) {
       redirect('cDevice/viewDevice/'.$id);
    // echo date('M j Y g:i A', strtotime($now->format('Y-m-d H:i:s')));
   
  //   print_r($data['data']);
  // print_r("\n");
    // print_r(date('M j Y g:i A', strtotime($b->softwareLastModified)));
    } else {
      print_r("ERROR!!!");
    }
  }

    public function uninstallSoftware()
  { 
    $id = $this->input->post('udeviceID');
    $uid = $this->input->post('usoftware');
    $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
    $data = array('installStatus' => 'UNINSTALLED',
                  'installLastModified' => $now->format('Y-m-d H:i:s a'),
                  'installLastModifiedBy' => $this->session->userdata['empSession']['userID']
                  );

    $query = $this->MInstall->update($this->input->post('usoftware'),$data);
    if ($query) {
       redirect('cDevice/viewDevice/'.$id);
    } else {
      print_r("ERROR!!!");
    }
  }
  






}
