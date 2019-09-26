<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Brand_model;

class Brand extends BaseController {
    

    public function index() {
        $model = new Brand_model();

        $data = [
            'brand' => $model->getBrand()
        ];

        echo view('brand/brand',$data);
    }

    public function create() {
        helper('brand/form');

        echo view('brand/form');
    }

    public function store() {
        helper ('form');

        $model = new Brand_model();

        DB::table('brand')->insert([
            'brand' => $request->brand
        ]);

        return redirect('brand/brand');
    }

    public function edit($id = null) {
        $model = new Brand_model();

        $data['brand'] = $model->getBrand($id);
        
        echo view('brand/edit',$data);
    }

    public function delete($id = null) {
        $model = new Brand_model();
        $model->delete($id);

        return redirect()->to(base_url('brand'));
    }
    public function tes()
    {
        return redirect()->to(base_url('brand'));
        
    }
}