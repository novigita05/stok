<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Supplier_model;

class Supplier extends BaseController {

	public function index() {
		$model = new Supplier_model();

		$data = [
			'nama' => $model->getSupplier(),
			'telp' => $model->getSupplier(),
			'alamat' => $model->getSupplier()
		];

		echo view('supplier/supplier',$data);
	}

	public function create() {
		helper('supplier/form');

		echo view('supplier/form');
	}

	public function store() {
		helper('form');

		$model = new Supplier_model();

		DB::table('supplier')->insert([
			'nama' => $request->nama,
			'telp' => $request->telp,
			'alamat' => $request->alamat
		]);

		return redirect('supplier/supplier');
	}

	public function edit($id = null) {
		$model = new Supplier_model();

		$data['supplier'] = $model->getSupplier($id);

		echo view('supplier/edit', $data);
	}

	public function delete($id = null) {
		$model = new Supplier_model();
        $model->delete($id);

        return redirect()->to(base_url('supplier'));
	}
}