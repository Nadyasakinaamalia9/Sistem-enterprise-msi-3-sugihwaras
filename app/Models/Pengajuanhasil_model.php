<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengajuanhasil_model extends Model
{
    protected $table = 'pengajuan_hasil';

    public function getCategory($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['nis' => $id])->getResult();
        }
    }

    public function insertCategory($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateCategory($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['nis' => $id]);
    }

    public function deletenilai($id)
    {
        return $this->db->table($this->table)->delete(['nis' => $id]);
    }

    public function tunggu($id)
    {
        $this->db->where('id', $id)->update(['status' => 'tunggu']);
    }

    // public function verifikasi($id)
    // {
    //     $this->db->where('id', $id)->update(['status' => 'verifikasi']);
    // }

    public function verifikasi($id)
    {
        $this->db->table('pengajuan_hasil')->where('id', $id)->update(['status' => 'verifikasi']);
    }

    // public function tolak($id)
    // {
    //     $this->db->where('id', $id)->update(['status' => 'tolak']);
    // }

    public function tolak($id)
    {
        $this->db->table('pengajuan_hasil')->where('id', $id)->update(['status' => 'tolak']);
    }

    public function updateScheduleStatus($id, $status)
    {
        $data = [
            'status' => $status,
        ];

        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function getDatasatuan($id = true)
    {
        $query = $this->table('pengajuan_hasil')->query("select * from pengajuan_hasil where id= '" . $id . "'");
        return $query->getResult();
        return $this->getWhere(['id' => $id]);
    }
}
