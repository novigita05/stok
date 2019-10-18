<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Supplier_model;

class Supplier extends BaseController {

    public function index() {
        if ($this->session->get('logged')!==TRUE) {
            $url = base_url('login');
            header("Location: $url");
            exit(0);
        }
        $model = new Supplier_model();

        $data = array(
            'supplier' => $model->getSupplier(),
            'menu' => 'supplier',
            'view' => 'pages/supplier',
        );
        view_page($data);
    }
    public function get_json()
    {
        header('Content-Type:application/json');
        $list = $this->db->table('supplier')->get()->getResult();
        $data = array();
        $content = array();
        foreach($list as $key => $value){
            $data['id_supplier'] = $value->id_supplier;
            $data['nama'] = $value->nama;
            $data['telp'] = $value->telp;
            $data['alamat'] = $value->alamat;
        
            $edit = '<button type="button" class="btn btn-icon btn-primary mr-1" onclick="load_modal(`ubah`,`supplier`, `'.$value->id_supplier.'`, ``)">edit</button>';
            $hapus = '<button type="button" class="btn btn-icon btn-danger mr-1" onclick="load_modal(`hapus`, `supplier`, `'.$value->id_supplier.'`, `'.$value->nama.'`, `'.$value->telp.'`, `'.$value->alamat.'`)">delete</button>';
        
            $data['aksi'] = $edit.$hapus;
            array_push($content, $data);
        }
        echo json_encode($content);
    }
    public function cu_supplier()
    {
        $id = $this->request->getPost('id');
        $data = $this->request->getPost();
        $arr = array();
        foreach ($data as $key => $value) {
            if ($value!=="") {
                $arr[$key] = $value;
            }
        }
        if ($id!==null || $id!=="") {
            $this->db->table('supplier')->insert($arr);
        }else{
            $this->db->table('supplier')->update($arr,'id_supplier = '.$id);
        }
        if ($this->db->affectedRows() > 0) {
            echo "sukses";
        }else{
            echo "gagal";
        }
    }
}