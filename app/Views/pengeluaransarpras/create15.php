    <?php echo view('_partials/header'); ?>
    <?php echo view('_partials/sidebar'); ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">PEMBELIAN DATA SARPRAS</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Pengeluaran Data Sarpras</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url('pengeluaransarpras/store15'); ?>" method="post" enctype="multipart/form-data">
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
                                        <!-- <div class="col-md-6">
                                        <label for="">Keterangan Barang</label>
                                        <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan" value="<?php  ?>">
                                    </div> -->

                                        <div class="col-md-6">
                                            <label for="">Nama Barang</label>
                                            <select name="keterangan" id="" class="form-control">
                                                <option value="">Pilih Nama Barang</option>
                                                <?php foreach ($keterangan as $ambildata) : ?>
                                                    <option value="<?= $ambildata['keterangan'] ?>"><?= $ambildata['keterangan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Jumlah</label>
                                            <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" value="<?php  ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Harga</label>
                                            <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga" value="<?php  ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Bukti Sarpras</label>
                                            <input type="file" class="form-control" name="bukti_sarpras" placeholder="" value="<?php  ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">ID Pegawai</label>
                                            <select name="id_pegawai" id="" class="form-control">
                                                <option value="">Pilih ID Pegawai</option>
                                                <?php foreach ($datapegawai as $ambildata) : ?>
                                                    <option value="<?= $ambildata['id_pegawai'] ?>"><?= $ambildata['id_pegawai'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="<?php echo base_url('pengeluaransarpras'); ?>" class="btn btn-outline-info">Back</a>
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