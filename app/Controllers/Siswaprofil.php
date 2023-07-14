<?php

namespace App\Controllers;

use App\Models\Category_model;
use CodeIgniter\Controller;
use App\Models\Emis_model;

class Siswaprofil extends BaseController
{
    protected $model;
    protected $ppdbmodel;
    public function __construct()
    {
        helper(['form']);
        $this->model = new Emis_model();
        $this->ppdbmodel = new Category_model();
    }

    public function index()
    {
        //////////////////////////
        // $this->model = new Emis_model();
        // $filterData = [
        //     'nama' => $this->request->getVar('nama') // Mendapatkan nilai filter dari request
        // ];

        // $data['filter'] = $this->model->getFilteredData($filterData); // Mendapatkan data yang telah difilter
        ////////////////////////

        $keyword    =   $this->request->getGet('keyword');

        $data['keyword']    =   $keyword;


        // filter 
        $where      = [];
        $like       = [];
        $or_like    = [];


        if (!empty($keyword)) {
            $like = ['nisn' => $keyword];
            $or_like = ['nis' => $keyword, 'nik' => $keyword, 'jenis_kel' => $keyword];
        }
        // end filter

        // paginate 
        $paginate = 6;
        $data['dosen0072'] = $this->model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'emis');
        $data['pager'] = $this->model->pager;

        $nomor = $this->request->getGet('page_emis');

        if ($nomor == null) {
            $nomor = 1;
        }
        $data['nomor'] = ($nomor - 1) * $paginate;
        // end generate number

        echo view('siswaprofil/idx17', $data);
    }

    public function create17()
    {
        # code...
        // $data['datappdb'] = $this->ppdbmodel->findAll();
        return view('siswaprofil/create17');
    }

    public function store17()
    {
        $validation =  \Config\Services::validation();

        $filename = $this->request->getFile('foto');
        // dd($filename);  
        $name = $filename->getName();

        $data = array(
            'nis'         => $this->request->getPost('nis'),
            'nisn'         => $this->request->getPost('nisn'),
            'nik'    => $this->request->getPost('nik'),
            'nama'        => $this->request->getPost('nama'),
            'foto' => $name,
            'alamat'        => $this->request->getPost('alamat'),
            'jenis_kel'        => $this->request->getPost('jenis_kel'),
            'tempat_lhr'       => $this->request->getPost('tempat_lhr'),
            'tgl_lahir'       => $this->request->getPost('tgl_lahir'),
            'agama'       => $this->request->getPost('agama'),
            'tahun_ajaran'       => $this->request->getPost('tahun_ajaran'),
            'tinggi_bdn'       => $this->request->getPost('tinggi_bdn'),
            'berat_bdn'       => $this->request->getPost('berat_bdn'),
            'riwayat_pnykt'       => $this->request->getPost('riwayat_pnykt'),
            'nama_ayah'       => $this->request->getPost('nama_ayah'),
            'nama_ibu'       => $this->request->getPost('nama_ibu'),
        );

        if ($validation->run($data, 'siswaprofil') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('siswaprofil/create17'));
        } else {
            $model = new Emis_model();
            $filename->move(ROOTPATH . 'public/uploads', $name);
            $simpan = $model->insertCategory($data);
            if ($simpan) {
                session()->setFlashdata('danger', 'Created Data Siswa Successfully');
                return redirect()->to(base_url('siswaprofil'));
            }
        }
    }

    public function edit17($id)
    {
        # code...
        $model = new Emis_model();
        $data['emis'] = $model->getCategory($id)->getRowArray();
        echo view('siswaprofil/edit17', $data);
    }

    public function update17()
    {
        # code...
        $id = $this->request->getPost('nis');
        $validation = \Config\Services::validation();
        $filename = $this->request->getFile('foto');
        $name = $filename->getName();
        $data = array(
            'nis'         => $this->request->getPost('nis'),
            'nisn'         => $this->request->getPost('nisn'),
            'nik'    => $this->request->getPost('nik'),
            'nama'        => $this->request->getPost('nama'),
            'foto'        => $name,
            'alamat'        => $this->request->getPost('alamat'),
            'jenis_kel'        => $this->request->getPost('jenis_kel'),
            'tempat_lhr'       => $this->request->getPost('tempat_lhr'),
            'tgl_lahir'       => $this->request->getPost('tgl_lahir'),
            'agama'       => $this->request->getPost('agama'),
            'tahun_ajaran'       => $this->request->getPost('tahun_ajaran'),
            'tinggi_bdn'       => $this->request->getPost('tinggi_bdn'),
            'berat_bdn'       => $this->request->getPost('berat_bdn'),
            'riwayat_pnykt'       => $this->request->getPost('riwayat_pnykt'),
            'nama_ayah'       => $this->request->getPost('nama_ayah'),
            'nama_ibu'       => $this->request->getPost('nama_ibu'),
        );

        if ($validation->run($data, 'siswaprofil') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('siswaprofil/edit17/' . $id));
        } else {
            $model = new Emis_model();
            $filename->move(ROOTPATH . 'public/uploads', $name);
            $ubah = $model->updateCategory($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('dashboard'));
            }
        }
    }

    public function show17($id)
    {
        $model = new Emis_model();
        //$data['category'] = $this->Category_model->getCategory($id);
        $data['emis'] = $model->getCategory($id)->getRowArray();
        echo view('siswaprofil/show17', $data);
    }

    public function delete17($id)
    {
        $model = new Emis_model();
        $hapus = $model->deleteCategory($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Data Siswa Succesfully');
            return redirect()->to(base_url('siswaprofil'));
        }
    }
}
