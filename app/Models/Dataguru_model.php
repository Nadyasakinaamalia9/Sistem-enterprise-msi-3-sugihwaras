<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataguru_model extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    public function getCategory($id = false)
    {
        # code...
        if ($id == false) {

            return $this->findAll();
        } else {
            return $this->getWhere(['id_pegawai' => $id]);
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
        return $this->db->table($this->table)->update($data, ['id_pegawai' => $id]);
    }

    public function deleteCategory($id)
    {
        # code...
        return $this->db->table($this->table)->delete(['id_pegawai' => $id]);
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_pegawai', 'id');
    }

    public function getGuruById($id)
    {
        return $this->find($id);
    }
}
