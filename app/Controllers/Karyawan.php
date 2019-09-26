<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Karyawan_model;

/**
 * 
 */
class Karyawan extends BaseController
{
	public function index() {
		$model = new Karyawan_model();

		$data = [
			'nama' => $model->getKaryawan(),
			'telp' => $model->getKaryawan(),
			'alamat' => $model->getKaryawan(),
			'username' => $model->getKaryawan(),
			'password' => $model->getKaryawan()
		];

		echo view('karyawan/karywan',$data);
	}

	public function create() {
		helper('karywan/form');

		echo view('karyawan/form');
	}

	public function store() {
		helper('form');

		$model = new Karyawan_model();

		DB::table('karyawan')->insert([
			'nama' => $request->nama,
			'telp' => $request->telp,
			'alamat' => $request->alamat
		]);

		return redirect('karyawan/karyawan');
	}

	public function edit($id = null) {
		$model = new Karyawan_model();

		$data['karyawan'] = $model->getKaryawan($id);

		echo view('karyawan/edit', $data);
	}

	public function delete($id = null) {
		$model = new Karyawan_model();
		$model->delete($id);

		return redirect()->to(base_url('karyawan'));
	}
}