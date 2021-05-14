<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModal extends CI_Model {
	
	public function index()
	{
		echo "Modal Successfully Loaded";
	}

	public function login_check($email,$password)
	{
		
		//print_r($data);
		$this->db->select('id');
		$this->db->from('user_info');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query=$this->db->get();
		return $query->result();

	}

	public function signup_query($data)
	{
		
		//print_r($data);
		 $this->db->insert('user_info',$data);

		
	}
	
}


