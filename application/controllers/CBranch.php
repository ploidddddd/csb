<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cBranch extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
      $this->load->model('MBranch');
      $this->load->library('session');
     	
  	}


	public function index()
	{

		$this->load->view('imports/vHeader');
		$this->load->view('vBranches',array());
		$this->load->view('imports/vFooter');
	}

	public function displayBranches()
	{
		$this->session->unset_userdata('devSession');
      	// session_destroy();
      	
		$this->load->view('imports/vHeader');
		$this->load->view('vBranches',array());
		$this->load->view('imports/vFooter');
	}

	public function getBranches()
	{
		// Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $branch = $this->MBranch->getBranches();

          $data = array();

          foreach($branch->result() as $b) {
               $data[] = array(
                    $b->branchCode,
                    $b->branchName,
                    $b->branchRegion,
                    $b->branchStatus,
                    '<div class="btn-group"><button  id="viewButton" class="btn btn-primary viewButton" data-id ="'.$b->branchCode.'" data-toggle="modal" data-target="#viewBranch"><i class="fa fa-eye"></i></button><a class="btn btn-success editButton" href="#" data-id ="'.$b->branchCode.'" data-toggle="modal" data-target="#editBranch"><i class="fa fa-edit"></i></a><a class="btn btn-danger" data-target="#deleteBranch" data-toggle="modal"><i class="fa fa-trash-o"></i></a></div>'
               );
          }

          $output = array(
              	"draw" => $draw,
	            "recordsTotal" => $branch->num_rows(),
	            "recordsFiltered" => $branch->num_rows(),
	            "data" => $data
            );
          echo json_encode($output);
          exit();
		# code...
	}

	public function addBranch()
	{
		$data = array('branchCode' => $this->input->post('code'),
					  'branchName' => $this->input->post('name'),
					  'branchRegion' => $this->input->post('region'),
					  'branchAddress' => $this->input->post('address'),
					  'branchStatus' => 'ACTIVE'
					 );

		$result = $this->MBranch->insert($data);

		if($result){
			redirect('cBranch','displayBranches');
			// $this->displayBranches();
		}
		# code...
	}

	public function getBranch($id)
	{
		$data = array('branchCode' => $id);

		$query = $this->MBranch->read_where($data);

		foreach ($query as $q) {}
		
		echo $q->branchCode."/".$q->branchName."/".$q->branchRegion."/".$q->branchAddress."/".$q->branchStatus;
		# code...
	}

	public function updateBranch()
	{
		$id = $this->input->post('ecode');

		$data = array('branchCode' => $this->input->post('ecode'), 
  					  'branchName' => $this->input->post('ename'),
  					  'branchRegion' => $this->input->post('eregion'),
  					  'branchAddress' => $this->input->post('eaddress')
					 );
			// print_r($data);
		$result = $this->MBranch->update($id,$data);

		if ($result){
			redirect('cBranch','displayBranches');
		}
		# code...
	}

	public function deleteBranch($id)
	{
		$data = array('branchStatus' => 'INACTIVE' );

		$result = $this->MBranch->update($id,$data);

		if ($result){
			// $this->displayBranches();
			redirect('cBranch','displayBranches');
		}
		// print_r($id);
		# code...
	}

}
