<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Input Tahun Ajaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Manajemen Ajaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('manajemenajaran/store21'); ?>" method="post" enctype="multipart/form-data"> 
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
                                        <label for="">Tahun Ajaran</label>
                                        <input type="text" class="form-control" name="tahun_ajaran" placeholder="Masukkan tahun ajaran" value="<?php  ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Jumlah Kelas</label>
                                        <input type="text" class="form-control" name="jumlah_kelas" placeholder="Masukkan jumlah kelas" value="<?php  ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Kurikulum</label>
                                        <input type="text" class="form-control" name="kurikulum" placeholder="Masukkan kurikulum" value="<?php  ?>">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('manajemenajaran'); ?>" class="btn btn-outline-info">Back</a>
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