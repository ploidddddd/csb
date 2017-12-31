<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cSoftware extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
      $this->load->model('MEmployee');
      $this->load->model('MBranch');
      $this->load->model('MDevice');
      $this->load->model('MLogs');
      $this->load->model('MSoftware');
      $this->load->model('MUser');
      $this->load->library('session');
     	
  	}

    public function index()
    {
      $this->load->view('imports/vHeader');
      $this->load->view('vSoftware');
      $this->load->view('imports/vFooter');
    }

    public function displaySoftwares()
    {

      $this->load->view('imports/vHeader');
      $this->load->view('vSoftware',array());
      $this->load->view('imports/vFooter');
    }

    public function getSoftwares()
  {
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $dev = $this->MSoftware->getSoftwares();
    // print_r($dev);
    $data = array();

    foreach($dev->result() as $b) {
         // $name =  $b->empFName.' '.$b->empFName+$b->empFName;
         $data[] = array(
              $b->softwareID,
              $b->softwareName,
              $b->softwareDescription,
              $b->softwareType,
              $b->softwareStatus,
              '<div class="btn-group"><button  id="viewButton" class="btn btn-primary sviewButton" data-id ="'.$b->softwareID.'" data-toggle="modal" data-target="#viewSoftware"><i class="fa fa-eye"></i></button><a class="btn btn-success seditButton" data-id ="'.$b->softwareID.'" data-toggle="modal" data-target="#editSoftware"><i class="fa fa-edit"></i></a><a class="btn btn-danger delete" data-id ="'.$b->softwareID.'" data-toggle="modal" data-target="#deleteSoftware"><i class="fa fa-trash-o"></i></a></div>'
         );
    }

    $output = array(
        "draw" => $draw,
        "recordsTotal" => $dev->num_rows(),
        "recordsFiltered" => $dev->num_rows(),
        "data" => $data
      );
    echo json_encode($output);
    exit();
  }

  public function addSoftware()
  {
    $now = new DateTime(NULL, new DateTimeZone('UTC'));
    $data = array('softwareName' => $this->input->post('name'),
                  'softwareDescription' => $this->input->post('description'),
                  'softwareProdkey' => $this->input->post('prodkey'),
                  'softwareType' => $this->input->post('type'),
                  'softwareStatus' => 'ACTIVE',
                  'softwareAdded' => $now->format('Y-m-d H:i:s'),
                  'softwareAddedBy' => $this->session->userdata['empSession']['userID'],
                  'softwareLastModified' => $now->format('Y-m-d H:i:s'),
                  'softwareLastModifiedBy' => $this->session->userdata['empSession']['userID']
           );

    $result = $this->MSoftware->insert($data);

    if($result){
      redirect('cSoftware','displaySoftwares');
      // $this->displayBranches();
    }
  }

  public function getSoftware($id)
  {
    $data = array('softwareID' => $id);
    // print_r($data);
    $query = $this->MSoftware->read_where($data);



    foreach ($query as $q) {}
      //added by
    $uarr = array('userID' => $q->softwareAddedBy);
    $gquery = $this->MUser->read_where($uarr);
    foreach ($gquery as $g) {}

    $arr = array('empID' => $g->userEmpID);
     $query2 = $this->MEmployee->read_where($arr);

     foreach ($query2 as $q2) {}

    //last modified by
    $uarr2 = array('userID' => $q->softwareLastModifiedBy);
    $gquery2 = $this->MUser->read_where($uarr2);
    foreach ($gquery2 as $g2) {}

    $uarr3 = array('empID' => $g2->userEmpID);
   $query3 = $this->MEmployee->read_where($uarr3);
   foreach ($query3 as $q3) {}


    echo $q->softwareID."/".$q->softwareName."/".$q->softwareDescription."/".$q->softwareStatus."/".$q->softwareAdded."/".$q2->empFName."/".$q2->empMName."/".$q2->empLName."/".$q2->empID."/".$q->softwareLastModified."/".$q3->empFName."/".$q3->empMName."/".$q3->empLName."/".$q3->empID."/".$q->softwareType;
  }


  public function updateSoftware()
  {
    $id = $this->input->post('usoftid');
    $now = new DateTime(NULL, new DateTimeZone('UTC'));
    $data = array( 
                  'softwareName' => $this->input->post('uname'),
                  'softwareDescription' => $this->input->post('udescription'),
                  'softwareType' => $this->input->post('utype'),
                  'softwareProdkey' => $this->input->post('uprodkey'),
                  'softwareLastModified' => $now->format('Y-m-d H:i:s'),
                  'softwareLastModifiedBy' => $this->session->userdata['empSession']['userID']
                  );
      // print_r($data);
    $result = $this->MSoftware->update($id,$data);

    if ($result){
      redirect('cSoftware','displaySoftwares');
    }
    # code...
  }

  public function deleteSoftware1()
  {
    $id = $this->input->post('confirmID');
    $now = new DateTime(NULL, new DateTimeZone('UTC'));

    $data = array('softwareStatus' => 'INACTIVE' ,
                  'softwareLastModified' => $now->format('Y-m-d H:i:s'),
                  'softwareLastModifiedBy' => $this->session->userdata['empSession']['userID'] 
                  );

    $result = $this->MSoftware->update($id,$data);

    if ($result){
      redirect('cSoftware','displaySoftwares');
    }
    # code...
  }





}
