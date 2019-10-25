<?php

namespace App\Models;
use CodeIgniter\Model;

class Bkeluar_model extends Model {
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_bkeluar';

    public function getKeluar($id = null){
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()->where(['id_bkeluar' => $id])->first();
    }
}