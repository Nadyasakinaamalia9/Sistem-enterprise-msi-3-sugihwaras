<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswaprofil_model extends Model
{
    protected $table = 'emis';


    /////////////////////////////////////////////////
    // public function getFilteredData($filterData)
    // {
    //     $builder = $this->builder();

    //     // Tambahkan kondisi WHERE berdasarkan filter yang diberikan
    //     if (!empty($filterData['nama'])) {
    //         $builder->like('nama', $filterData['nama']);
    //     }

    //     // Tambahkan kondisi WHERE lainnya sesuai kebutuhan

    //     return $builder->get()->getResult();
    // }
    /////////////////////////////////////////////////


    public function getCategory($id = false)
    {
        # code...
        return $this->table('emis')->findAll();
        // if ($id == false) {

        //     return $this->findAll();
        // } else {
        //     return $this->getWhere(['nis' => $id]);
        // }
    }

    public function insertCategory($data)
    {
        # code...
        return $this->db->table($this->table)->insert($data);
    }

    public function updateCategory($data, $id)
    {
        # code...
        return $this->db->table($this->table)->update($data, ['nis' => $id]);
    }

    public function deleteCategory($id)
    {
        # code...
        return $this->db->table($this->table)->delete(['nis' => $id]);
    }
}
