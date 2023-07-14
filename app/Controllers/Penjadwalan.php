<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Dataguru_model;
use App\Models\Penjadwalan_model;
use App\Models\Manajemenkelas_model;
use App\Models\Manajemenajaran_model;

class Penjadwalan extends BaseController
{
    protected $model;
    protected $penjadwalan_model;
    public function __construct()
    {
        helper(['form']);
        $this->model = new Dataguru_model();
        $this->penjadwalan_model = new Penjadwalan_model();
        // $this->manajemenkelas_model = new Manajemenkelas_model();
    }

    public function index()
    {
        $data['jadwal'] = $this->penjadwalan_model->getJadwalSortedByHari();
        $this->model = new Dataguru_model();
        $this->penjadwalan_model = new Penjadwalan_model();

        // Ambil data guru dan penjadwalan
        $data['guru'] = $this->model->findAll();
        // $data['jadwal'] = $this->penjadwalan_model->findAll();
        $data['jadwal'] = $this->penjadwalan_model->getScheduleWithGuru();

        // foreach ($data['jadwal'] as &$item) {
        //     if ($item['status'] == 'tunggu') {
        //         $item['status'] = 'tunggu';
        //     }

        // Tambahkan kondisi untuk mengubah status 'Belum Verifikasi' menjadi 'Tunggu'
        foreach ($data['jadwal'] as $item) {
            if ($item['status'] == 'Belum Verifikasi') {
                $item['status'] = 'tunggu';
            }
        }

        $keyword    =   $this->request->getGet('keyword');

        $data['keyword']    =   $keyword;


        // filter 
        $where      = [];
        $like       = [];
        $or_like    = [];


        if (!empty($keyword)) {
            $like = ['id_pegawai' => $keyword];
            $or_like = ['hari' => $keyword, 'mapel' => $keyword, 'kelas' => $keyword];
        }
        // end filter

        // paginate 
        $paginate = 15;
        $data['dosen0072'] = $this->model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'penjadwalan');
        $data['pager'] = $this->model->pager;

        $nomor = $this->request->getGet('page_penjadwalan');

