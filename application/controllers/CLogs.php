<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cLogs extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
      $this->load->model('MEmployee');
      $this->load->model('MBranch');
      $this->load->model('MDevice');
      $this->load->model('MLogs');
      $this->load->library('session');
      // $this->load->CI_Controller('CDevice');
     	
  	}

    public function index()
    {
       $id = $id = $this->session->userdata['devSession']['deviceID'];
       $log = $this->MLogs->getLogs($id);
       print_r($log->result());
      # code...
    }

    public function displayDevices()
  {
    $this->session->unset_userdata('devSession');
        // session_destroy();
    // $dev = $this->MDevice->getWorkingDevices();
  //         print_r($dev);
    $this->load->view('imports/vHeader');
    $this->load->view('vDevice',array());
    $this->load->view('imports/vFooter');
  }

  public function getLogs()
  {
    $draw = intval($this->input->get("draw"));
         $start = intval($this->input->get("start"));
         $length = intval($this->input->get("length"));

          // $id = $this->session->userdata['devSession']['deviceSerialNO'];
          // $log = $this->MLogs->getLogs($id);

          $id = $id = $this->session->userdata['devSession']['deviceID'];;
          $log = $this->MLogs->getLogs($id);

          $data = array();

           // $query = $this->MEmployee->getEmployee($b->logMadeBy);
           //  foreach ($query as $q) {}


          foreach($log->result() as $b) {
               // $name =  $b->empFName.' '.$b->empFName+$b->empFName;
            //$id = $b->logMadeBy;
            $query = $this->MEmployee->getEmployee($b->logMadeBy);
               $data[] = array(
                    $b->logID,
                    $b->logRemarks,
                    $b->logStamp,
                    $b->logMadeBy." - ".$query[0]->empFName." ".$query[0]->empMName." ".$query[0]->empLName,
                    '<div class="btn-group"><a  id="lviewButton" class="btn btn-primary lviewButton" data-id ="'.$b->logID.'" data-toggle="modal" data-target="#viewLog"><i class="fa fa-eye"></i></a><a class="btn btn-danger" href="http://localhost/citysavings/index.php/cEmployee/deleteEmployee/'.$b->logID.'" data-id ="'.$b->logID.'"><i class="fa fa-trash-o"></i></a></div>'
                    // $b->empFName.' '.$b->empMName.' '.$b->empLName,
                    // $b->empPosition,
                    // $b->empBranchCode.'-'.$b->branchName,
                    // $b->empStatus,
               );
          }

          $output = array(
                "draw" => $draw,
              "recordsTotal" => $log->num_rows(),
              "recordsFiltered" => $log->num_rows(),
              "data" => $data
            );
          echo json_encode($output);
          exit();

    # code...
  }

  public function getLog($id)
  {
    $data = array('logID' => $id);
    // print_r($data);
    $query = $this->MLogs->read_where($data);



    foreach ($query as $q) {}

    $arr = array('deviceSerialNO' => $q->logDeviceSerial );
     $query2 = $this->MDevice->read_where($arr);

     foreach ($query2 as $q2) {}

    $arr2 = array('branchCode' => $q->logBranchCode );
   $query3 = $this->MBranch->read_where($arr2);
   foreach ($query3 as $qq) {}

    $arr3 = array('empID' => $q->logOwner );
   $query4 = $this->MEmployee->read_where($arr3);
   foreach ($query4 as $q3) {}

    $arr4 = array('empID' => $q->logMadeBy );
   $query5 = $this->MEmployee->read_where($arr4);
   foreach ($query5 as $q4) {}



    echo $q->logID."/".$q->logRemarks."/".$q->logDescription."/".$q->logStamp."/".$q->logDeviceSerial."/".$q->logBranchCode."/".$q2->deviceName."/".$qq->branchName."/".$q->logOwner."/".$q3->empFName."/".$q3->empMName."/".$q3->empLName."/".$q->logMadeBy."/".$q4->empFName."/".$q4->empMName."/".$q4->empLName;
  }

  public function getLog1($id)
  {
    $data = array('deviceSerialNO' => $id);
    // print_r($data);
    $query = $this->MDevice->read_where($data);

    foreach ($query as $q) {}



    echo $q->deviceSerialNO."/".$q->deviceLocation."/".$q->deviceOwner;
  }


  public function addLog()
  {
    $now = new DateTime(NULL, new DateTimeZone('UTC'));
    $data = array('logRemarks' => $this->input->post('remarks'),
            'logDescription' => $this->input->post('description'),
            'logDeviceSerial' => $this->input->post('serial'),
            'logBranchCode' => $this->input->post('branch'),
            'logOwner' => $this->input->post('owner'),
            'logStamp' => $now->format('Y-m-d H:i:s'),
            'logMadeBy' => $this->session->userdata['empSession']['empID']
           );

    $result = $this->MLogs->insert($data);

    if($result){
      $id = $this->input->post('serial');
      if ($this->input->post('remarks') == 'DISPOSE'){
        $data = array('deviceLastSupportBy' => $this->session->userdata['empSession']['empID'], 
                    'deviceLastSupport' => $now->format('Y-m-d H:i:s'),
                    'deviceLocation' => $this->input->post('branch'),
                    'deviceOwner' => $this->input->post('owner'),
                    'deviceStatus' => 'DISPOSED'
                    );
        $query = $this->MDevice->update($id,$data);

      } else {
        $data = array('deviceLastSupportBy' => $this->session->userdata['empSession']['empID'], 
                    'deviceLastSupport' => $now->format('Y-m-d H:i:s'),
                    'deviceLocation' => $this->input->post('branch'),
                    'deviceOwner' => $this->input->post('owner')
                    );
        $query = $this->MDevice->update($id,$data);
      }
      
      if($query){
         redirect('cDevice/viewDevice/'.$id);
         //$this->viewDevice($id);
      }
     
    }
    # code...
  }




}
