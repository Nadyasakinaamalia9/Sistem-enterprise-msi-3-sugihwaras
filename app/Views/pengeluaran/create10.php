<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">D A T A   -   P E N G E L U A R A N</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Data Pengeluaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('datapengeluaran/store10'); ?>" method="post">
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
                                    <label for="">Tanggal Bayar</label>
                                    <input type="date" class="form-control" name="tgl_bayar" placeholder="Masukkan Tanggal Bayar" value="<?php  //echo $inputs['nis']; }?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Keperluan</label>
                                    <input type="text" class="form-control" name="keperluan" placeholder="Masukkan Keperluan" value="<?php  //echo $inputs['bhs_indonesia']; }?>">
                                </div>  
                                <div class="col-md-6">
                                    <label for="">Beban Biaya</label>
                                    <input type="text" class="form-control" name="beban_biaya" placeholder="Masukkan Beban Biaya" value="<?php  ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">ID Pegawai</label>
                                    <input type="text" class="form-control" name="id_pegawai" placeholder="Masukkan ID Pegawai" value="<?php  ?>">
                                </div>
                                
                                
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('datapengeluaran'); ?>" class="btn btn-outline-info">Back</a>
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
