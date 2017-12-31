<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cUser extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
      $this->load->model('MEmployee');
      $this->load->model('MUser');
      $this->load->library('session');
     	
  	}

  	public function changePassword()
  	{
      $id = $this->session->userdata['empSession']['userID'];
  		$data = array('userPassword' => hash('sha512',$this->input->post('confirm')) );

    
      $result = $this->MUser->update($id, $data);
      if ($result) {
        redirect('CLogin/userLogout');
      } else {
        $this->index();
      }
  	}

    public function index()
    {

       // $emp = $this->MUser->getUsers();
       // print_r($emp);
      $this->load ->view('imports/vHeader');
      $this->load->view('vUsers');
      $this->load->view('imports/vFooter');
    }

    public function addUser()
    {
      $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
      $data = array('userEmpID' => $this->input->post('owner'), 
                    'userAddedBy' => $this->session->userdata['empSession']['userID'],
                    'userAdded' => $now->format('Y-m-d H:i:s'),
                    'userLastModified' => $now->format('Y-m-d H:i:s'),
                    'userLastModifiedBy' => $this->session->userdata['empSession']['userID']
      );
      $data = array('userEmpID' =>$this->input->post('owner') );
      $query = $this->MUser->getEmpID($this->input->post('owner'));

      // print_r($query->num_rows());
      if ($query->num_rows() > 0) {
        $data['error'] = array('msg' => 'User Already Exists!' );
        $this->load ->view('imports/vHeader');
        $this->load->view('vUsers',$data);
        $this->load->view('imports/vFooter');
      } else {
        $query = $this->MUser->insert($data);
        if($query){
          redirect('CUser/index');
        } else {
          print_r("ERROR");
        }
      }
      
      # code...
    }

    public function getUsers()
    {
      // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $emp = $this->MUser->getUsers();
          //print_r($emp);
          $data = array();

          foreach($emp->result() as $b) {
               // $name =  $b->empFName.' '.$b->empFName+$b->empFName;
               $data[] = array(
                    $b->userID,
                    $b->userEmpID,
                    $b->userStatus,
                    $b->userLastModifiedBy,
                    '<div class="btn-group"><button  id="resetPassword" class="btn btn-primary eviewButton" data-id ="'.$b->userID.'" data-toggle="modal" data-target="#prompt3"><i class="fa fa-undo"></i> Reset</button><button id="activateUser" class="btn btn-success" data-id ="'.$b->userID.'" data-toggle="modal" data-target="#prompt5"><i class="fa fa-plus-square"></i> Activate</button><button id="deleteUser" class="btn btn-danger" data-id ="'.$b->userID.'" data-toggle="modal" data-target="#prompt4"><i class="fa fa-trash-o"></i> Delete</button></div>'
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
    }

    public function resetPassword()
    {
      $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
      $id = $this->input->post('userID');
      
      $data = array('userPassword' => '123456',
                    'userLastModifiedBy' =>  $this->session->userdata['empSession']['userID'],
                    'userLastModified' => $now->format('Y-m-d H:i:s')
                    );

      $query = $this->MUser->update($id, $data);
      if($query){

        redirect('CUser/index');
      } else {
        print_r("ERROR");
      }
      
    }

    public function deleteUser()
    {
      $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
      $id = $this->input->post('duserID');
      
      $data = array('userStatus' => 'INACTIVE',
                    'userLastModifiedBy' =>  $this->session->userdata['empSession']['userID'],
                    'userLastModified' => $now->format('Y-m-d H:i:s')
                    );

      $query = $this->MUser->update($id, $data);
      if($query){
        redirect('CUser/index');
      } else {
        print_r("ERROR");
      }
      
    }

    public function activateUser()
    {
      $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
      $id = $this->input->post('auserID');
      
      $data = array('userStatus' => 'ACTIVE',
                    'userLastModifiedBy' =>  $this->session->userdata['empSession']['userID'],
                    'userLastModified' => $now->format('Y-m-d H:i:s')
                    );

      $query = $this->MUser->update($id, $data);
      if($query){
        redirect('CUser/index');
      } else {
        print_r("ERROR");
      }
      
    }


}
