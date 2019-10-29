<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Transaksi_model;

class Transaksi extends BaseController {

    public function index() {
        $model = new Transaksi_model();

        $data = array(
            'no_transaksi' => $this->get_no_transaksi(),
            'item' => $this->db->table('item')->get()->getResult(),
            'menu' => 'transaksi',
            'view' => 'pages/transaksi',
        );
        view_page($data);
    }
    public function get_json()
    {
        header('Content-Type:application/json');
        $list = $this->db->table('transaksi')
                         ->join('item', 'item.id_item = transaksi.item_id_item')
                         ->get()->getResult();

        $data = array();
        $content = array();
        foreach($list as $key => $value){
            $data['id_transaksi'] = $value->id_transaksi;
            $data['no_transaksi'] = $value->no_transaksi;
            $data['tanggal'] = $value->tanggal;
            $data['kode'] = $value->kode;
            $data['nama'] = $value->nama;
            $data['harga_pasang'] = $value->harga_pasang;
            $data['telp'] = $value->telp;
            $data['qty'] = $value->qty;
            $data['sub_total'] = $value->sub_total;

            array_push($content, $data);
        }
        echo json_encode($content);
    }
    public function cu_transaksi()
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
            $this->db->table('transaksi')->insert($arr);
        }else{
            $this->db->table('transaksi')->update($arr,'id_transaksi = '.$id);
        }
        if ($this->db->affectedRows() > 0) {
            echo "sukses";
        }else{
            echo "gagal";
        }
    }
    public function get_no_transaksi()
    {
        $last_no = $this->db->table('transaksi')->limit(1)->orderBy('no_transaksi','desc')->get()->getRow();
        if (isset($last_no->no_transaksi)) {
            $no = substr($last_no->no_transaksi, -4);
            $date = substr($last_no->no_transaksi, 0,6);
            if ($date !== date('ymd')) {
                $no = '0001';
            }else{
                $no = $no + 1;
                if (strlen($no)===1) {
                    $no = '000'.$no;
                }else if (strlen($no)===2) {
                    $no = '00'.$no;
                }else if (strlen($no)===3) {
                    $no = '0'.$no;
                }
            }
        }else{
            $no = '0001';
        }
        return date('ymd').$no;
    }
}