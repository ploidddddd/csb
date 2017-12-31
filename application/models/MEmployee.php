<?php
	class MEmployee extends MY_model {
		private $empID;
		private $empPassword;
		private $empFName;
		private $empMName;
		private $empLName;
		private $empPosition;
		private $empStatus;
		private $empBranchCode;
		private $empLastModified;
		private $empLastModifiedBy;
		

		const DB_TABLE = "employee";
    	const DB_TABLE_PK = "empID";

    	public function __construct(){

		}

		public function attempLogin()
		{
			$query = $this->db->get_where($this::DB_TABLE,array('empID'=>$this->empID,'empPassword'=>$this->empPassword));
			if($query -> num_rows() == 1){
				return $query->result();
			} else{
				return false;
			}
		}

		public function getEmployees()
		{
			$this->db->select("*");
			$this->db->from("employee as a");
			$this->db->join("branches", "a.empBranchCode = branches.branchCode",'inner');
			$this->db->where('a.empStatus', 'ACTIVE');
			$this->db->where('a.empID !=', 'ADMIN123');
			$this->db->WHERE('a.empID !=',  $this->session->userdata['empSession']['empID']);
			
			$query = $this->db->get();
			
			return $query;

		}

		public function getEmployees2()
		{
			$this->db->select("*");
			$this->db->from("employee as a");
			$this->db->join("branches", "a.empBranchCode = branches.branchCode",'inner');
			$this->db->where('a.empStatus', 'ACTIVE');
			
			$query = $this->db->get();
			
			return $query->result();

		}

		public function getEmployee($id)
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where('empID', $id);
			
			$query = $this->db->get();
			
			return $query->result();

		}

		public function getEmployees1()
		{

			$result = $this->db->query("SELECT * FROM employee AS A JOIN employee as B ON A.empLastModifiedBy = B.empID  WHERE A.empStatus = 'ACTIVE'");
	
			return $result;
		}

		public function getEmpID()
		{
			return $this->empID;
		}

		public function setEmpID($empID)
		{
			$this->empID = $empID;

			return $this;
		}

		public function getEmpPassword()
		{
			return $this->empPassword;
		}

		public function setEmpPassword($empePassword)
		{
			$this->empPassword = $empePassword;

			return $this;
		}



	}
?>