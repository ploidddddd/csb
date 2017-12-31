<?php
	class MInstall extends MY_model {

		const DB_TABLE = "install";
    	const DB_TABLE_PK = "installID";

    	public function __construct(){

		}

		public function getInstalled($id)
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->join("software", "install.installSoftwareID = software.softwareID");
			$this->db->where('install.installDeviceID', $id);
			
			$query = $this->db->get();
			
			return $query;
		}

		public function getInstalled1($id)
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->join("software", "install.installSoftwareID = software.softwareID");
			$this->db->where('install.installDeviceID', $id);
			// $this->db->order_by('logStamp','ASC');
			
			$query = $this->db->get();
			
			return $query->result();

			# code...
		}

		public function getInstalled2($id)
		{
			$this->db->select("*");
			$this->db->from($this::DB_TABLE);
			$this->db->join("software", "install.installSoftwareID = software.softwareID");
			$this->db->where('install.installDeviceID', $id);
			$this->db->where('software.softwareType !=', 'OS');
			// $this->db->order_by('logStamp','ASC');
			
			$query = $this->db->get();
			
			return $query->result();

			# code...
		}



		



	}
?>