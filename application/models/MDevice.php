<?php
	class MDevice extends MY_model {
		private $branchCode;
		private $branchName;
		private $branchRegion;
		private $branchStatus;

		const DB_TABLE = "device";
    	const DB_TABLE_PK = "deviceID";

    	public function __construct(){

		}

		public function getWorkingDevices()
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where('deviceStatus', 'WORKING');
			
			$query = $this->db->get();
			
			return $query;

		}

		public function getWorkingDevices1()
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->join("employee", "device.deviceOwner = employee.empID");
			$this->db->where('deviceStatus', 'WORKING');
			
			$query = $this->db->get();
			
			return $query;

		}

		public function getDisposedDevices()
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->join("employee", "device.deviceOwner = employee.empID");
			$this->db->where('deviceStatus', 'DISPOSED');
			
			$query = $this->db->get();
			
			return $query;
		}

		public function getRepairDevices()
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where('deviceStatus', 'FOR REPAIR');
			
			$query = $this->db->get();
			
			return $query;
		}

		public function getDevice($id)
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where('deviceID', $id);

			$query = $this->db->get();
			
			return $query->result();
			# code...
		}



	}
?>