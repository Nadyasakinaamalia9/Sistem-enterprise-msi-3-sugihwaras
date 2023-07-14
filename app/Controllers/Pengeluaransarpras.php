<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengeluaransarpras_model;
use App\Models\Emis_model;
use App\Models\Dataguru_model;
use App\Models\Sarpras_model;

class Pengeluaransarpras extends BaseController
{
    protected $model;
    protected $sppmodel;
    protected $gurumodel;
    protected $sarprasmodel;
    public function __construct()
    {
        helper(['form']);
        $this->model = new Pengeluaransarpras_model();
        $this->sppmodel = new Emis_model();
        $this->gurumodel = new Dataguru_model();
        $this->sarprasmodel = new Sarpras_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        $model = new Pengeluaransarpras_model();

        // Filtering 
        //$category   =   $this->request->getGet('category');
        $keyword    =   $this->request->getGet('keyword');

        //$data['category']   =   $category; 
        $data['keyword']    =   $keyword;

        $obat0014     =   $model->where('keterangan')->findAll();
        $data['Pegawai'] = ['' => 'Pilih Category'] + array_column($obat0014, 'nama', 'id_pegawai');

        // filter 
        $where      = [];
        $like       = [];
        $or_like    = [];

        //if(!empty($category)){ 
        //    $where = ['products.category_id' => $category]; 
        //}

        if (!empty($keyword)) {
            $like = ['keterangan' => $keyword];
            $or_like = ['id_pegawai' => $keyword, 'keterangan' => $keyword];
        }
        // end filter

        // paginate 
        $paginate = 15;
        //$data['obat0014'] = $model->paginate($paginate, 'category'); 
        $data['dosen0072'] = $model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'category');
        $data['pager'] = $model->pager;
        // generate number untuk tetap bertambah meskipun pindah halaman paginate 
        $nomor = $this->request->getGet('page_category');
        // define $nomor = 1 jika tidak ada get page_product 
        if ($nomor == null) {
            $nomor = 1;
        }
        $data['nomor'] = ($nomor - 1) * $paginate;
        // end generate number

        echo view('pengeluaransarpras/idx15', $data);
    }


    public function create15()
    {
        # code...
        $data['datapegawai'] = $this->gurumodel->findAll();
        $data['keterangan'] = $this->sarprasmodel->findAll();
        // return view('emis/create2', $data);
        return view('pengeluaransarpras/create15', $data);
    }
    public function store15()
    {
        $validation =  \Config\Services::validation();
        $filename = $this->request->getFile('bukti_sarpras');
        // dd($filename);
        $name = $filename->getName();
        $data = array(
            'keterangan'         => $this->request->getPost('keterangan'),
            'jumlah'    => $this->request->getPost('jumlah'),
            'harga'    => $this->request->getPost('harga'),
            'bukti_sarpras'    => $name,
            'id_pegawai'         => $this->request->getPost('id_pegawai'),
        );

        if ($validation->run($data, 'pengeluaransarpras') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pengeluaransarpras/create15'));
        } else {
            $model = new Pengeluaransarpras_model();
            $filename->move(ROOTPATH . 'public/uploads', $name);
            $simpan = $model->insertCategory($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Successfully');
                return redirect()->to(base_url('pengeluaransarpras'));
            }
        }
    }

    public function edit15($id)
    {
        # code...
        $model = new Pengeluaransarpras_model();
        $data['pengeluaransarpras'] = $model->getCategory($id)->getRowArray();
        echo view('pengeluaransarpras/edit15', $data);
    }
    public function update15()
    {
        # code...
        $id = $this->request->getPost('id');
        $validation = \Config\Services::validation();
        $filename = $this->request->getFile('bukti_sarpras');
        // dd($filename);
        $name = $filename->getName();

        $data = array(
            'keterangan'         => $this->request->getPost('keterangan'),
            'jumlah'    => $this->request->getPost('jumlah'),
            'harga'    => $this->request->getPost('harga'),
            'bukti_sarpras'    => $name,
            'id_pegawai'         => $this->request->getPost('id_pegawai'),
        );

        if ($validation->run($data, 'pengeluaransarpras') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pengeluaransarpras/edit15/' . $id));
        } else {
            $model = new Pengeluaransarpras_model();
            $filename->move(ROOTPATH . 'public/uploads', $name);

            $ubah = $model->updateCategory($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('pengeluaransarpras'));
            }
        }
    }
    public function show15($id)
    {
        // $data['pengeluaransarpras'] = $this->Pengeluaransarpras_model->getCategory($id);
        // echo view('pengeluaransarpras/show15', $data);
        $model = new Pengeluaransarpras_model();
        //$data['category'] = $this->Category_model->getCategory($id);
        $data['pengeluaransarpras'] = $model->getCategory($id)->getRowArray();
        echo view('pengeluaransarpras/show15', $data);
    }
}
