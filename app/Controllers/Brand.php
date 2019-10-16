<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Brand_model;

class Brand extends BaseController {

    public function index() {
        $model = new Brand_model();

        $data = array(
            'brand' => $model->getBrand(),
            'menu' => 'brand',
            'view' => 'pages/brand',
        );
        view_page($data);
    }
    public function get_json()
    {
        header('Content-Type:application/json');
        $list = $this->db->table('brand')->get()->getResult();
        $data = array();
        $content = array();
        foreach($list as $key => $value){
            $data['id_brand'] = $value->id_brand;
            $data['brand'] = $value->brand;
        
            $edit = '<button type="button" class="btn btn-icon btn-primary mr-1" onclick="load_modal(`ubah`,`brand`, `'.$value->id_brand.'`, ``)">edit</button>';
            $hapus = '<button type="button" class="btn btn-icon btn-danger mr-1" onclick="load_modal(`hapus`, `brand`, `'.$value->id_brand.'`, `'.$value->brand.'`)">delete</button>';
        
            $data['aksi'] = $edit.$hapus;
            array_push($content, $data);
        }
        echo json_encode($content);
    }
    public function cu_brand()
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
            $this->db->table('brand')->insert($arr);
        }else{
            $this->db->table('brand')->update($arr,'id_brand = '.$id);
        }
        if ($this->db->affectedRows() > 0) {
            echo "sukses";
        }else{
            echo "gagal";
        }
    }
}