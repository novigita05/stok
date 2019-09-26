<?php

namespace App\Models;
use CodeIgniter\Model;

class Supplier_model extends Model {
	protected $table = 'supplier';
	protected $primaryKey = 'id_supplier';
	protected $allowedFields = ['id_supplier','nama','telp','alamat'];

	public function getSupplier($id = null) {
		if ($id === null) {
			return $this->findAll();
		}

		return $this->asArray()->where(['id_supplier' => $id])->first();
	}
}