<?php

namespace App\Models;
use CodeIgniter\Model;

class Kategori_model extends Model {
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    public function getKategori($id = null){
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()->where(['id_kategori' => $id])->first();
    }
}