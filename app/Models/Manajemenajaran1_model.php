<?php

namespace App\Models;

use CodeIgniter\Model;

class Manajemenajaran1_model extends Model
{
    protected $table = 'manajemen_ajaran';
    protected $primaryKey = 'tahun_ajaran';

    public function getCategory($id = false, $id2 = false)
    {
        # code...
        $tahun = $id . "/" . $id2;
        if ($tahun == false) {

            return $this->findAll();
        } else {
            return $this->getWhere(['tahun_ajaran' => $tahun]);
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
        return $this->db->table($this->table)->update($data, ['tahun_ajaran' => $id]);
    }

    public function deleteCategory($id)
    {
        # code...
        return $this->db->table($this->table)->delete(['tahun_ajaran' => $id]);
    }
}
