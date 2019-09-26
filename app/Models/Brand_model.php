<?php

namespace App\Models;
use CodeIgniter\Model;

class Brand_model extends Model {
    protected $table = 'brand';
    protected $primaryKey = 'id_brand';

    public function getBrand($id = null){
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()->where(['id_brand' => $id])->first();
    }
}