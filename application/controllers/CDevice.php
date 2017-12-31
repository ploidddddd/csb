<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cDevice extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->database(); // load database
      $this->load->model('MEmployee');
      $this->load->model('MBranch');
      $this->load->model('MDevice');
      $this->load->model('MLogs');
      $this->load->model('MSoftware');
      $this->load->model('MInstall');
      $this->load->library('session'); 
      $this->load->helper(array('url'));
      $url = $this->config->site_url();
      $this->urlSite = $url.'/CDevice/viewEditDevice/';
     	
  	}


	public function index()
	{

		$this->load->view('imports/vHeader');
		$this->load->view('vDevice');
		$this->load->view('imports/vFooter');
	}

  public function viewAddDevice()
  {

    $data['opreating'] = null;
    $data['operating'] = $this->MSoftware->getOSSoftwares();

    $data['office'] = null;
    $data['office'] = $this->MSoftware->getOfficeSoftwares();

    $data['anti'] = null;
    $data['anti'] = $this->MSoftware->getAntiSoftwares();

    $data['special'] = null;
    $data['special'] = $this->MSoftware->getSpecialSoftwares();

    $data['browser'] = null;
    $data['browser'] = $this->MSoftware->getBrowserSoftwares();

    $data['branch'] = null;
    $data['branch'] = $this->MBranch->getBranches1();

    $this->load->view('imports/vHeader');
    $this->load->view('vAddDevice',$data);
    $this->load->view('imports/vFooter');
  }

  public function viewEditDevice($id)
  {
    $data['details'] = null;
    $data['details'] = $this->MDevice->getDevice($id);

    foreach ($data['details'] as $d) {}

    $id = $d->deviceOwner;
    $data['owner'] = null;
    $data['owner'] = $this->MEmployee->read($id);

    foreach ($data['owner'] as $o) {}
    
    $bid = $o->empBranchCode;
    
    $data['branch'] = null;
    $data['branch'] = $this->MBranch->read($bid);

    $bid1 = $d->deviceLocation;
    
    $data['branch2'] = null;
    $data['branch2'] = $this->MBranch->read($bid1);

    $data['branch1'] = null;
    $data['branch1'] = $this->MBranch->getBranches1();

    $this->load->view('imports/vHeader');
    $this->load->view('vEditDevice',$data);
    $this->load->view('imports/vFooter');

    # code...
  }



	public function displayDevices()
	{
    $data['branches'] = null;
    $data['branches'] = $this->MBranch->getBranches1(); 

    $data['employees'] = null;
    $data['employees'] = $this->MEmployee->getEmployees2(); 

		$this->load->view('imports/vHeader');
		$this->load->view('vDevice',$data,array());
		$this->load->view('imports/vFooter');
	}

	public function displayDisposed()
	{

		$this->load->view('imports/vHeader');
		$this->load->view('vDisposed');
		$this->load->view('imports/vFooter');
	}


  public function displayRepair()
  {
    $this->load->view('v404');
  }


	public function getWorkingDevices()
	{
		$draw = intval($this->input->get("draw"));
         $start = intval($this->input->get("start"));
         $length = intval($this->input->get("length"));


          $dev = $this->MDevice->getWorkingDevices1();
          $data = array();

          foreach($dev->result() as $b) {
               $data[] = array(
                    $b->deviceSerialNo,
                    $b->deviceName,
                    $b->deviceBrand,
                    $b->deviceType,
                    $b->deviceOwner .'-'.$b->empFName.' '.$b->empMName.' '.$b->empLName,
                    $b->deviceStatus,
                    '<div class="btn-group"><a  id="dviewButton" class="btn btn-primary" data-id ="'.$b->deviceID.'" href="http://localhost/csb/index.php/CDevice/viewDevice/'.$b->deviceID.'"><i class="fa fa-eye"></i></a><a class="btn btn-success" href="'.$this->urlSite.''.$b->deviceID.'" data-id ="'.$b->deviceID.'" ><i class="fa fa-edit"></i></a><a class="btn btn-danger delete"  data-toggle="modal" data-target="#deleteDevice" data-id ="'.$b->deviceID.'"><i class="fa fa-trash-o"></i></a></div>'
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

  public function getDisposedDevices()
  {
    $draw = intval($this->input->get("draw"));
     $start = intval($this->input->get("start"));
     $length = intval($this->input->get("length"));


      $dev = $this->MDevice->getDisposedDevices();
      $data = array();

      foreach($dev->result() as $b) {
           $data[] = array(
                $b->deviceSerialNo,
                $b->deviceName,
                $b->deviceBrand,
                $b->deviceType,
                $b->deviceOwner .'-'.$b->empFName.' '.$b->empMName.' '.$b->empLName,
                $b->deviceStatus,
                '<div class="btn-group"><a  id="dviewButton" class="btn btn-primary" data-id ="'.$b->deviceID.'" href="http://localhost/csb/index.php/CDevice/viewDevice/'.$b->deviceID.'"><i class="fa fa-eye"></i></a><a class="btn btn-success updateDevice" href="#" data-id ="'.$b->deviceID.'" data-toggle="modal" data-target="#updateDevice"><i class="fa fa-edit"></i></a><a class="btn btn-danger delete"  data-toggle="modal" data-target="#deleteDevice" data-id ="'.$b->deviceID.'"><i class="fa fa-trash-o"></i></a></div>'
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


  public function viewDevice($id)
  {
    
     $data['device'] = null;
    $data['device'] = $this->MDevice->getDevice($id);

    foreach ($data['device'] as $d) {}

    // print_r($d);

    $data['owner'] = null;
    $data['owner'] = $this->MEmployee->getEmployee($d->deviceOwner);

    foreach ($data['owner'] as $o) {}

    $data['branch'] = null;
    $data['branch'] = $this->MBranch->getBranch($o->empBranchCode);

    
    $data['branch1'] = null;
    $data['branch1'] = $this->MBranch->getBranch($d->deviceLocation);
    $this->createSession($this->MDevice->getDevice($id));

    $data['install'] = null;
    $data['install'] = $this->MInstall->getInstalled2($id);
    
    $data['softs'] = null;
    $data['softs'] = $this->MSoftware->notInstalled($id);

     $data['softs1'] = null;
    $data['softs1'] = $this->MInstall->getInstalled2($id);

    $this->load->view('imports/vHeader');
    $this->load->view('vDeviceDetails',$data);
    $this->load->view('imports/vFooter');
  
  }

	public function createSession($data)
    {
      //$emp = new MEmployee();
      foreach ($data as $row) {
      $sessionData = array('deviceID' => $row->deviceID,
                          'deviceSerialNo' => $row->deviceSerialNo
                      );

        $this->session->set_userdata('devSession', $sessionData);
      }
    }

  public function addDevice()
  {
    $now = new DateTime(NULL, new DateTimeZone('UTC'));
    $empid = $this->input->post('owner');
    $devid = $this->input->post('serial');
    if($this->MDevice->getDevice($devid)){
      $data['error'] = array('msg' => "The Device is Already Added!!!");
      $this->load->view('imports/vHeader');
      $this->load->view('vAddDevice',$data);
      $this->load->view('imports/vFooter');
    } else {
      $data = array('deviceName' => $this->input->post('name'),
        'deviceSerialNo' => $this->input->post('serial'),
        'deviceOwner' => $this->input->post('owner'),
        'deviceLocation' => $this->input->post('location'),
        'deviceBrand' => $this->input->post('dbrand'),
        'deviceType' => $this->input->post('type'),
        'deviceProcessor' => $this->input->post('processor'),
        'deviceMemory' => $this->input->post('memory'),
        'deviceDisk' => $this->input->post('disk'),
        'deviceDiskSerial' => $this->input->post('dserial'),
        'deviceLANIP' => $this->input->post('lanip'),
        'deviceLANMAC' => $this->input->post('macadd'),
        'deviceWLANIP' => $this->input->post('wlanip'),
        'deviceWLANMAC' => $this->input->post('wlanmac'),
        'devicePower' => $this->input->post('power'),
        'deviceStatus' => 'WORKING',
        'deviceAdded' => $now->format('Y-m-d H:i:s'),
        'deviceAddedBy' => $this->session->userdata['empSession']['userID'],
        'deviceLastModified' => $now->format('Y-m-d H:i:s'),
        'deviceLastModifiedBy' => $this->session->userdata['empSession']['userID']
      );

      $query = $this->MDevice->insert1($data);
      $os = $this->input->post('os');
      $office = $this->input->post('office');
      $special = $this->input->post('special');
      $anti = $this->input->post('anti');
      $browser = $this->input->post('browser');

      if ($os != "") {
        $dataOS = array('installSoftwareID' => $this->input->post('os'), 
                        'installDeviceID' => $query,
                        'installStatus' => 'INSTALLED',
                        'installAdded' => $now->format('Y-m-d H:i:s'),
                        'installAddedBy' => $this->session->userdata['empSession']['userID'],
                        'installLastModified' => $now->format('Y-m-d H:i:s'),
                        'installLastModifiedBy' => $this->session->userdata['empSession']['userID']
                      );
        $query1 = $this->MInstall->insert($dataOS);
      } 

      $size = count($office);
        if ($size != 0){
          for ($i=0; $i < $size ; $i++) { 
            $dataOF = array('installSoftwareID' => $office[$i], 
                        'installDeviceID' => $query,
                        'installStatus' => 'INSTALLED',
                        'installAdded' => $now->format('Y-m-d H:i:s'),
                        'installAddedBy' => $this->session->userdata['empSession']['userID'],
                        'installLastModified' => $now->format('Y-m-d H:i:s'),
                        'installLastModifiedBy' => $this->session->userdata['empSession']['userID']
                      );
              $query2 = $this->MInstall->insert($dataOF);
          }
        }
      $size = count($special);
      if ($size != 0){
          for ($i=0; $i < $size ; $i++) { 
            $dataS = array('installSoftwareID' => $special[$i], 
                        'installDeviceID' => $query,
                        'installStatus' => 'INSTALLED',
                        'installAdded' => $now->format('Y-m-d H:i:s'),
                        'installAddedBy' => $this->session->userdata['empSession']['userID'],
                        'installLastModified' => $now->format('Y-m-d H:i:s'),
                        'installLastModifiedBy' => $this->session->userdata['empSession']['userID']
                      );
              $query3 = $this->MInstall->insert($dataS);
          }
        }

       if ($anti != "") {
        $dataOS = array('installSoftwareID' => $this->input->post('anti'), 
                        'installDeviceID' => $query,
                        'installStatus' => 'INSTALLED',
                        'installAdded' => $now->format('Y-m-d H:i:s'),
                        'installAddedBy' => $this->session->userdata['empSession']['userID'],
                        'installLastModified' => $now->format('Y-m-d H:i:s'),
                        'installLastModifiedBy' => $this->session->userdata['empSession']['userID']
                      );
        $query4 = $this->MInstall->insert($dataOS);
      } 

      $size = count($browser);
      if ($size != 0){
          for ($i=0; $i < $size ; $i++) { 
            $dataS = array('installSoftwareID' => $browser[$i], 
                        'installDeviceID' => $query,
                        'installStatus' => 'INSTALLED',
                        'installAdded' => $now->format('Y-m-d H:i:s'),
                        'installAddedBy' => $this->session->userdata['empSession']['userID'],
                        'installLastModified' => $now->format('Y-m-d H:i:s'),
                        'installLastModifiedBy' => $this->session->userdata['empSession']['userID']
                      );
              $query5 = $this->MInstall->insert($dataS);
          }
        }

      redirect('cDevice/displayDevices');

    }
  }

  public function getDevice($id)
  {
      $data = array('deviceID' => $id);

      $query = $this->MDevice->read_where($data);

      foreach ($query as $q) {}

      // echo $q->deviceSerialNO;
      echo $q->deviceSerialNO."/".$q->deviceFName."/".$q->deviceBrand."/".$q->deviceModelNo.
      "/".$q->deviceSoftwares."/".$q->deviceOSProdKey."/".$q->deviceType."/".$q->deviceOwner."/".$q->deviceLocation ;
      
  }

  public function updateDevice()
  {
     $now = new DateTime(NULL, new DateTimeZone('UTC'));
    $id = $this->input->post('devID');

    $data = array('deviceName' => $this->input->post('name'),
        'deviceSerialNo' => $this->input->post('serial'),
        'deviceOwner' => $this->input->post('owner'),
        'deviceLocation' => $this->input->post('location'),
        'deviceBrand' => $this->input->post('dbrand'),
        'deviceType' => $this->input->post('type'),
        'deviceProcessor' => $this->input->post('processor'),
        'deviceMemory' => $this->input->post('memory'),
        'deviceDisk' => $this->input->post('disk'),
        'deviceDiskSerial' => $this->input->post('dserial'),
        'deviceLANIP' => $this->input->post('lanip'),
        'deviceLANMAC' => $this->input->post('macadd'),
        'deviceWLANIP' => $this->input->post('wlanip'),
        'deviceWLANMAC' => $this->input->post('wlanmac'),
        'devicePower' => $this->input->post('power'),
        'deviceStatus' => 'WORKING',
        'deviceLastModified' => $now->format('Y-m-d H:i:s'),
        'deviceLastModifiedBy' => $this->session->userdata['empSession']['userID']
      );
      
      $result = $this->MDevice->update($id,$data);
      if ($result) {
        //$this->viewDevice($this->input->post('userial'));
        redirect('cDevice/viewDevice1/'.$id);
        // print_r($id);
        // print_r($data);
        # code...
      }

  }

  public function disposeDevice()
  {
    $now = new DateTime(NULL, new DateTimeZone('UTC'));
    $data = array('deviceStatus' => 'DISPOSED',
                  'deviceLastModified' => $now->format('Y-m-d H:i:s'),
                  'deviceLastModifiedBy' => $this->session->userdata['empSession']['empID']
                 );
    
    $id = $this->input->post('confirmID');
    $query = $this->MDevice->update($id, $data);
    if ($query) {  
      redirect('cDevice', 'displayDevices');
    }
     
    
  }



}
