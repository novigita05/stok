<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Bmasuk_model;

class Barang_masuk extends BaseController {

    public function index() {
        $model = new Bmasuk_model();

        $data = array(
            'barang_masuk' => $model->getMasuk(),
            'menu' => 'barang masuk',
            'view' => 'pages/barang_masuk',
        );
        view_page($data);
    }
    public function get_json()
    {
        header('Content-Type:application/json');
        $list = $this->db->table('barang_masuk')
                         ->join('item', 'item.id_item = barang_masuk.item_id_item')
                         ->join('supplier', 'supplier.id_supplier = barang_masuk.supplier_id_supplier')
                         ->join('transaksi' , 'transaksi.id_transaksi = barang_masuk.transakasi_id_transaksi')
                         ->get()->getResult();
        $data = array();
        $content = array();
        foreach($list as $key => $value){
            $data['id_bmasuk'] = $value->id_bmasuk;
            $data['nama'] = $value->nama;
            $data['tanggal'] = $value->tanggal;
            $data['stok_masuk'] = $value->stok_masuk;
            $data['deskripsi'] = $value->deskripsi;
            $data['harga_modal'] = $value->harga_modal;
            $data['nama_supplier'] = $value->nama_supplier;
        
            $edit = '<button type="button" class="btn btn-icon btn-primary mr-1" onclick="load_modal(`ubah`,`barang_masuk`, `'.$value->id_bmasuk.'`, ``)">edit</button>';
            $hapus = '<button type="button" class="btn btn-icon btn-danger mr-1" onclick="load_modal(`hapus`, `barang_masuk`, `'.$value->id_bmasuk.'`, `'.$value->nama.'`, `'.$value->tanggal.'`, `'.$value->stok_masuk.'`, `'.$value->deskripsi.'`, `'.$value->harga_modal.'`, `'.$value->nama_supplier.'`)">delete</button>';
        
            $data['aksi'] = $edit.$hapus;
            array_push($content, $data);
        }
        echo json_encode($content);
    }
    public function cu_bmasuk()
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
            $this->db->table('barang_masuk')->insert($arr);
        }else{
            $this->db->table('barang_masuk')->update($arr,'id_bmasuk = '.$id);
        }
        if ($this->db->affectedRows() > 0) {
            echo "sukses";
        }else{
            echo "gagal";
        }
    }
}