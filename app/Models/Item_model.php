<?php

namespace App\Models;
use CodeIgniter\Model;

class Item_model extends Model {
    protected $table = 'item';
    protected $primaryKey = 'id_item';


    public function getItem($id = null){
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()->where(['id_item' => $id])->first();
    }
}