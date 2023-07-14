<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">D A T A   -   K E M E N A G </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Data Kemenag</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('kemenag/store7'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
                               // if (!empty($inputs)){
                                 //   $inputs = session()->getFlashdata('inputs');
                                //}
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Whoops! Ada kesalahan saat input data, yaitu:
                                        <ul>
                                            <?php foreach ($errors as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <div class="row">
                                <div class="col-md-6">
                                    <label for="">ID</label>
                                    <input type="text" class="form-control" name="id" placeholder="Masukkan ID Pendaftaran" value="<?php  //echo $inputs['id_daftar']; }?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tanggal </label>
                                    <input type="date" class="form-control" name="tanggal" placeholder="Masukkan NISN" value="<?php  //echo $inputs['nisn']; }?>">
                                </div>  
                                <div class="col-md-6">
                                    <label for="">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Agama" value="<?php  ?>">
                                </div>
                               
                                <div class="col-md-6">
                                    <label for="">Biaya</label>
                                    <input type="text" class="form-control" name="biaya" placeholder="Masukkan Agama" value="<?php  ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">ID Pegawai</label>
                                    <input type="text" class="form-control" name="id_pegawai" placeholder="Masukkan Agama" value="<?php  ?>">
                                </div>
                                
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('kemenag'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>
