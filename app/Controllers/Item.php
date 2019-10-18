<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Item_model;

class Item extends BaseController {

    public function index() {
        if ($this->session->get('logged')!==TRUE) {
            $url = base_url('login');
            header("Location: $url");
            exit(0);
        }
        $model = new Item_model();

        $data = array(
            'item' => $model->getItem(),
            'menu' => 'item',
            'view' => 'pages/item',
        );
        view_page($data);
    }
    public function get_json()
    {
        header('Content-Type:application/json');
        $list = $this->db->table('item')->get()->getResult();
        $data = array();
        $content = array();
        foreach($list as $key => $value){
            $data['id_item'] = $value->id_item;
            $data['kode'] = $value->kode;
            $data['nama'] = $value->nama;
            $data['harga_modal'] = $value->harga_modal;
            $data['harga_sale'] = $value->harga_sale;
            $data['harga_pasang'] = $value->harga_pasang;
            $data['stok'] = $value->stok;
            $data['limit'] = $value->limit;
        
            $edit = '<button type="button" class="btn btn-icon btn-primary mr-1" onclick="load_modal(`ubah`,`item`, `'.$value->id_item.'`, ``)">edit</button>';
            $hapus = '<button type="button" class="btn btn-icon btn-danger mr-1" onclick="load_modal(`hapus`, `item`, `'.$value->id_item.'`, `'.$value->kode.'`, `'.$value->nama.'`, `'.$value->harga_modal.'`, `'.$value->harga_sale.'`, `'.$value->harga_pasang.'`, `'.$value->stok.'` , `'.$value->limit.'`)">delete</button>';
        
            $data['aksi'] = $edit.$hapus;
            array_push($content, $data);
        }
        echo json_encode($content);
    }
    public function cu_item()
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
            $this->db->table('item')->insert($arr);
        }else{
            $this->db->table('item')->update($arr,'id_item = '.$id);
        }
        if ($this->db->affectedRows() > 0) {
            echo "sukses";
        }else{
            echo "gagal";
        }
    }
}