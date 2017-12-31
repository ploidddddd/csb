<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cFPDF extends CI_Controller {

	public function __Construct(){
      parent::__Construct ();
      $this->load->model('MEmployee');
      $this->load->model('MBranch');
      $this->load->model('MDevice');
      $this->load->model('MLogs');
      $this->load->model('MPeripherals');
      $this->load->model('MSoftware');
      $this->load->model('MInstall');
      $this->load->library('session');
      $this->load->database(); 
      $this->load->library('fpdf');
     	
  	}

  	// $pdf = new FPDF();

	public function index($id)
	{
		$this->fpdf->AddPage();
        $this->fpdf->setTitle("WORKSTATION INFO SHEET");
		$this->Header();
		$this->ContentLayout($id);

		// $this->DataContent();
		// $this->fpdf->SetFont('Arial')
		// $pdf->SetFont('Arial','B',16);
		// $pdf->Cell(40,10,'Hello World!');
		echo $this->fpdf->Output("","WORKSTATION INFO SHEET","");
		// echo anchor($this->fpdf->Output(), 'title="My News"', array('target' => '_blank', 'class' => 'new_window'));
	}

	public function Header()
	{
		// $here = $this->load->view('assets/img/logo.png');
		 $this->fpdf->Image('assets/img/logo.jpg',75,10,60);
    // Arial bold 15
    	$this->fpdf->SetFont('Arial','B',15);
    // // Move to the right
    	$this->fpdf->Cell(42);
    // // Title
    // $this->fpdf->Ln(20);
    	$this->fpdf->Cell(30,50,'WORKSTATION INFO SHEET / CHECKLIST');
    // // Line break
   		$this->fpdf->Ln(30);
		# code...
	}

	public function ContentLayout($id)
	{
		$data['device'] = null;
    $data['device'] = $this->MDevice->getDevice($id);

    foreach ($data['device'] as $d) {}

    // print_r($d->deviceOwner);

    $data['owner'] = null;
    $data['owner'] = $this->MEmployee->getEmployee($d->deviceOwner);

    foreach ($data['owner'] as $o) {}

    $data['branch'] = null;
    $data['branch'] = $this->MBranch->getBranch($o->empBranchCode);
foreach ($data['branch'] as $b) {}
    
    $data['branch1'] = null;
    $data['branch1'] = $this->MBranch->getBranch($d->deviceLocation);

foreach ($data['branch1'] as $b1) {}


$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));

		$this->fpdf->SetFont('Arial','',10);
    	$this->fpdf->Cell(10);
    	$this->fpdf->Cell(30,25,'Device User    : _________________________');
    	$this->fpdf->Cell(30,22,$o->empFName." ".$o->empMName." ".$o->empLName);
    	$this->fpdf->Cell(25);
    	$this->fpdf->Cell(30,25,'PMI/Inspection Date : _________________________');
    	$this->fpdf->Cell(15);
    	$this->fpdf->Cell(30,22,$now->format('F d, Y'));
    	$this->fpdf->Ln(8);
    	$this->fpdf->Cell(10);
    	$this->fpdf->Cell(30,25,'Position           : _________________________');
    	$this->fpdf->Cell(30,22,$o->empPosition);
    	$this->fpdf->Cell(25);
    	$this->fpdf->Cell(30,25,'Branch                      : _________________________');
    	$this->fpdf->Cell(15);
    	$this->fpdf->Cell(30,22,$o->empBranchCode." - ".$b1->branchName);
    	$this->fpdf->Ln(8);
    	 // Arial bold 15
    	$this->fpdf->SetFont('Arial','B',12);
    // // Move to the right
    	$this->fpdf->Ln(15);
    	$this->ChapterTitle("HARDWARE DATA");
    	// $this->fpdf->Ln(10);
    	$this->Hardware($d,$b);
    	$this->fpdf->Ln(15);
    	$this->ChapterTitle("PERIPHERALS (TYPE : BRAND / SERIAL NUMBER)");
        $this->Peripherals($id);
        $this->fpdf->Ln(15);
        $this->ChapterTitle("SOFTWARES");
    	$this->Softwares($id);
        $this->fpdf->Ln(20);
        $this->ChapterTitle("PRINT NAME AND AFFIX SIGNATURE");
        $this->Footer($o);



    	
	}


public function ChapterTitle($string)
{
    // Arial 12
    $this->fpdf->SetFont('Arial','',12);
    // Background color
    $this->fpdf->SetFillColor(200,220,255);
    // Title
    $this->fpdf->Cell(0,6,"$string",0,1,'C',true);
    // Line break
    // $this->fpdf->Ln(4);
}

