<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Kategori_model;

class Kategori extends BaseController {

    public function index() {
        if ($this->session->get('logged')!==TRUE) {
            $url = base_url('login');
            header("Location: $url");
            exit(0);
        }
        $model = new Kategori_model();

        $data = array(
            'kategori' => $model->getKategori(),
            'menu' => 'kategori',
            'view' => 'pages/kategori',
        );
        view_page($data);
    }
    
    public function edit($id)
    {
        $text1 = $this->request->getPost('text1');
        $text2 = $this->request->getPost('text2');
        $arr = array(
            'kategori' => $text1
        );
        // echo "$text1 - $text2";
        $this->db->table('kategori')->update($arr,'id_kategori = '.$id);
        if ($this->db->affectedRows() > 0) {
            echo "sukses";
        }else{
            echo "gagal";
        }
    }
    public function get_json()
    {
        header('Content-Type:application/json');
        $list = $this->db->table('kategori')->get()->getResult();
        $data = array();
        $content = array();
        foreach($list as $key => $value){
            $data['id_kategori'] = $value->id_kategori;
            $data['kategori'] = $value->kategori;
        
            $edit = '<button type="button" class="btn btn-icon btn-primary mr-1" onclick="load_modal(`ubah`,`kategori`, `'.$value->id_kategori.'`, ``)">edit</button>';
            $hapus = '<button type="button" class="btn btn-icon btn-danger mr-1" onclick="load_modal(`hapus`, `kategori`, `'.$value->id_kategori.'`, `'.$value->kategori.'`)">delete</button>';
        
            $data['aksi'] = $edit.$hapus;
            
            array_push($content, $data);
        }
        echo json_encode($content);
    }

    public function hapus($id){
        $data=array(
            'kategori' => $kategori
        );

        $this->db->delete('kategori', $data);
        if($this->db->affectedRows() > 0){
            echo "sukses";
        }else{
            echo "gagal";
        }
    }

    public function cu_kategori()
    {
        $id = $this->request->getPost('id');
        $data = $this->request->getPost();
        foreach ($data as $key => $value) {
            if ($value!=="") {
                $arr[$key] = $value;
            }
        }
        if ($id!==null || $id!=="") {
            $this->db->table('kategori')->insert($arr);
        }else{
            $this->db->table('kategori')->update($arr,'id_kategori = '.$id);
        }
        if ($this->db->affectedRows() > 0) {
            echo "sukses";
        }else{
            echo "gagal";
        }
    }
}