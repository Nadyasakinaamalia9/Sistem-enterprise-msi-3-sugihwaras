<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ujian_model;
use App\Models\Spp_model;
use App\Models\Emis_model;
use App\Models\Viewpembayaran_model;
use App\Views\payments;

class Viewpembayaran extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Viewpembayaran_model();
    }

    public function index()
    {
        // Mendapatkan user ID dari session atau cookie
        $nis = session()->get('nis');

        $payments = $this->model->getPaymentByUser($nis);

        return view('payments/idx19', ['payments' => $payments]);  
    }
    
    public function show19($nis)
    {
        $payments = $this->model->getPaymentByUser($nis);

        if (empty($payments)) {
            session()->setFlashdata('warning', 'Tidak ada pembayaran yang ditemukan.');
        }

        return view('payments/show19', ['payments' => $payments]);
    }
   

    // public function handleRequest($nis) 
    // {
    //     $payments = $this->model->getPaymentByUser($nis);
    //     $this->model->showPayments($payments);    
    //     echo view('payments/show19', $payments);
    // }
}

