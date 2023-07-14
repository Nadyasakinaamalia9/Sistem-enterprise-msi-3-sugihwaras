<?php

namespace App\Controllers;

use App\Models\Auth_model;
use App\Models\Dataguru_model;
use App\Models\Emis_model;

class Auth extends BaseController
{
    protected $helper = [];
    protected $auth_model;
    protected $datapegawai;
    protected $emis;
    public function __construct()
    {
        helper(['form']);
        $this->cek_login();
        $this->auth_model = new Auth_model();
        $this->datapegawai = new Dataguru_model();
        $this->emis= new Emis_model();
    }

    public function index()
    {
        if ($this->cek_login() == TRUE) {

            return redirect()->to('/dashboard');
        }

        echo view('auth/login');
    }

    public function login()
    {
        if ($this->cek_login() == TRUE) {
            return redirect()->to('/dashboard');
        }
        echo view('auth/login');
    }

    public function dashboard()
    {
        $session = session();

        if ($session->get('isLoggedIn')) {
            $role = $session->get('role');

            if ($role == 'guru') {
                return redirect()->to('/emis');
                return redirect()->to('/dataguru');
            }
        }
    }

    public function proses_login()
    {
        $validation =  \Config\Services::validation();

        $id_pegawai  = $this->request->getPost('id_pegawai');
        // dd($id_pegawai);
        $pass   = $this->request->getPost('password');
        $role = $this->request->getPost('role');
        // session()->set('id_pegawai', $id_pegawai);

        // $Dataguru_model = new Dataguru_model();
        // $id_pegawai = $Dataguru_model->find($Dataguru_model->id);

        // $Dataguru_model = $id_pegawai->Dataguru_model;

        // session()->set('password', $id_pegawai->password);
        // session()->set('nama', $nama->nama);

        $data = [
            'id_pegawai' => $id_pegawai,
            'password' => $pass,
            'role' => $role
        ];

        if ($validation->run($data, 'authlogin') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/auth/login');
        } else {

            $cek_login = $this->auth_model->cek_login($id_pegawai);

            // email didapatkan
            if ($cek_login == TRUE) {

                // jika email dan password cocok
                if (password_verify($pass, $cek_login['password'])) {

                    session()->set('id_pegawai', $cek_login['id_pegawai']);
                    session()->set('role', $cek_login['role']);


                    $nama = $this->datapegawai->find($cek_login['id_pegawai']);
                    session()->set('nama', $nama['nama']);
                    session()->set('foto', $nama['foto']);

                    // dd(session()->get('nama'));
                    return redirect()->to('/dashboard');
                    // id cocok, tapi password salah
                } else {
                    session()->setFlashdata('errors', ['' => 'Password yang Anda masukan salah']);
                    return redirect()->to('/auth/login');
                }
            } else {
                // email tidak cocok / tidak terdaftar
                session()->setFlashdata('errors', ['' => 'ID yang Anda masukan tidak terdaftar']);
                return redirect()->to('/auth/login');
            }
        }
    }

    public function register()
    {
        if ($this->cek_login() == TRUE) {
            return redirect()->to('/dashboard');
        }
        return view('auth/register');
    }

    public function proses_register()
    {
        $validation =  \Config\Services::validation();

        $data = [
            'id_pegawai'         => $this->request->getPost('id_pegawai'),
            'password'           => $this->request->getPost('password'),
            'role'               => $this->request->getPost('role')
        ];

        if ($validation->run($data, 'authregister') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            session()->setFlashdata('inputs', $this->request->getPost());
            return redirect()->to('/auth/register');
        } else {

            $datalagi = [
                'id_pegawai'         => $this->request->getPost('id_pegawai'),
                'password'      => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'         => $this->request->getPost('role'),
            ];

            $simpan = $this->auth_model->register($datalagi);

            if ($simpan) {
                session()->setFlashdata('success_register', 'Register Successfully');
                return redirect()->to('/auth/login');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
