<?php

namespace App\Models;
use CodeIgniter\Model;

class Karyawan_model extends Model {
	protected $table = 'karyawan';
	protected $primaryKey = 'id_karyawan';

	public function getKaryawan($id = null) {
		if ($id === null) {
			return $this->findAll();
		}

		return $this->asArray()->where(['id_karyawan' => $id])->first();
	}
}