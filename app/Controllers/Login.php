<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\User_model;

class Login extends BaseController {

	public function index($error = NULL) {
		$model = new User_model();

		$data = array(
			'error' => $error
		);

		echo view('pages/login',$data);
	}

	public function login() {
		$model = new User_model();
		$login = $this->$model->login($this->input->post('username'), md5($this->input->post('password')));
		if ($login == 1) {
			$row = $this->User_model->data_login($this->input->post('username'), md5($this->input->post('password')));
			$data = array(
				'logged' => TRUE,
				'username' => $row->username
			);

			$this->session->set_underdata($data);
			redirect(site_url('layout'));
		}else{
			$error = 'username / password salah';
			$this->index($error);
		}
	}

	function logout() {
		$this->session->sess_destroy();

		redirect(site_url('login'));
	}

}