<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use App\Models\Transaksi_model;

class Api extends BaseController {

    public function generate_api($status=false,$msg='',$data=[])
    {
        header_remove ("Content-Type");
        header("Access-Control-Allow-Origin: *");
        header("Cache-Control:public, max-age=31536000");
        header('Content-Type: application/json');
        
        $arr = [
            'error' => $status,
            'message' => $msg,
            'data' => $data
        ];
        die(json_encode($arr));
    }
    
    public function login()
    {
        $status = false;
        $msg = '';
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $data = (object)[];
        $member = $this->db->table('tb_member')
                           ->where('email',$email)
                           ->get()->getRow();
        helper('hash_helper');
        if ($member === null) {
            $status = true;
            $msg = 'Email tidak terdaftar!';
        }else{
            if (isset($member->id_member) && verifyHashedPassword($password, $member->password)) {
                $msg = 'login sukses';
                $data = $member;
            }else{
                $status = true;
                $msg = 'Email atau password salah!';
            }
        }
        $this->generate_api($status,$msg,$data);
    }

    public function list_data($value='')
    {
        # code...
    }

    public function detail_data($value='')
    {
        # code...
    }
    public function register($value='')
    {
        # code...
    }
    public function simpan($value='')
    {
        # code...
    }
}