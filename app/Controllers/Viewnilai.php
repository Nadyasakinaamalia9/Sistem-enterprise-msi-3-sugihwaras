<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ujian_model;
use App\Models\Spp_model;
use App\Models\Emis_model;
use App\Models\Viewnilai_model;
use App\Views\payments;

class Viewnilai extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Viewnilai_model();
    }

    // Metode untuk menampilkan nilai siswa
//     public function index($nis)
// {
//     if ($nis != null) {
//         // echo "NIS yang diterima: " . $nis;

//         $nilaiSiswa = $this->model->getNilaiSiswa($nis);
//         // var_dump($nilaiSiswa);
//         if ($nilaiSiswa) {
//             $data['nilai'] = $nilaiSiswa;

//             return view('nilai/idx20', $data);
//         } else {
//             echo "Data siswa tidak ditemukan.";
//         }
//     } else {
//         echo "NIS siswa tidak diberikan.";
//     }
    
// }

// public function index($nis)
// {
//     if (!empty($nis)) {
//         $nilaiSiswa = $this->model->getNilaiSiswa($nis);

//         if ($nilaiSiswa) {
//             $data['nis'] = $nilaiSiswa;

//             return view('nilai/idx20', $data);
//         } else {
//             echo "Data siswa tidak ditemukan.";
//         }
//     } else {
//         echo "NIS siswa tidak diberikan.";
//     }
// }
// ...

public function index($nis)
{
    if (!empty($nis)) {
        $nilaiSiswa = $this->model->getNilaiSiswa($nis);

        if ($nilaiSiswa) {
            $data['nilaiSiswa'] = $nilaiSiswa;

            return view('nilai/idx20', $data);
        } else {
            echo "Data siswa tidak ditemukan.";
        }
    } else {
        echo "NIS siswa tidak diberikan.";
    }
}
}
