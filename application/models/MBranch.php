<?php
	class MBranch extends MY_model {
		private $branchCode;
		private $branchName;
		private $branchRegion;
		private $branchStatus;

		const DB_TABLE = "branches";
    	const DB_TABLE_PK = "branchCode";

    	public function __construct(){

		}

		public function getBranches()
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where('branchStatus', 'ACTIVE');
			$query = $this->db->get();
			return $query;

			// return $this->db->get($this::DB_TABLE);
			# code...
		}

		public function getBranches1()
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where('branchStatus', 'ACTIVE');
			$query = $this->db->get();
			return $query->result();


			// return $this->db->get($this::DB_TABLE);
			# code...
		}


		public function getBranch($id)
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where($this::DB_TABLE_PK, $id);
			
			$query = $this->db->get();
			
			return $query->result();
		}

		public function getBranchCode(){
			return $this->branchCode;
		}

		public function setBranchCode($branchCode){
			$this->branchCode = $branchCode;
		}

		public function getBranchName(){
			return $this->branchName;
		}

		public function setBranchName($branchName){
			$this->branchName = $branchName;
		}

		public function getBranchRegion(){
			return $this->branchRegion;
		}

		public function setBranchRegion($branchRegion){
			$this->branchRegion= $branchRegion;
		}

		public function getBranchStatus(){
			return $this->branchStatus;
		}

		public function setBranchStatus($branchStatus){
			$this->branchStatus= $branchStatus;
		}

	}
?>