<?php

namespace App\Controllers;

use App\Models\Auth_model_siswa;
use App\Models\Emis_model;

class Auth_siswa extends BaseController
{
    protected $helper = [];
    protected $auth_model_siswa;
    protected $emis_model;

    public function __construct()
    {
        helper(['form']);
        $this->cek_login();
        $this->auth_model_siswa = new Auth_model_siswa();
        $this->emis_model = new Emis_model();
    }

    public function index()
    {
        if ($this->cek_login() == TRUE) {
            return redirect()->to('/dashboard');
        }

        echo view('auth_siswa/login_siswa');
    }

    public function login_siswa()
    {
        if ($this->cek_login() == TRUE) {
            return redirect()->to('/dashboard');
        }

        echo view('auth_siswa/login_siswa');
    }

    public function dashboard()
    {
        $session = session();

        if ($session->get('isLoggedIn')) {
            $role = $session->get('role');

            if ($role == 'siswa') {
                return redirect()->to('/emis');
                // return redirect()->to('/dataguru');
            }
        }
    }

    public function proses_login()
    {
        $validation = \Config\Services::validation();

        $nis = $this->request->getPost('nis');
        $pass = $this->request->getPost('password');
        $role = $this->request->getPost('role');

        $data = [
            'nis' => $nis,
            'password' => $pass,
            'role' => $role
        ];

        if ($validation->run($data, 'auth_siswa') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/auth_siswa/login_siswa');
        } 
        else {
            $cek_login = $this->auth_model_siswa->cek_login($nis);

            if ($cek_login==TRUE) {
                if (password_verify($pass, $cek_login['password'])) {
                    session()->set('nis', $cek_login['nis']);
                    session()->set('role', $cek_login['role']);

                    // Mengambil data dari tabel "emis" berdasarkan NIS
                    $emisData = $this->emis_model->getEmisByUsername($nis);
                    // Lakukan sesuai kebutuhan Anda, misalnya menyimpan data dalam session
                    session()->set('nama', $emisData['nama']);
                    session()->set('foto', $emisData['foto']);

                    return redirect()->to('/dashboard');
                } else {
                    session()->setFlashdata('errors', ['' => 'Password yang Anda masukan salah']);
                    return redirect()->to('/auth_siswa/login_siswa');
                }
            } else {
                session()->setFlashdata('errors', ['' => 'NIS yang Anda masukan tidak terdaftar']);
                return redirect()->to('/auth_siswa/login_siswa');
            }
        }
    }

    public function register_siswa()
    {
        if ($this->cek_login() == TRUE) {
            return redirect()->to('/dashboard');
        }

        return view('auth_siswa/register_siswa');
    }

    public function proses_register()
    {
        $validation = \Config\Services::validation();

        $data = [
            'nis' => $this->request->getPost('nis'),
            'password' => $this->request->getPost('password')
        ];

        if ($validation->run($data, 'authregistersiswa') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            session()->setFlashdata('inputs', $this->request->getPost());
            return redirect()->to('/auth_siswa/register_siswa');
        } else {
            $datalagi = [
                'nis' => $this->request->getPost('nis'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ];

            $simpan = $this->auth_model_siswa->register($datalagi);

            if ($simpan) {
                session()->setFlashdata('success_register', 'Register Successfully');
                return redirect()->to('/auth_siswa/login_siswa');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth_siswa/login');
    }

   

    // public function cek_login()
    //     {
    //     $session = session();
    //     $nis = $session->get('nis');
    //     $isLoggedIn = $session->get('isLoggedIn');

    //     if (!empty($nis) && $isLoggedIn) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    //     }

    // public function login_siswa()
    // {
    //     return view('auth_siswa/login_siswa');
    // }

    // public function proses_login()
    // {
    //     $validation = \Config\Services::validation();

    //     $nis = $this->request->getPost('nis');
    //     $password = $this->request->getPost('password');

    //     $data = [
    //         'nis' => $nis,
    //         'password' => $password
    //     ];

    //     if ($validation->run($data, 'auth_siswa') == FALSE) {
    //         session()->setFlashdata('errors', $validation->getErrors());
    //         return redirect()->to('/auth_siswa/login_siswa');
    //     } else {

    //         $cek_login = $this->auth_model_siswa->cek_login($nis);
    //         // dd($cek_login['password']);
    //         // email didapatkan
    //         if ($cek_login == TRUE) {

    //             // jika email dan password cocok
    //             if (password_verify($password, $cek_login['password'])) {

    //                 session()->set('nis', $cek_login['nis']);

    //                 $nama = $this->emis_model->find($cek_login['nis']);
    //                 session()->set('nama', $nama['nama']);
    //                 session()->set('foto', $nama['foto']);

    //                 // dd(session()->get('nama'));
    //                 return redirect()->to('/dashboard');
    //                 // email cocok, tapi password salah
    //             } else {
    //                 session()->setFlashdata('errors', ['' => 'Password yang Anda masukan salah']);
    //                 return redirect()->to('/auth_siswa/login_siswa');
    //             }
                

    //         } else {
    //             // email tidak cocok / tidak terdaftar
    //             session()->setFlashdata('errors', ['' => 'ID yang Anda masukan tidak terdaftar']);
    //             return redirect()->to('/auth_siswa/login_siswa');
    //         }
    //     }

        // $user = $this->auth_model_siswa->cek_login($nis);

        // if ($user) {
        //     if (password_verify($password, $user['password'])) {
        //         $emisData = $this->emis_model->getEmisByUsername($nis);

        //         // Lakukan sesuai kebutuhan Anda, misalnya menyimpan data dalam session
        //         session()->set('nis', $user['nis']);
        //         session()->set('nama', $emisData['nama']);
        //         session()->set('foto', $emisData['foto']);

        //         return redirect()->to('/dashboard');
        //     } else {
        //         session()->setFlashdata('errors', ['password' => 'Password yang Anda masukkan salah.']);
        //     }
        // } else {
        //     session()->setFlashdata('errors', ['nis' => 'NIS tidak terdaftar.']);
        // }

        // return redirect()->to('/auth_siswa/login_siswa');
        }   
