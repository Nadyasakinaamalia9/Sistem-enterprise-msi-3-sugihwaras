<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Penjadwalan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Penjadwalan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Form untuk input jadwal mengajar -->
                    <form method="post" action="<?php echo base_url('penjadwalan/store16'); ?>">
                        <div class="card">
                            <div class="card-body">
                                <?php if (session()->getFlashdata('errors')) { ?>
                                    <div class="alert alert-danger">
                                        <?php echo implode('<br>', session()->getFlashdata('errors')); ?>
                                    </div>
                                <?php } ?>

                                <div class="col-md-6">
                                    <label for="">ID Pegawai</label>
                                    <select name="id_pegawai" id="" class="form-control">
                                        <option value="">Pilih ID Pegawai</option>
                                        <?php foreach ($guru as $ambildata) : ?>
                                            <option value="<?= $ambildata['id_pegawai'] ?>"><?= $ambildata['id_pegawai'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="">Hari</label>
                                    <select name="hari" id="" class="form-control">
                                        <option <?php //echo $inputs['status_dosen'] == "Tetap" ? "selected" : ""; 
                                                ?> value="Senin">Senin</option>
                                        <option <?php //echo $inputs['jenis_kelamin'] == "Laki-Laki" ? "selected" : ""; 
                                                ?> value="Selasa">Selasa</option>
                                        <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                ?> value="Rabu">Rabu</option>
                                        <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                ?> value="Kamis">Kamis</option>
                                        <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                ?> value="Sabtu">Sabtu</option>
                                        <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                ?> value="Minggu">Minggu</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="waktu_mulai">Waktu Mulai</label>
                                    <input type="time" name="waktu_mulai" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="waktu_selesai">Waktu Selesai</label>
                                    <input type="time" name="waktu_selesai" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="">Mata Pelajaran</label>
                                    <select name="mapel" id="" class="form-control">
                                        <option <?php //echo $inputs['status_dosen'] == "Tetap" ? "selected" : ""; 
                                                ?> value="bhs_indonesia">Bhs. Indonesia</option>
                                        <option <?php //echo $inputs['jenis_kelamin'] == "Laki-Laki" ? "selected" : ""; 
                                                ?> value="bhs_inggris">Bhs. Inggris</option>
                                        <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                ?> value="matematika">Matematika</option>
                                        <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                ?> value="ipa">Ipa</option>
                                        <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                ?> value="ips">Ips</option>
                                        <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                ?> value="agama">Agama</option>
                                    </select>
                                </div>

                                <!-- Dropdown untuk memilih kelas -->
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select name="kelas" class="form-control">
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($kelas as $kelas_item) : ?>
                                            <option value="<?php echo $kelas_item['kelas']; ?>"><?php echo $kelas_item['kelas']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Dropdown untuk memilih tahun ajaran -->
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
                            <div class="card-footer">
                                <!-- <a href="<php echo base_url('penjadwalan/view/'); ?>" class="btn btn-primary float-right">Tambah</a> -->
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