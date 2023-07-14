<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">D A T A - U J I A N </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Data Pegawai</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('ujian/store5'); ?>" method="post">
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
                                        <label for="">NIS</label>
                                        <select name="nis" id="" class="form-control">
                                            <option value="">Pilih NIS</option>
                                            <?php foreach ($datanis as $ambildata) : ?>
                                                <option value="<?= $ambildata['nis'] ?>"><?= $ambildata['nis'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Tanggal Bayar</label>
                                        <input type="date" class="form-control" name="tanggal_bayar" placeholder="Masukkan NISN" value="<?php  //echo $inputs['nisn']; }
                                                                                                                                        ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nama Ujian</label>
                                        <input type="text" class="form-control" name="nama_ujian" placeholder="Masukkan Nama" value="<?php  ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Beban Pembayaran</label>
                                        <input type="text" class="form-control" name="beban_pembayaran" placeholder="Masukkan Beban Pembayaran" value="<?php  ?>">
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
                                <a href="<?php echo base_url('ujian'); ?>" class="btn btn-outline-info">Back</a>
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