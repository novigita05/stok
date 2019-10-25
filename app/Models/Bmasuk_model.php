<?php

namespace App\Models;
use CodeIgniter\Model;

class Bmasuk_model extends Model {
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_bmasuk';

    public function getMasuk($id = null){
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()->where(['id_bmasuk' => $id])->first();
    }
}