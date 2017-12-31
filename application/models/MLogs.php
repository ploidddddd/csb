<?php
	class MLogs extends MY_model {
		private $branchCode;
		private $branchName;
		private $branchRegion;
		private $branchStatus;

		const DB_TABLE = "logs";
    	const DB_TABLE_PK = "logID";

    	public function __construct(){

		}

		public function getLogs($id)
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where('logDeviceID', $id);
			$this->db->order_by('logStamp','ASC');
			
			$query = $this->db->get();
			
			return $query;

		}


		public function getDisposedDevices()
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
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
			$this->db->where('deviceSerialNO', $id);

			$query = $this->db->get();
			
			return $query->result();
			# code...
		}

		public function getDevice1($id)
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where('deviceSerialNO', $id);

			$query = $this->db->get();
			
			return $query;
			# code...
		}



	}
?>