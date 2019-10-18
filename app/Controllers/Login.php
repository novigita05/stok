<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\User_model;

class Login extends BaseController {

	public function index($error = NULL) {

		$data = array(
			'error' => $error
		);

		echo view('pages/login',$data);
	}

	public function login() {
		$login = $this->db->table('karyawan')
						  ->where('username',$this->request->getPost('username'))
						  ->where('password',md5($this->request->getPost('password')))
						  ->get()->getRow();

		if ($login !== null) {
			$data = array(
				'logged' => TRUE,
				'username' => $login->username
			);

			$this->session->set($data);
            return redirect()->to(base_url('home'));
		}else{
			$error = 'username / password salah';
            return redirect()->to(base_url('login'));

		}
	}

	function logout() {
        session_destroy();
        return redirect()->to(base_url('login'));
	}

}