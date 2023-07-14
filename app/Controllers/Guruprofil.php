<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Dataguru_model;

class Guruprofil extends BaseController
{
    protected $model;
    public function __construct()
    {
        helper(['form']);
        $this->model = new Dataguru_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        $this->model = new Dataguru_model();

        // Filtering 
        //$category   =   $this->request->getGet('category');
        $keyword    =   $this->request->getGet('keyword');

        //$data['category']   =   $category; 
        $data['keyword']    =   $keyword;

        $obat0014     =   $this->model->where('jenis_kel', 'laki-laki')->findAll();
        $data['Pegawai'] = ['' => 'Pilih Category'] + array_column($obat0014, 'nama', 'id_pegawai');

        // filter 
        $where      = [];
        $like       = [];
        $or_like    = [];

        //if(!empty($category)){ 
        //    $where = ['products.category_id' => $category]; 
        //}

        if (!empty($keyword)) {
            $like = ['nip' => $keyword];
            $or_like = ['id_pegawai' => $keyword, 'nik' => $keyword, 'jenis_kel' => $keyword];
        }
        // end filter

        // paginate 
        $paginate = 7;
        //$data['obat0014'] = $model->paginate($paginate, 'category'); 
        $data['dosen0072'] = $this->model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'category');
        $data['pager'] = $this->model->pager;
        // generate number untuk tetap bertambah meskipun pindah halaman paginate 
        $nomor = $this->request->getGet('page_category');
        // define $nomor = 1 jika tidak ada get page_product 
        if ($nomor == null) {
            $nomor = 1;
        }
        $data['nomor'] = ($nomor - 1) * $paginate;
        // end generate number

        echo view('guruprofil/idx14', $data);
    }

    public function create14()
    {
        # code...
        return view('guruprofil/create14');
    }

    public function store14()
    {
        $validation =  \Config\Services::validation();
        $filename = $this->request->getFile('foto');
        // dd($filename);
        $name = $filename->getName();
        $data = array(
            'nip'         => $this->request->getPost('nip'),
            'nik'         => $this->request->getPost('nik'),
            'nama'        => $this->request->getPost('nama'),
            'id_pegawai'    => $this->request->getPost('id_pegawai'),
            'foto'    => $name,
            'alamat'        => $this->request->getPost('alamat'),
            'jenis_kel'        => $this->request->getPost('jenis_kel'),
            'tempat_lhr'       => $this->request->getPost('tempat_lhr'),
            'tgl_lahir'       => $this->request->getPost('tgl_lahir'),
            'agama'       => $this->request->getPost('agama'),
            'masuk_thn'       => $this->request->getPost('masuk_thn'),
            'sk_guru'       => $this->request->getPost('sk_guru'),
            'jabatan'       => $this->request->getPost('jabatan'),
        );

        if ($validation->run($data, 'guruprofil') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('guruprofil/create14'));
        } else {
            $model = new Dataguru_model();
            $filename->move(ROOTPATH . 'public/uploads', $name);
            $simpan = $model->insertCategory($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Successfully');
                return redirect()->to(base_url('guruprofil'));
            }
        }
    }

    public function edit14($id)
    {
        # code...
        $model = new Dataguru_model();
        $data['dataguru'] = $model->getCategory($id)->getRowArray();
        // dd($data);
        echo view('guruprofil/edit14', $data);
    }

    public function update14()
    {
        # code...
        $id = $this->request->getPost('id_pegawai');
        $validation = \Config\Services::validation();
        $filename = $this->request->getFile('foto');
        $name = $filename->getName();
        if (empty($name)) {
        }
        $data = array(
            'nip'         => $this->request->getPost('nip'),
            'nik'         => $this->request->getPost('nik'),
            'foto'         => $name,
            'id_pegawai'    => $this->request->getPost('id_pegawai'),
            'nama'        => $this->request->getPost('nama'),
            'alamat'        => $this->request->getPost('alamat'),
            'jenis_kel'        => $this->request->getPost('jenis_kel'),
            'tempat_lhr'       => $this->request->getPost('tempat_lhr'),
            'tgl_lahir'       => $this->request->getPost('tgl_lahir'),
            'agama'       => $this->request->getPost('agama'),
            'masuk_thn'       => $this->request->getPost('masuk_thn'),
            'sk_guru'       => $this->request->getPost('sk_guru'),
            'jabatan'       => $this->request->getPost('jabatan'),
        );
        // dd($data);
        if ($validation->run($data, 'guruprofil') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('guruprofil/edit14/' . $id));
        } else {
            $model = new Dataguru_model();
            $filename->move(ROOTPATH . 'public/uploads', $name);
            $ubah = $model->updateCategory($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('dashboard'));
            }
        }
    }

    public function show14($id)
    {
        $model = new Dataguru_model();
        //$data['category'] = $this->Category_model->getCategory($id);
        $data['dataguru'] = $model->getCategory($id)->getRowArray();
        echo view('guruprofil/show14', $data);
    }


    public function delete14($id)
    {
        $model = new Dataguru_model();
        $hapus = $model->deleteDataguru($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Category Succesfully');
            return redirect()->to(base_url('guruprofil'));
        }
    }
}