public function Hardware($d,$b)
{
	$this->fpdf->SetFont('Arial','',10);
    	$this->fpdf->Cell(8);
    	$this->fpdf->Cell(30,10,'Device Name    : _________________________');
    	$this->fpdf->Cell(30,8,$d->deviceName);
    	$this->fpdf->Cell(27);
    	$this->fpdf->Cell(30,10,'Brand / Model           : _________________________');
    	$this->fpdf->Cell(15);
    	$this->fpdf->Cell(30,8,$d->deviceBrand);
    	$this->fpdf->Ln(0);
    	$this->fpdf->Cell(8);
    	$this->fpdf->Cell(30,25,'Type                  : _________________________');
    	$this->fpdf->Cell(30,22,$d->deviceType." - ".$d->deviceUnitType);
    	$this->fpdf->Cell(27);
    	$this->fpdf->Cell(30,25,'Location                    : _________________________');
    	$this->fpdf->Cell(15);
    	$this->fpdf->Cell(30,22,$d->deviceLocation." - ".$b->branchName);
    	$this->fpdf->Ln(8);
    	$this->fpdf->Cell(-4);
    	$this->fpdf->Cell(30,25,'CPU/Laptop Serial No.  : _________________________');
    	$this->fpdf->Cell(12);
    	$this->fpdf->Cell(30,22,$d->deviceSerialNo);
    	$this->fpdf->Cell(22);
    	$this->fpdf->Cell(30,25,'CPU/Laptop Processor  : _________________________');
    	$this->fpdf->Cell(20);
    	$this->fpdf->Cell(30,22,$d->deviceProcessor);
    	$this->fpdf->Ln(8);
    	$this->fpdf->Cell(-8);
    	$this->fpdf->Cell(30,25,'Memory Size/Brand/Type  : _________________________');
    	$this->fpdf->Cell(16);
    	$this->fpdf->Cell(30,22,$d->deviceMemory);
    	$this->fpdf->Cell(26);
    	$this->fpdf->Cell(30,25,'Hard Disk Brand/Size : _________________________');
    	$this->fpdf->Cell(16);
    	$this->fpdf->Cell(30,22,$d->deviceDisk);
    	$this->fpdf->Ln(8);
    	$this->fpdf->Cell(1);
    	$this->fpdf->Cell(30,25,'Hard Disk Serial No. : _________________________');
    	$this->fpdf->Cell(7);
    	$this->fpdf->Cell(30,22,$d->deviceDiskSerial);
        $this->fpdf->Cell(32);
        $this->fpdf->Cell(30,25,'Power Condition. : _________________________');
        $this->fpdf->Cell(10);
        $this->fpdf->Cell(30,22,$d->devicePower);
    	$this->fpdf->Ln(15);
    	$this->fpdf->Cell(4);
    	$this->fpdf->Cell(30,10,'LAN IP Address    : _________________________');
    	$this->fpdf->Cell(4);
    	$this->fpdf->Cell(30,8,$d->deviceLANIP);
    	$this->fpdf->Cell(27);
    	$this->fpdf->Cell(30,10,'MAC Address           : _________________________');
    	$this->fpdf->Cell(15);
    	$this->fpdf->Cell(30,8,$d->deviceLANMAC);
    	$this->fpdf->Ln(8);
    	$this->fpdf->Cell(1);
    	$this->fpdf->Cell(30,10,'WLAN IP Address    : _________________________');
    	$this->fpdf->Cell(7);
    	$this->fpdf->Cell(30,8,$d->deviceLANIP);
    	$this->fpdf->Cell(27);
    	$this->fpdf->Cell(30,10,'MAC Address           : _________________________');
    	$this->fpdf->Cell(15);
    	$this->fpdf->Cell(30,8,$d->deviceLANMAC);
	# code...
}

public function Peripherals($id)
{
    $this->fpdf->SetFont('Arial','U',10);
    $data['peripherals'] = null;
    $data['peripherals'] = $this->MPeripherals->getPeripherals1($id);
    $i = 1;
    foreach ($data['peripherals'] as $d) {
        $x = 60; 
        $this->fpdf->Cell(10);
        $this->fpdf->Cell(30 + $x,7,$d->peripheralType." : ".$d->peripheralBrand." / ".$d->peripheralSerialNo);
        if($i % 2 == 0){
            $this->fpdf->Ln(6);
        }
        $i++;
    }
    
}

public function Softwares($id)
{
    
    $this->fpdf->SetFont('Arial','U',10);
    $data['softwares'] = null;
    $data['softwares'] = $this->MInstall->getInstalled1($id);
    $i = 1;
    foreach ($data['softwares'] as $s) {
        $x = 30; 
        $this->fpdf->Cell(10);
        $this->fpdf->Cell(30 + $x,7,$s->softwareName);
        if($i % 3 == 0){
            $this->fpdf->Ln(6);
        }
        $i++;
    }
}

public function Footer($o)
{

$now = new DateTime(NULL, new DateTimeZone('Asia/Manila'));

     $this->fpdf->SetFont('Arial','B',10);
    $this->fpdf->Cell(10);
        $this->fpdf->Cell(30,10,'Installed / Inspected By: ');
        $this->fpdf->Cell(33);
         $this->fpdf->Cell(30,10,'Accepted By : ');
         $this->fpdf->Cell(30);
         $this->fpdf->Cell(30,10,'Reviewed By : ');
        $this->fpdf->Ln(15);
        $this->fpdf->SetFont('Arial','',10);
        $this->fpdf->Cell(10);
        $this->fpdf->Cell(10,10,"______________________");
        $this->fpdf->Cell(53);
         $this->fpdf->Cell(30,10,"______________________");
         $this->fpdf->Cell(30);
         $this->fpdf->Cell(30,10,"______________________");
        $this->fpdf->SetFont('Arial','B',7);
        $this->fpdf->Cell(-153);
        $this->fpdf->Cell(30,10,$this->session->userdata['empSession']['empName']." - ".$now->format('m|d|Y'));
        // $this->fpdf->Ln(4);
        $this->fpdf->Cell(33);
        $this->fpdf->Cell(30,10,$o->empFName." ".$o->empMName." ".$o->empLName." - ".$now->format('m|d|Y'));
        $this->fpdf->Ln(4);
        $this->fpdf->SetFont('Arial','',9);
        $this->fpdf->Cell(10);
        $this->fpdf->Cell(30,10,"Ng Khai Technician / Date");
         $this->fpdf->Cell(33);
        $this->fpdf->Cell(30,10,"Device User / Date");
        $this->fpdf->Cell(30);
        $this->fpdf->Cell(30,10,"Head / Date");

    # code...
}

	

}
