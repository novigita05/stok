<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Kategori_model;

class Kategori extends BaseController {

    public function index() {
        $model = new Kategori_model();

        $data = ['kategori' => $model->getKategori()];

        echo view('kategori/kategori',$data);
    }

    public function create() {
        helper('kategori/form');

        echo view('kategori/form');
    }

    public function store() {
        helper('form');

        $model = new Kategori_model();

        DB::table('kategori')->insert([
            'kategori' => $request->kategori
        ]);

        return redirect('kategori/kategori');
    }

    public function edit($id = null) {
        $model = new Kategori_model();

        $data['kategori'] = $model->getKategori($id);

        echo view('kategori/edit',$data);
    }

    public function delete($id = null) {
        $model = new Kategori_model();
        $model->delete($id);

        return redirect()->to(base_url('kategori'));
    }
}