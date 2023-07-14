<?php

namespace App\Models;

use CodeIgniter\Model;

class Peminjaman_model extends Model
{
    protected $table = 'peminjaman_sarpras';
    protected $primaryKey = 'id';

    public function getCategory($id = false)
    {
        # code...
        if ($id == false) {

            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
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
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deletePeminjaman($id)
    {
        # code...
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    public function getPeminjamanSarprasById($id)
    {
        $query = $this->db->table('peminjaman_sarpras')
            ->select('peminjaman_sarpras.*, pegawai.nama AS nama_pegawai')
            ->join('pegawai', 'pegawai.id_pegawai = peminjaman_sarpras.id_pegawai')
            ->where('peminjaman_sarpras.id_pegawai', $id)
            ->get();

        return $query->getRow();
    }
}
