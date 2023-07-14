<?php

namespace App\Models;

use CodeIgniter\Model;


class Profilspp_model extends Model
{
    protected $table = 'spp';

    public function getCategory($id = false)
    {
        # code...
        if ($id == false) {

            return $this->findAll();
        } else {
            return $this->getWhere(['nis' => $id]);
        }
    }

    public function getData()
    {
        $query = $this->table('spp')->query('select * from spp');
        return $query->getResult();
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
        return $this->db->table($this->table)->delete(['id_pegawai' => $id]);
    }
}