        if ($nomor == null) {
            $nomor = 1;
        }
        $data['nomor'] = ($nomor - 1) * $paginate;
        // end generate number
        return view('penjadwalan/idx16', $data);
    }

    public function view()
    {
        $this->model = new Dataguru_model();
        $this->penjadwalan_model = new Penjadwalan_model();

        // Ambil data guru dan penjadwalan
        $data['guru'] = $this->model->findAll();
        // $data['jadwal'] = $this->penjadwalan_model->findAll();
        $data['jadwal'] = $this->penjadwalan_model->getScheduleWithGuru();

        return view('penjadwalan/view', $data);
    }


    public function create16()
    {
        # code...
        $this->model = new Dataguru_model();
        // $data['kelas'] = $this->manajemenkelas_model->findAll();
        $data['kelas'] = $this->penjadwalan_model->getKelas();
        $data['tahun_ajaran'] = $this->penjadwalan_model->getTahunajaran();
        $data['guru'] = $this->model->findAll();
        return view('penjadwalan/create16', $data);
    }

    public function store16()
    {
        $validation =  \Config\Services::validation();
        $data = array(
            'id_pegawai'       => $this->request->getPost('id_pegawai'),
            'hari'       => $this->request->getPost('hari'),
            'waktu_mulai'       => $this->request->getPost('waktu_mulai'),
            'waktu_selesai'       => $this->request->getPost('waktu_selesai'),
            'mapel'       => $this->request->getPost('mapel'),
            'kelas'       => $this->request->getPost('kelas'),
            'tahun_ajaran'       => $this->request->getPost('tahun_ajaran'),
            // 'status'       => $this->request->getPost('status'),
        );
        // dd($data);
        if ($validation->run($data, 'penjadwalan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('penjadwalan/create16'));
        } else {
            $this->penjadwalan_model = new Penjadwalan_model();
            //memanggil method verfikasi
            $isScheduleAvailable = $this->verifyScheduleAvailability($data['hari'], $data['waktu_mulai'], $data['waktu_selesai']);

            // $simpan = $this->penjadwalan_model->insertCategory($data);
            // if ($simpan) {
            //     session()->setFlashdata('success', 'Created Successfully');
            //     return redirect()->to(base_url('penjadwalan'));
            // }
            if ($isScheduleAvailable) {
                // Jadwal tersedia, proses penyimpanan
                $simpan = $this->penjadwalan_model->insertCategory($data);
                if ($simpan) {
                    session()->setFlashdata('success', 'Created Successfully');
                    return redirect()->to(base_url('penjadwalan/create16'));
                }
            } else {
                // Jadwal tidak tersedia, kirim pesan error
                session()->setFlashdata('errors', 'Jadwal sudah terisi. Verifikasi ditolak.');
                return redirect()->to(base_url('penjadwalan/create16'));
            }
        }
    }
    // }
    private function verifyScheduleAvailability($day, $startTime, $endTime)
    {
        // Menggunakan method checkScheduleAvailability dari model atau implementasikan logika verifikasi jadwal sesuai kebutuhan

        // Contoh implementasi sederhana: cek apakah jadwal sudah terisi atau belum berdasarkan waktu mulai dan selesai
        $existingSchedule = $this->penjadwalan_model->getScheduleByDay($day);

        if ($existingSchedule) {
            foreach ($existingSchedule as $schedule) {
                // Menggunakan method isTimeOverlap untuk memeriksa tumpang tindih waktu
                if ($this->isTimeOverlap($startTime, $endTime, $schedule['waktu_mulai'], $schedule['waktu_selesai'])) {
                    return false; // Jadwal bertabrakan, jadwal tidak tersedia
                }
            }
        }

        return true; // Jadwal tersedia
    }

    private function isTimeOverlap($start1, $end1, $start2, $end2)
    {
        // Mengembalikan true jika rentang waktu 1 (start1 - end1) bertabrakan dengan rentang waktu 2 (start2 - end2)
        // Implementasikan logika sesuai kebutuhan
        // Contoh sederhana: bertabrakan jika ada waktu yang sama
        if ($start1 === $start2 || $end1 === $end2) {
            return true;
        }

        return false;
    }
    public function edit16($id)
    {
        # code...
        $model = new Penjadwalan_model();
        $data['penjadwalan'] = $model->getCategory($id)->getRowArray();
        echo view('penjadwalan/edit16', $data);
    }
    public function update16()
    {
        # code...
        $id = $this->request->getPost('id_pegawai');
        $validation = \Config\Services::validation();

        $data = array(
            'id_pegawai'         => $this->request->getPost('id_pegawai'),
            'hari'   => $this->request->getPost('hari'),
            'waktu_mulai'         => $this->request->getPost('waktu_mulai'),
            'waktu_selesai'         => $this->request->getPost('waktu_selesai'),
            'mapel'         => $this->request->getPost('mapel'),
            'kelas'         => $this->request->getPost('kelas'),
            'tahun_ajaran'         => $this->request->getPost('tahun_ajaran'),
            // 'status'         => $this->request->getPost('status'),
        );

        if ($validation->run($data, 'penjadwalan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('penjadwalan/edit16/' . $id));
        } else {
            $model = new Penjadwalan_model();
            $ubah = $model->updateCategory($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('penjadwalan'));
            }
        }
    }

    public function delete16($id)
    {
        $model = new Penjadwalan_model();
        $hapus = $model->deleteCategory($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Category Succesfully');
            return redirect()->to(base_url('penjadwalan'));
        }
    }

    public function verifikasi($id)
    {
        // Logika verifikasi jadwal dengan ID $id
        $this->penjadwalan_model->verifikasi($id);
        return redirect()->to(base_url('penjadwalan/index'));

        // Setelah verifikasi, Anda dapat mengirimkan pesan sukses atau mengarahkan kembali ke halaman tata usaha
        session()->setFlashdata('success', 'Jadwal berhasil diverifikasi.');
        return redirect()->to(base_url('penjadwalan'));
    }

    public function tolak($id)
    {
        // Logika penolakan jadwal dengan ID $id
        $this->penjadwalan_model->tolak($id);
        return redirect()->to(base_url('penjadwalan/index'));

        // Setelah penolakan, Anda dapat mengirimkan pesan sukses atau mengarahkan kembali ke halaman tata usaha
        session()->setFlashdata('success', 'Jadwal berhasil ditolak.');
        return redirect()->to(base_url('penjadwalan'));
    }

    public function tunggu($id)
    {
        // Logika verifikasi jadwal dengan ID $id
        $this->penjadwalan_model->tunggu($id);
        return redirect()->to(base_url('penjadwalan/index'));

        // Setelah verifikasi, Anda dapat mengirimkan pesan sukses atau mengarahkan kembali ke halaman tata usaha
        session()->setFlashdata('success', 'Mohon Tunggu.');
        return redirect()->to(base_url('penjadwalan'));
    }

    public function jadwalFix()
    {

        $this->penjadwalan_model = new Penjadwalan_model();

        // Ambil data guru dan penjadwalan

        $data['jadwalfix'] = $this->penjadwalan_model->getjadwalVerif();
        // dd($data);
        return view('penjadwalan/jadwalfix', $data);
    }
}
