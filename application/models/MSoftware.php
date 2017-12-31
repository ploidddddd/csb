<?php
	class MSoftware extends MY_model {
		

		const DB_TABLE = "software";
    	const DB_TABLE_PK = "softwareID";

    	public function __construct(){
    		$this->load->model('MInstall');
		}

		public function getSoftwares()
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('softwareStatus', 'ACTIVE');
			$query = $this->db->get();
			return $query;
		}

		public function getOSSoftwares()
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('softwareType', 'OS');
			$query = $this->db->get();
			return $query->result();
			# code...
		}

		public function getOfficeSoftwares()
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('softwareType', 'Office');
			$query = $this->db->get();
			return $query->result();
			# code...
		}

		public function getAntiSoftwares()
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('softwareType', 'Anti-Virus');
			$query = $this->db->get();
			return $query->result();
			# code...
		}

		public function getSpecialSoftwares()
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('softwareType', 'Specialized');
			$query = $this->db->get();
			return $query->result();
			# code...
		}

		public function getBrowserSoftwares()
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('softwareType', 'Browser');
			$query = $this->db->get();
			return $query->result();
			# code...
		}

		public function getDevSoftwares($id)
		{
			$this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->where('softwareStatus', 'ACTIVE');
			$this->db->where('softwareDeviceID', $id);
			$query = $this->db->get();
			return $query->result();
			# code...
		}


		public function notInstalled($id)
		{
			
			$query = $this->db->query("select * from software s where s.softwareID not in (select i.installSoftwareID from install i where i.installDeviceID =".$id.") and s.softwareType != 'OS' and s.softwareStatus = 'ACTIVE'");
			
			return $query->result();
			# code...
		}



	

	}
?>