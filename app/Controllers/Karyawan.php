<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Karyawan_model;

class Karyawan extends BaseController {

    public function index() {
        //if ($this->session->get('logged')!==TRUE) {
            //$url = base_url('login');
            //header("Location: $url");
            //exit(0);
        //}

        $model = new Karyawan_model();

        $data = array(
            'karyawan' => $model->getKaryawan(),
            'menu' => 'karyawan',
            'view' => 'pages/karyawan',
        );
        view_page($data);
    }
    public function get_json()
    {
        header('Content-Type:application/json');
        $list = $this->db->table('karyawan')->get()->getResult();
        $data = array();
        $content = array();
        foreach($list as $key => $value){
            $data['id_karyawan'] = $value->id_karyawan;
            $data['nama'] = $value->nama;
            $data['telp'] = $value->telp;
            $data['alamat'] = $value->alamat;
            $data['username'] = $value->username;
            $data['password'] = $value->password;
        
            $edit = '<button type="button" class="btn btn-icon btn-primary mr-1" onclick="load_modal(`ubah`,`karyawan`, `'.$value->id_karyawan.'`, ``)">edit</button>';
            $hapus = '<button type="button" class="btn btn-icon btn-danger mr-1" onclick="load_modal(`hapus`, `karyawan`, `'.$value->id_karyawan.'`, `'.$value->nama.'`, `'.$value->telp.'`, `'.$value->alamat.'`, `'.$value->username.'`, `'.$value->password.'`)">delete</button>';
        
            $data['aksi'] = $edit.$hapus;
            array_push($content, $data);
        }
        echo json_encode($content);
    }
    public function cu_karyawan()
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
            $this->db->table('karyawan')->insert($arr);
        }else{
            $this->db->table('karyawan')->update($arr,'id_karyawan = '.$id);
        }
        if ($this->db->affectedRows() > 0) {
            echo "sukses";
        }else{
            echo "gagal";
        }
    }
}