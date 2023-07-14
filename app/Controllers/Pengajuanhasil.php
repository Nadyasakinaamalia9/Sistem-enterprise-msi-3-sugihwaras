<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengajuanhasil_model;
use App\Models\Emis_model;

class Pengajuanhasil extends BaseController
{
    protected $model;
    protected $emismodel;
    protected $pengajuanhasil_model;

    public function __construct()
    {
        helper(['form']);
        $this->model = new Pengajuanhasil_model();
        $this->emismodel = new Emis_model();
        $this->pengajuanhasil_model = new Pengajuanhasil_model();
    }

    public function index()
    {
        $model = new Pengajuanhasil_model();

        $keyword = $this->request->getGet('keyword');

        $data['keyword'] = $keyword;

        $obat0014 = $model->findAll();
        $data['nilai'] = ['' => 'Pilih Category'] + array_column($obat0014, 'bhs_indonesia', 'nis');

        $where = [];
        $like = [];
        $or_like = [];

        if (!empty($keyword)) {
            $like = ['nis' => $keyword];
            $or_like = ['bhs_indonesia' => $keyword, 'bhs_inggris' => $keyword, 'matematika' => $keyword];
        }

        $paginate = 6;
        $data['dosen0072'] = $model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'category');
        $data['pager'] = $model->pager;

        $nomor = $this->request->getGet('page_category');
        if ($nomor == null) {
            $nomor = 1;
        }
        $data['nomor'] = ($nomor - 1) * $paginate;

        echo view('datanilai/nilaiver', $data);
    }

    public function view()
    {
        $data['ajuan'] = $this->model->findAll();

        return view('datanilai/viewajuan', $data);
    }

    public function create24()
    {
        $data['datanis'] = $this->emismodel->findAll();
        return view('pengajuanhasil/create24', $data);
    }

    public function store24()
    {
        $validation =  \Config\Services::validation();

        $data = [
            'nis' => $this->request->getPost('nis'),
        ];

        if ($validation->run($data, 'pengajuanhasil') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('datanilai/create24'));
        } else {
            $model = new Pengajuanhasil_model();
            $simpan = $model->insertCategory($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Successfully');
                return redirect()->to(base_url('datanilai/create24'));
            }
        }
    }


    public function edit8($id)
    {
        $model = new Pengajuanhasil_model();
        $data['datanilai'] = $model->getCategory($id)->getRowArray();
        echo view('datanilai/edit8', $data);
    }

    public function update8()
    {
        $id = $this->request->getPost('nis');
        $validation = \Config\Services::validation();

        $data = [
            'nis' => $this->request->getPost('nis'),
        ];

        if ($validation->run($data, 'datanilai') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('datanilai/edit8/' . $id));
        } else {
            $model = new Pengajuanhasil_model();
            $ubah = $model->updateCategory($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('datanilai'));
            }
        }
    }

    public function show8($id)
    {
        $model = new Pengajuanhasil_model();
        $data['datanilai'] = $model->getCategory($id)->getRowArray();
        echo view('datanilai/show8', $data);
    }

    public function delete8($id)
    {
        $model = new Pengajuanhasil_model();
        $hapus = $model->deletenilai($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Category Successfully');
            return redirect()->to(base_url('datanilai'));
        }
    }

    public function verifikasi($id)
    {
        $this->pengajuanhasil_model->verifikasi($id);
        return redirect()->to(base_url('pengajuanhasil/index'));

        session()->setFlashdata('success', 'Jadwal berhasil diverifikasi.');
        return redirect()->to(base_url('pengajuanhasil'));
    }

    public function tolak($id)
    {
        $this->pengajuanhasil_model->tolak($id);
        return redirect()->to(base_url('pengajuanhasil/index'));

        session()->setFlashdata('success', 'Jadwal berhasil ditolak.');
        return redirect()->to(base_url('pengajuanhasil'));
    }

    public function tunggu($id)
    {
        $this->pengajuanhasil_model->tunggu($id);
        return redirect()->to(base_url('pengajuanhasil/index'));

        session()->setFlashdata('success', 'Mohon Tunggu.');
        return redirect()->to(base_url('pengajuanhasil'));
    }

    public function printout_nilai($id)
    {
        $model = new Pengajuanhasil_model();
        $data['pengajuanhasil'] = $model->getDatasatuan($id);
        // dd($data);

        echo view('datanilai/printout_nilai', $data);
    }
}
