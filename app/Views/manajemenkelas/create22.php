<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Input Kelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Manajemen Kelas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('manajemenkelas/store22'); ?>" method="post" enctype="multipart/form-data">
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
                                        <div class="form-group">
                                            <label for="tahun_ajaran">Tahun Ajaran</label>
                                            <select name="tahun_ajaran" class="form-control">
                                                <option value="">Pilih Tahun Ajaran</option>
                                                <?php foreach ($tahun_ajaran as $ajaran_item) : ?>
                                                    <option value="<?php echo $ajaran_item['tahun_ajaran']; ?>"><?php echo $ajaran_item['tahun_ajaran']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Kelas</label>
                                        <input type="text" class="form-control" name="kelas" placeholder="Masukkan  kelas" value="<?php  ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Jumlah Laki - Laki</label>
                                        <input type="text" class="form-control" name="laki_laki" placeholder="Masukkan jumlah laki-laki" value="<?php  ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Jumlah Perempuan</label>
                                        <input type="text" class="form-control" name="perempuan" placeholder="Masukkan jumlah perempuan" value="<?php  ?>">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('manajemenkelas'); ?>" class="btn btn-outline-info">Back</a>
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