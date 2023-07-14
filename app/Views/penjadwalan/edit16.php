<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Penjadwalan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Penjadwalan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('penjadwalan/update16'); ?>" method="post">
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

                                <input type="hidden" name="id" value="<?php echo $penjadwalan['id']; ?>">
                                <div class="form-group">
                                    <label for="">ID Pegawai</label>
                                    <input type="text   " value="<?php echo $penjadwalan['id_pegawai']; ?>" class="form-control" name="id_pegawai" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Hari</label>
                                    <select name="hari" id="" class="form-control">
                                        <option value="">Pilih Hari</option>
                                        <option value="senin" <?php echo $penjadwalan['hari'] == "senin" ? 'selected' : '' ?>>Senin</option>
                                        <option value="selasa" <?php echo $penjadwalan['hari'] == "selasa" ? 'selected' : '' ?>>Selasa</option>
                                        <option value="rabu" <?php echo $penjadwalan['hari'] == "rabu" ? 'selected' : '' ?>>Rabu</option>
                                        <option value="kamis" <?php echo $penjadwalan['hari'] == "kamis" ? 'selected' : '' ?>>Kamis</option>
                                        <option value="sabtu" <?php echo $penjadwalan['hari'] == "sabtu" ? 'selected' : '' ?>>Sabtu</option>
                                        <option value="minggu" <?php echo $penjadwalan['hari'] == "minggu" ? 'selected' : '' ?>>Minggu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Waktu Mulai</label>
                                    <input type="time" value="<?php echo $penjadwalan['waktu_mulai']; ?>" class="form-control" name="waktu_mulai" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Waktu Selesai</label>
                                    <input type="time" value="<?php echo $penjadwalan['waktu_selesai']; ?>" class="form-control" name="waktu_selesai" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Mata Pelajaran</label>
                                    <select name="mapel" id="" class="form-control">
                                        <option value="">Pilih mapel</option>
                                        <option value="bhs_indonesia" <?php echo $penjadwalan['mapel'] == "bhs_indonesia" ? 'selected' : '' ?>>bhs_indonesia</option>
                                        <option value="bhs_inggris" <?php echo $penjadwalan['mapel'] == "bhs_inggris" ? 'selected' : '' ?>>bhs_inggris</option>
                                        <option value="matematika" <?php echo $penjadwalan['mapel'] == "matematika" ? 'selected' : '' ?>>matematika</option>
                                        <option value="ipa" <?php echo $penjadwalan['mapel'] == "ipa" ? 'selected' : '' ?>>ipa</option>
                                        <option value="ips" <?php echo $penjadwalan['mapel'] == "ips" ? 'selected' : '' ?>>ips</option>
                                        <option value="agama" <?php echo $penjadwalan['mapel'] == "agama" ? 'selected' : '' ?>>agama</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('penjadwalan'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>