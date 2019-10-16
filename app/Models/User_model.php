<?php

namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model {

	function login($username,$password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		return $query->num_rows();
	}

	function data_login($username,$password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('user')->row();
	}
}