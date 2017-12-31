<?php
	class MUser extends MY_model {
		private $userEmpID;
		private $userPassword;
		

		const DB_TABLE = "user";
    	const DB_TABLE_PK = "userID";

    	public function __construct(){

		}

		public function getUsers()
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			// $this->db->join("branches", "a.empBranchCode = branches.branchCode",'inner');
			// $this->db->where('user.EmpID !=', 'ADMIN123');
			$this->db->where('userID !=', 1);
			$this->db->where('userID !=' , $this->session->userdata['empSession']['userID']);
			$query = $this->db->get();
			
			return $query;
		}
		public function getUser($id)
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->join("employee", $this::DB_TABLE.".userEmpID = employee.empID");
			$this->db->where('userID', $id);
			$query = $this->db->get();

			return $query->result();
			# code...
		}

		public function attempLogin()
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->join("employee", $this::DB_TABLE.".userEmpID = employee.empID");
			$this->db->where('userEmpID', $this->userEmpID);
			$this->db->where('userPassword', $this->userPassword);
			$this->db->where('userStatus', 'ACTIVE');
			$query = $this->db->get();

			if ($query->num_rows() == 1){
				return $query->result();
			} else {
				return false;
			}
			
		}

		public function getEmpID($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('userEmpID', $id);
			
			$query = $this->db->get();

			return $query;
			# code...
		}


		public function getUserEmpID()
		{
			return $this->userEmpID;
		}

		public function setUserEmpID($userEmpID)
		{
			$this->userEmpID = $userEmpID;

			return $this;
		}

		public function getUserPassword()
		{
			return $this->userPassword;
		}

		public function setUserPassword($userPassword)
		{
			$this->userPassword = $userPassword;

			return $this;
		}



	}
?>