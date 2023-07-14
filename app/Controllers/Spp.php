<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Spp_model;
use App\Models\Emis_model;
use App\Models\Dataguru_model;

class Spp extends BaseController
{
    protected $model;
    protected $sppmodel;
    protected $gurumodel;
    public function __construct()
    {
        helper(['form']);
        $this->model = new Spp_model();
        $this->sppmodel = new Emis_model();
        $this->gurumodel = new Dataguru_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        // $model = new Spp_model();


        // Filtering 
        //$category   =   $this->request->getGet('category');
        $keyword    =   $this->request->getGet('keyword');

        //$data['category']   =   $category; 
        $data['keyword']    =   $keyword;

        // $obat0014     =   $model->where('beban_pembayaran')->findAll();
        // $data['Spp'] = ['' => 'Pilih Category'] + array_column($obat0014, 'nama', 'id_pegawai');

        // filter 
        $where      = [];
        $like       = [];
        $or_like    = [];

        //if(!empty($category)){ 
        //    $where = ['products.category_id' => $category]; 
        //}

        if (!empty($keyword)) {
            $like = ['nis' => $keyword];
            $or_like = ['tanggal_bayar' => $keyword, 'bulan' => $keyword];
        }
        // end filter


        // paginate 
        $paginate = 15;
        //$data['obat0014'] = $model->paginate($paginate, 'category'); 
        $data['dosen0072'] = $this->model->where($where)->like($like)->orLike($or_like)->orderBy('tanggal_bayar', 'ASC')->paginate($paginate, 'spp');
        $data['pager'] = $this->model->pager;
        // generate number untuk tetap bertambah meskipun pindah halaman paginate 
        $nomor = $this->request->getGet('page_spp');
        // define $nomor = 1 jika tidak ada get page_product 
        if ($nomor == null) {
            $nomor = 1;
        }
        $data['nomor'] = ($nomor - 1) * $paginate;
        // end generate number

        echo view('spp/idx4', $data);
    }


    public function create4()
    {
        # code...
        $data['datanis'] = $this->sppmodel->findAll();
        $data['datapegawai'] = $this->gurumodel->findAll();
        // return view('emis/create2', $data);
        return view('spp/create4', $data);
    }

    public function edit4($id)
    {
        # code...
        $model = new Spp_model();
        $data['spp'] = $model->getCategory($id)->getRowArray();
        echo view('spp/edit4', $data);
    }

    public function show4($id)
    {
        $model = new Spp_model();
        $data['spp'] = $model->getCategory($id)->getRowArray();
        echo view('spp/show4', $data);
    }

    // public function show4($id)
    // {

    //     $model = new Spp_model();
    //     $data['spp'] = $model->getCategoryByNisOrId($id);
    //     // $payments = $this->model->getPaymentByUser($nis);
    //     echo view('spp/show4', $data);
    // }

    public function update4()
    {
        # code...
        $id = $this->request->getPost('nis');
        $validation = \Config\Services::validation();

        $data = array(
            'nis'         => $this->request->getPost('nis'),
            'tanggal_bayar'    => $this->request->getPost('tanggal_bayar'),
            'bulan'        => $this->request->getPost('bulan'),
            'bukti_spp'         => $this->request->getPost('bukti_spp'),
            'beban_pembayaran' => $this->request->getPost('beban_pembayaran'),
            'id_pegawai'         => $this->request->getPost('id_pegawai'),
        );

        if ($validation->run($data, 'spp') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('spp/edit4/' . $id));
        } else {
            $model = new Spp_model();
            $ubah = $model->updateCategory($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('spp'));
            }
        }
    }

    public function print4()
    {
        $data = [
            'spp' => $this->model->getData()
        ];

        return view('spp/print4', $data);
    }

    public function excel4()
    {
        $data = [
            'spp' => $this->model->getData()
        ];
        return view('spp/excel4', $data);
    }

    public function store4()
    {
        $validation =  \Config\Services::validation();

        $filename = $this->request->getFile('bukti_spp');
        $name = $filename->getName();
        // $name = $filename->getExtension() == 'jpeg';

        $data = array(
            'nis'         => $this->request->getPost('nis'),
            'tanggal_bayar'         => $this->request->getPost('tanggal_bayar'),
            'bulan'    => $this->request->getPost('bulan'),
            'beban_pembayaran'        => $this->request->getPost('beban_pembayaran'),
            'bukti_spp'        => $name,
            'id_pegawai'        => $this->request->getPost('id_pegawai'),
        );

        if ($validation->run($data, 'spp') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('spp/create4'));
        } else {
            //upload
            //   $image->move(ROOTPATH.'public/uploads',$name);

            $model = new Spp_model();
            $filename->move(ROOTPATH . 'public/uploads', $name);
            $simpan = $model->insertCategory($data);

            if ($simpan) {
                session()->setFlashdata('success', 'Created Successfully');
                return redirect()->to(base_url('spp'));
            }
        }
    }

    public function laporan_pembayaran4($id)
    {
        $model = new Spp_model();
        $data['dosen0072'] = $model->getCategory($id)->getResultArray();
        echo view('spp/laporan_pembayaran4', $data);
    }

    public function printout($id)
    {
        $model = new Spp_model();
        $data['spp'] = $model->getDatasatuan($id);
        // dd($data);

        echo view('spp/printout_nota_spp', $data);
    }
}
