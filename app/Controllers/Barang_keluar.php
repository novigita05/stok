<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Bkeluar_model;

class Barang_keluar extends BaseController
{
	public function index() {
		$model = new Bkeluar_model();

		$data = array(
			'barang_keluar' => $model->getKeluar(),
			'menu' => 'barang keluar',
			'view' => 'pages/barang_keluar',
		);
		view_page($data);
	}

	public function get_json()
	{
		header('Content-Type:application/json');
		$list = $this->db->table('barang_keluar')
					 	 ->join('item', 'item.id_item = barang_keluar.item_id_item')
					 	 ->get()->getResult();

		$data = array();
		$content = array();
		foreach($list as $key => $value){
			$data['id_bkeluar'] = $value->id_bkeluar;
			$data['nama'] = $value->nama;
			$data['tanggal'] = $value->tanggal;
			$data['stok_keluar'] = $value->stok_keluar;
			$data['deskripsi'] = $value->deskripsi;

			$edit = '<button type="button" class="btn btn-icon btn-primary mr-1" onclick="load_modal(`ubah`,`barang_keluar`, `'.$value->id_bkeluar.'`, ``)">edit</button>';
            $hapus = '<button type="button" class="btn btn-icon btn-danger mr-1" onclick="load_modal(`hapus`, `barang_keluar`, `'.$value->id_bkeluar.'`, `'.$value->nama.'`, `'.$value->tanggal.'`, `'.$value->stok_keluar.'`, `'.$value->deskripsi.'`)">delete</button>';
        
            $data['aksi'] = $edit.$hapus;

			array_push($content, $data);
		}
		echo json_encode($content);
	}

	public function cu_bkeluar()
	{
		$id = $this->request->getPost('id');
		$data = $this->request->getPost();
		$arr = array();
		foreach($data as $key => $value) {
			if ($value!=="") {
				$arr[$key] = $value;
			}
		}
		if ($id!==null || $id!=="") {
			$this->db->table('barang_keluar')->insert($arr);
		}else{
			$this->db->table('barang_keluar')->update($arr,'id_bkeluar	= '.$id);
		}
		if($this->db->affectedRows() >0) {
			echo "sukses";
		}else{
			echo "gagal";
		}
	}
}