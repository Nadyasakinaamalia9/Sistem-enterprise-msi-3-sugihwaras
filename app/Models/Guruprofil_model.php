<?php

namespace App\Models;

use CodeIgniter\Model;

class Guruprofil_model extends Model
{
    protected $table = 'pegawai';

    public function getCategory($id = false)
    {
        return $this->table('pegawai')->where('jabatan', 'guru')->findAll();
    }

    public function insertCategory($data)
    {
        # code...
        return $this->db->table($this->table)->insert($data);
    }

    public function updateCategory($data, $id)
    {
        # code...
        return $this->db->table($this->table)->update($data, ['id_pegawai' => $id]);
    }

    public function deleteCategory($id)
    {
        # code...
        return $this->db->table($this->table)->delete(['id_pegawai' => $id]);
    }
}
