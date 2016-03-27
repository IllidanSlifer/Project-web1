<?php 

class Model_email extends CI_Model{

	public function insert($data){
		$this->db->insert('emails',$data);
	}
	
	public function getAllByOutput($id,$pending){

		$query="SELECT `id`,`addressee`,`subject`,`message` FROM `emails` WHERE iduser= '$id' and estado ='$pending'";
		$query = $this->db->query("$query");
		return $query->result_array();
		

	}
	public function getAllBySent($id,$sent){

		$query="SELECT `id`,`addressee`,`subject`,`message` FROM `emails` WHERE iduser= '$id' and estado ='$sent'";
		$query = $this->db->query("$query");
		return $query->result_array();
		

	}
	public function getEmailId($cid,$id){

		$query="SELECT * FROM `emails` WHERE id = '$cid' and iduser = '$id'" ;
		$query = $this->db->query("$query");
		return $query->result_array();
	}

	public function update($idc,$data){

		$this->db->where('id',$idc);
		$this->db->update('emails',$data);
	}
	
	public function getID($idc){
		$query='SELECT iduser FROM `emails` WHERE id ='.$idc;
		$query = $this->db->query("$query");
		return $query->result_array();

	}
	public function delete($cid,$id){

		$this->db->where('id',$cid);
		$this->db->where('iduser',$id);
		$this->db->delete('emails');
		if ($this->db->affected_rows() == true) {
			return true;
		}else{
			return false;
		}

	}
	public function getEmails()
	{
		$this->db->where("estado","pending");
		$this->db->select("*");
		$this->db->from('emails');
		$query = $this->db->get();
		return($query->result_array());
	}


	public function update_emailStatus($id){
		$this->db->where("id", $id);
		$this->db->set("estado","sent");
		$this->db->update("emails");
	}


}