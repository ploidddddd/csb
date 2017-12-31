<?php
	class MPeripherals extends MY_model {
		private $branchCode;
		private $branchName;
		private $branchRegion;
		private $branchStatus;

		const DB_TABLE = "peripherals";
    	const DB_TABLE_PK = "peripheralID";

    	public function __construct(){

		}

		public function getPeripherals($id)
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where('peripheralStatus', 'WORKING');
			$this->db->where('peripheralDeviceID', $id);
			$query = $this->db->get();
			return $query;

			// return $this->db->get($this::DB_TABLE);
			# code...
		}

		public function getPeripherals1($id)
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->where('peripheralStatus', 'WORKING');
			$this->db->where('peripheralDeviceID', $id);
			$query = $this->db->get();
			return $query->result();

			// return $this->db->get($this::DB_TABLE);
			# code...
		}


	}
?>