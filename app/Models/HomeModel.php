<?php 

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model{
    protected $table = 'customer';

    public function getUser($custCode){
        return $this->table('customer')
                    ->where('kode_cst', $custCode)
                    ->get()
                    ->getRowArray();
    }
    public function updateUser($data,$custCode){
        return $this->db->table('customer')->update($data, ['kode_cst' => $custCode]);
    }
}