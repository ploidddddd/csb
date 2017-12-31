<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cEmployee extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
      $this->load->model('MEmployee');
      $this->load->model('MUser');
      $this->load->model('MBranch');
      $this->load->library('session');
     	
  	}


	public function index()
	{
		$this->session->unset_userdata('devSession');
      	// session_destroy();
      	
		$data['branches'] = null;

		$data['branches'] = $this->MBranch->getBranches1();

		$this->load->view('imports/vHeader');
		$this->load->view('vEmployee',$data,array());
		$this->load->view('imports/vFooter');
	}

	public function displayEmployees()
	{
		$this->session->unset_userdata('devSession');
      	// session_destroy();
      	
		$data['branches'] = null;

		$data['branches'] = $this->MBranch->getBranches1();

		$this->load->view('imports/vHeader');
		$this->load->view('vEmployee',$data,array());
		$this->load->view('imports/vFooter');
	}

	public function getEmployees()
	{
		// Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $emp = $this->MEmployee->getEmployees();
          //print_r($emp);
          $data = array();

          foreach($emp->result() as $b) {
               // $name =  $b->empFName.' '.$b->empFName+$b->empFName;
               $data[] = array(
                    $b->empID,
                    $b->empFName.' '.$b->empMName.' '.$b->empLName,
                    $b->empPosition,
                    $b->empBranchCode.'-'.$b->branchName,
                    $b->empStatus,
                    '<div class="btn-group"><button  id="eviewButton" class="btn btn-primary eviewButton" data-id ="'.$b->empID.'" data-toggle="modal" data-target="#viewEmployee"><i class="fa fa-eye"></i></button><a class="btn btn-success eeditButton" href="#" data-id ="'.$b->empID.'" data-toggle="modal" data-target="#updateEmployee"><i class="fa fa-edit"></i></a><a class="btn btn-danger delete" data-id ="'.$b->empID.'" data-toggle="modal" data-target="#deleteEmployee" ><i class="fa fa-trash-o"></i></a></div> '

                   
               );
          }

          $output = array(
              	"draw" => $draw,
	            "recordsTotal" => $emp->num_rows(),
	            "recordsFiltered" => $emp->num_rows(),
	            "data" => $data
            );
          echo json_encode($output);
          exit();
		# code...
	}

	public function addEmployee()
	{
		$now = new DateTime(NULL, new DateTimeZone('UTC'));
		$data = array('empID' => $this->input->post('id'),
					  'empFName' => $this->input->post('fname'),
					  'empMName' => $this->input->post('mname'),
					  'empLName' => $this->input->post('lname'),
					  'empPosition' => $this->input->post('position'),
					  'empBranchCode' => $this->input->post('branch'),
					  'empStatus' => 'ACTIVE',
					  'empAddedBy' => $this->session->userdata['empSession']['userID'],
					  'empAdded' => $now->format('Y-m-d H:i:s'),
					  'empLastModifiedBy' => $this->session->userdata['empSession']['userID'],
					  'empLastModified' => $now->format('Y-m-d H:i:s')
					 );

		$result = $this->MEmployee->insert($data);

		if($result){
			redirect('cEmployee','displayEmployees');
			// $this->displayEmployees();
		}
		# code...
	}

	public function getEmployee($id)
	{
		$data = array('empID' => $id);
		// print_r($data);
		$query = $this->MEmployee->read_where($data);

		if ($query) {
		
			foreach ($query as $q) {}
	
			$array = array('userID' => $q->empLastModifiedBy);
			$result = $this->MUser->read_where($array);

			foreach ($result as $k) {}
			// print_r($result);
			$array = array('empID' => $k->userEmpID);
			$res = $this->MEmployee->read_where($array);

			foreach ($res as $ko) {}

			$info = array('branchCode' => $q->empBranchCode );
			$return = $this->MBranch->read_where($info);
	
			foreach ($return as $r) {}
		
			echo $q->empID."/".$q->empFName."/".$q->empMName."/".$q->empLName."/".$q->empPosition."/".$q->empBranchCode."/".$q->empStatus."/".$q->empLastModifiedBy."/".$q->empLastModified."/".$r->branchName."/".$ko->empFName."/".$ko->empLName."/".$ko->empMName;
		}
		
		# code...
	}

	public function updateEmployee()
	{
		$id = $this->input->post('uuid');
		// print_r($id);
		$now = new DateTime(NULL, new DateTimeZone('UTC'));
		$data = array('empFName' => $this->input->post('ufname'), 
  					  'empMName' => $this->input->post('umname'),
  					  'empLName' => $this->input->post('ulname'),
  					  'empPosition' => $this->input->post('uposition'),
  					  'empBranchCode' => $this->input->post('ubranch'),
  					  'empLastModifiedBy' => $this->session->userdata['empSession']['userID'],
  					  'empLastModified' => $now->format('Y-m-d H:i:s')
 					 );
			// print_r($data);

		// print_r($data);
		$result = $this->MEmployee->update($id,$data);

		if ($result){
			redirect('cEmployee','displayEmployees');
			// $this->displayEmployees();
		}
		# code...
	}

	public function deleteEmployee()
	{
		$now = new DateTime(NULL, new DateTimeZone('UTC'));
		$data = array('empStatus' => 'INACTIVE', 
					  'empLastModifiedBy' => $this->session->userdata['empSession']['userID'],
  					  'empLastModified' => $now->format('Y-m-d H:i:s')
					 );
		$id = $this->input->post('confirmID');

		$result = $this->MEmployee->update($id,$data);

		if ($result){
			// $this->displayEmployees();
			redirect('cEmployee','displayEmployees');
		}
		// print_r($id);
		# code...
	}

}
