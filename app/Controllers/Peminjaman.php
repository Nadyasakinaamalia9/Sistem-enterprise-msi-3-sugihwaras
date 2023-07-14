<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Peminjaman_model;
use App\Models\Emis_model;
use App\Models\Dataguru_model;
use App\Models\Sarpras_model;

class Peminjaman extends BaseController
{
    protected $model;
    protected $sppmodel;
    protected $gurumodel;
    protected $sarprasmodel;
    public function __construct()
    {
        helper(['form']);
        $this->model = new Peminjaman_model();
        $this->sppmodel = new Emis_model();
        $this->gurumodel = new Dataguru_model();
        $this->sarprasmodel = new Sarpras_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        $model = new Peminjaman_model();

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


        $this->model = new Peminjaman_model();
        // $data['peminjaman'] = $model->getPeminjamanSarprasById($data);
        echo view('peminjaman/idx13', $data);
    }


    public function create13()
    {
        # code...
        $data['datanis'] = $this->sppmodel->findAll();
        $data['datapegawai'] = $this->gurumodel->findAll();
        $data['keterangan'] = $this->sarprasmodel->findAll();
        // return view('emis/create2', $data);
        return view('peminjaman/create13', $data);
    }
    public function store13()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'keterangan'         => $this->request->getPost('keterangan'),
            'jumlah'    => $this->request->getPost('jumlah'),
            'id_pegawai'         => $this->request->getPost('id_pegawai'),
        );

        if ($validation->run($data, 'peminjaman') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('peminjaman/create13'));
        } else {
            $model = new Peminjaman_model();
            $simpan = $model->insertCategory($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Successfully');
                return redirect()->to(base_url('peminjaman'));
            }
        }
    }

    public function edit13($id)
    {
        # code...
        $model = new Peminjaman_model();
        $data['peminjaman'] = $model->getCategory($id)->getRowArray();
        echo view('peminjaman/edit13', $data);
    }
    public function update13()
    {
        # code...
        $id = $this->request->getPost('id');
        $validation = \Config\Services::validation();

        $data = array(
            'keterangan'         => $this->request->getPost('keterangan'),
            'jumlah'    => $this->request->getPost('jumlah'),
            'id_pegawai'         => $this->request->getPost('id_pegawai'),
        );

        if ($validation->run($data, 'peminjaman') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('peminjaman/edit13/' . $id));
        } else {
            $model = new Peminjaman_model();
            $ubah = $model->updateCategory($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('peminjaman'));
            }
        }
    }
    public function show13($id)
    {
        $data['peminjaman'] = $this->sppmodel->getCategory($id);
        echo view('peminjaman/show13', $data);
    }
    public function delete13($id)
    {
        $model = new Peminjaman_model();
        $hapus = $model->deletePeminjaman($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Category Succesfully');
            return redirect()->to(base_url('peminjaman'));
        }
    }
}
