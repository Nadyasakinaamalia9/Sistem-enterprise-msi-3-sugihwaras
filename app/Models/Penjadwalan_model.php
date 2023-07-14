<?php

namespace App\Models;

use CodeIgniter\Model;


class Penjadwalan_model extends Model
{
    protected $table = 'penjadwalan';
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
        return $this->db->table($this->table)->insert($data);
    }

    public function updateCategory($data, $id)
    {
        # code...
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function deleteCategory($id)
    {
        # code...
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    public function getScheduleByDay($day)
    {
        return $this->where('hari', $day)->findAll();
    }

    public function getKelas()
    {
        // Ambil data kelas dari database (misalnya tabel "kelas")
        // $query = $this->db->get('kelas');
        $query = $this->db->table('manajemen_kelas')->get();
        return $query->getResultArray();
        // return $this->findAll();
    }

    public function getTahunajaran()
    {
        // Ambil data kelas dari database (misalnya tabel "kelas")
        // $query = $this->db->get('kelas');
        $query = $this->db->table('manajemen_ajaran')->get();
        return $query->getResultArray();
        // return $this->findAll();
    }

    //     public function getScheduleWithGuru()
    // {
    //     $builder = $this->db->table($this->table);
    //     $builder->select('penjadwalan.*, pegawai.id_pegawai');
    //     $builder->join('pegawai', 'pegawai.id_pegawai = penjadwalan.id_pegawai');
    //     return $builder->get()->getResultArray();


    // }

    public function getScheduleWithGuru()
    {
        $this->builder()->select('penjadwalan.*, pegawai.nama AS nama_guru')
            ->join('pegawai', 'pegawai.id_pegawai = penjadwalan.id_pegawai', 'left')
            ->orderBy('penjadwalan.id', 'ASC');

        return $this->builder()->get()->getResultArray();
    }

    public function tunggu($id)
    {
        // Logika verifikasi jadwal dengan ID $id
        // $data = array(
        //     'status' => 'Verifikasi'
        // );

        // // Setelah verifikasi, update status jadwal menjadi "Verifikasi"
        // $this->db->table($this->table)->update(['status' => 'Verifikasi'], ['id' => $id]);
        // return redirect()->to(base_url('penjadwalan/view'));
        // return $this->db->affectedRows() > 0;
        $this->builder()->where('id', $id)->update(['status' => 'tunggu']);
    }

    public function verifikasi($id)
    {
        // Logika verifikasi jadwal dengan ID $id
        // $data = array(
        //     'status' => 'Verifikasi'
        // );

        // // Setelah verifikasi, update status jadwal menjadi "Verifikasi"
        // $this->db->table($this->table)->update(['status' => 'Verifikasi'], ['id' => $id]);
        // return redirect()->to(base_url('penjadwalan/view'));
        // return $this->db->affectedRows() > 0;

        $this->builder()->where('id', $id)->update(['status' => 'verifikasi']);
    }

    public function tolak($id)
    {
        // Logika penolakan jadwal dengan ID $id
        // $data = array(
        //     'status' => 'Ditolak'
        // );

        // // Setelah penolakan, update status jadwal menjadi "Ditolak"
        // $this->db->table($this->table)->update(['status' => 'Ditolak'], ['id' => $id]);
        // return redirect()->to(base_url('penjadwalan/view'));
        // return $this->db->affectedRows() > 0;
        $this->builder()->where('id', $id)->update(['status' => 'tolak']);
    }

    public function updateScheduleStatus($id, $status)
    {
        $data = [
            'status' => $status,
        ];

        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function getjadwalVerif()
    {
        return $this->where('status', 'verifikasi')->orderBy('hari', 'ASC')->findAll();
    }



    public function getJadwalSortedByHari()
    {
        // $builder = $this->builder();

        // Define the desired order of days
        $order = [
            'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'
        ];

        // Set the field and order for sorting
        // $builder->orderBy('FIELD(hari, ' . implode(',', $order) . ')');
        $this->orderBy("FIELD(hari, '" . implode("','", $order) . "')");

        return $this->get()->getResult();
    }

    // public function getJadwalSortedByHari()
    // {
    //     // Define the desired order of days
    //     $order = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    //     // Set the field and order for sorting
    //     $this->orderBy("FIELD(hari, '" . implode("','", $order) . "')");

    //     return $this->findAll();
    // }
}
