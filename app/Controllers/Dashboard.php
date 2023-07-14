<?php

namespace App\Controllers;

use App\Models\Emis_model;
use App\Models\Dataguru_model;
use App\Models\Pengumuman_model;

class Dashboard extends BaseController
{
    protected $model;
    protected $guru;
    protected $countdatapegawai;
    protected $pengumumanmodel;
    // public function index()
    // {
    //     return view('dashboard');
    // }

    public function __construct()
    {
        $this->model = new Emis_model();
        $this->guru = new Dataguru_model();
        $this->pengumumanmodel = new Pengumuman_model();
        $this->cek_login();
    }

    public function index()
    {
        // $count = $this->model->countAllResults();
        $data['countsiswa'] = $this->model->countAllResults();
        $data['countguru'] = $this->guru->where('jabatan', 'guru')->countAllResults();
        $data['datasiswa'] = $this->model->find();
        $data['dosen0072'] = $this->pengumumanmodel->find();
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }
        echo view('dashboard', $data);
    }
}
