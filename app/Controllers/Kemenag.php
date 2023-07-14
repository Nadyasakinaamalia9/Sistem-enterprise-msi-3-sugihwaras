<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Kemenag_model;

class Kemenag extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $model = new Kemenag_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        $model = new Kemenag_model();
        
        // Filtering 
        //$category   =   $this->request->getGet('category');
        $keyword    =   $this->request->getGet('keyword');

        //$data['category']   =   $category; 
        $data['keyword']    =   $keyword;

        $obat0014     =   $model->where('keterangan')->findAll(); 
        $data['kemenag'] = ['' => 'Pilih Category'] + array_column($obat0014, 'id', 'id_pegawai'); 

        // filter 
        $where      = []; 
        $like       = []; 
        $or_like    = []; 

        //if(!empty($category)){ 
        //    $where = ['products.category_id' => $category]; 
        //}
            
        if(!empty($keyword)){ 
            $like = ['nisn' => $keyword]; 
            $or_like = ['nis' => $keyword, 'nik' => $keyword, 'jenis_kel' => $keyword]; 
        }
        // end filter

        // paginate 
        $paginate = 6;
        //$data['obat0014'] = $model->paginate($paginate, 'category'); 
        $data['dosen0072'] = $model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'category'); 
        $data['pager'] = $model->pager; 
        // generate number untuk tetap bertambah meskipun pindah halaman paginate 
        $nomor = $this->request->getGet('page_category'); 
        // define $nomor = 1 jika tidak ada get page_product 
        if($nomor == null){ 
            $nomor = 1; 
        } 
        $data['nomor'] = ($nomor - 1) * $paginate; 
        // end generate number

        echo view('kemenag/idx7', $data);
    }

    public function create7()
    {
        # code...
        
        return view('kemenag/create7');
    }
    
    public function store7()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'id'         => $this->request->getPost('id'),
            'tanggal'         => $this->request->getPost('tanggal'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'biaya'        => $this->request->getPost('biaya'),
            'id_pegawai'        => $this->request->getPost('id_pegawai'),
        );

        if($validation->run($data, 'kemenag') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('kemenag/create7'));
        } else {
            $model = new Kemenag_model();
            $simpan = $model->insertCategory($data);
            if($simpan)
            {
                session()->setFlashdata('dark', 'Created Successfully');
                return redirect()->to(base_url('kemenag')); 
            }
        }
    }

    
 }
 ?>
