<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cPeripherals extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
      $this->load->model('MEmployee');
      $this->load->model('MBranch');
      $this->load->model('MDevice');
      $this->load->model('MLogs');
      $this->load->model('MUser');
      $this->load->model('MSoftware');
      $this->load->model('MPeripherals');
      $this->load->model('MInstall');
      $this->load->library('session');  	
  }

  public function index()
  {

    $peri = $this->MPeripherals->getPeripherals(1);
    print_r($peri->result());
    # code...
  }

  public function getPeripherals()
  {
    $id = $this->session->userdata['devSession']['deviceID'];
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
 
    $peri = $this->MPeripherals->getPeripherals($id);
    $data = array();


    foreach($peri->result() as $p) {
      $query = $this->MUser->getUser($p->peripheralAddedBy);
           $data[] = array(
            $p->peripheralID,
            $p->peripheralType,
            $p->peripheralBrand,
            $p->peripheralSerialNo,
            '<a class="btn btn-danger peri"  data-toggle="modal" data-target="#disposePeripheral" data-id ="'.$p->peripheralID.'"><i class="fa fa-trash-o"></i> Dispose</a></div>'
           );
      }

      $output = array(
          "draw" => $draw,
          "recordsTotal" => $peri->num_rows(),
          "recordsFiltered" => $peri->num_rows(),
          "data" => $data
        );
      echo json_encode($output);
      exit();

  }

  public function addPeripheral()
  {
    $id = $this->input->post('pdeviceID');
    $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
    $data = array('peripheralType' => $this->input->post('ptype'), 
                  'peripheralBrand' => $this->input->post('pbrand'),
                  'peripheralSerialNo' => $this->input->post('pserial'),
                  'peripheralDeviceID' => $id,
                  'peripheralStatus' => 'WORKING',
                  'peripheralAdded' => $now->format('Y-m-d H:i:s a'),
                  'peripheralAddedBy' => $this->session->userdata['empSession']['userID']
                  );

    $query = $this->MPeripherals->insert($data);
    if ($query) {
      redirect('CDevice/viewDevice/'.$id);
      # code...
    } else {
      print_r('ERROR!');
    }
  }


  public function disposePeripheral()
  {
    $id = $this->input->post('periID');
    $devID = $this->session->userdata['devSession']['deviceID'];
    $now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));
      $data = array('peripheralStatus' => 'NOT WORKING'
                    // 'userLastModifiedBy' =>  $this->session->userdata['empSession']['userID'],
                    // 'userLastModified' => $now->format('Y-m-d H:i:s')
                    );

      $query = $this->MPeripherals->update($id, $data);
      if($query){
         redirect('CDevice/viewDevice/'.$devID);
      } else {
        print_r("ERROR");
      }
    # code...
  }

	 





}
