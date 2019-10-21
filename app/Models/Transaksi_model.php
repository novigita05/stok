<?php

namespace App\Models;
use CodeIgniter\Model;

class Transaksi_model extends Model {
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    public function getTransaksi($id = null){
    	if ($id === null) {
			return $this->findAll();
		}

		return $this->asArray()->where(['id_transaksi' => $id])->first();
    }
}