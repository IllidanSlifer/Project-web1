<?php 

class Model_User extends CI_Model{

	public function insert($data){
		$this->db->insert('users',$data);
		$id=mysql_insert_id();
		return $id;
	}
	public function insersion($data){
		$this->db->insert('users',$data);
		$id = $this->db->insert_id();
		$query = $this->db->get_where('users', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return $query->row();
		} 

	}
	public function getUser($user,$pass){

		$query="SELECT * FROM `users` WHERE user = '$user' and password = '$pass'";
		$query = $this->db->query("$query");
		return $query->row();
		

	}

	public function getSession($id){
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row();
	}

	public function getUserID($id){

		$query='SELECT * FROM `users` WHERE id ='.$id;
		$query = $this->db->query("$query");
		return $query->result_arrat();
	}

	public function checking($code,$id){
		$query="UPDATE `users` SET `estado`=1 WHERE id ='$id' and code='$code'";
		$query = $this->db->query("$query");
		return $query;

	}

	public function estado($ide){
		$query='SELECT estado FROM `users` WHERE id ='.$ide;
		$query = $this->db->query("$query");
		return $query->row();

	}


}
?>