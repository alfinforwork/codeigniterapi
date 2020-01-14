<?php

class Api_model extends CI_Model{

	public function get()
	{
		$result = $this->db->get('user');
		return $result->result();
	}

	function post($nama, $email, $password, $role)
	{
		date_default_timezone_set("Asia/Bangkok");
		$create_at = date("Y-m-d H:i:s");
		// $result = $this->db->query('INSERT into user values(0,"'.$nama.'","'.$email.'","'.$password.'","'.$create_at.'","'.$role.'") ');
		$data = array(
			'id'		=> 0,
			'nama'		=> $nama,
			'email'		=> $email,
			'password'	=> $password,
			'create_at'	=> $create_at,
			'role'		=> $role
		);
		$result = $this->db->insert('user', $data);
		return $result;
	}

	function put($id, $nama, $email, $password, $role)
	{
		date_default_timezone_set("Asia/Bangkok");

		$this->db->where('id', $id);
		$time = $this->db->get('user')->result();

		foreach ($time as $key ) {
			$create_at = $key->create_at;
		}
		
		// $result = $this->db->query('INSERT into user values(0,"'.$nama.'","'.$email.'","'.$password.'","'.$create_at.'","'.$role.'") ');
		$data = array(
			'nama'		=> $nama,
			'email'		=> $email,
			'password'	=> $password,
			'create_at'	=> $create_at,
			'role'		=> $role
		);
		$this->db->where('id',$id);
		$result = $this->db->update('user', $data);
		return $result;
	}

	public function delete($id){
		$this->db->where('id', $id);
		$result = $this->db->delete('user');
		return $result;
	}
}
