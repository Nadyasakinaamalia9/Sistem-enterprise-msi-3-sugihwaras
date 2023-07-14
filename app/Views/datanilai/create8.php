<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">D A T A - N I L A I</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Data Nilai</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('datanilai/store8'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $errors = session()->getFlashdata('errors');
                                $error = session()->getFlashdata('error');

                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Whoops! Ada kesalahan saat input data, yaitu:
                                        <ul>
                                            <?php foreach ($errors as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php } elseif (!empty($error)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= esc($error) ?>
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
                                        <label for="">B.Indonesia</label>
                                        <input type="text" class="form-control" name="bhs_indonesia" placeholder="Masukkan Nilai B.Indonesia" value="<?php  //echo $inputs['bhs_indonesia']; }
                                                                                                                                                        ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">B.Inggris</label>
                                        <input type="text" class="form-control" name="bhs_inggris" placeholder="Masukkan Nilai B.Inggris" value="<?php  ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Matematika</label>
                                        <input type="text" class="form-control" name="matematika" placeholder="Masukkan Nilai Matematika" value="<?php  ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">IPA</label>
                                        <input type="text" class="form-control" name="ipa" placeholder="Masukkan Nilai IPA" value="<?php  ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">IPS</label>
                                        <input type="text" class="form-control" name="ips" placeholder="Masukkan Nilai IPs" value="<?php  ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Agama</label>
                                        <input type="text" class="form-control" name="agama" placeholder="Masukkan Nilai Agama" value="<?php  ?>">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-outline-info">Back</a>
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