<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Manajemen Kelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Manajemen Kelas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('manajemenkelas/update22'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <?php
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

                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <input type="text" name="kelas" value="<?php echo $manajemenkelas['kelas']; ?>" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label for=""> Tahun Ajaran</label>
                                    <input type="text" value="<?php echo $manajemenkelas['tahun_ajaran']; ?>" class="form-control" name="tahun_ajaran" placeholder="Masukkan Tahun Ajaran" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Laki - Laki</label>
                                    <input type="text" value="<?php echo $manajemenkelas['laki_laki']; ?>" class="form-control" name="laki_laki" placeholder="Masukkan Jumlah Laki - Laki">
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Perempuan</label>
                                    <input type="text" value="<?php echo $manajemenkelas['perempuan']; ?>" class="form-control" name="perempuan" placeholder="Masukkan Jumlah Perempuan">
                                </div>

                                <div class="card-footer">
                                    <a href="<?php echo base_url('manajemenkelas'); ?>" class="btn btn-outline-info">Back</a>
                                    <button type="submit" class="btn btn-primary float-right">Update</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo view('_partials/footer'); ?>