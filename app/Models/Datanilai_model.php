<?php

namespace App\Models;

use CodeIgniter\Model;

class Datanilai_model extends Model
{
    protected $table = 'nilai';

    public function getCategory($id = false)
    {
        # code...
        if ($id == false) {

            return $this->findAll();
        } else {
            return $this->getWhere(['nis' => $id]);
        }
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

    public function deletenilai($id)
    {
        # code...
        return $this->db->table($this->table)->delete(['nis' => $id]);
    }
}
