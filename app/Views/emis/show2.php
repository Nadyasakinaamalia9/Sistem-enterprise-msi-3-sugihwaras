<?php echo view("_partials/header"); ?>
<?php echo view("_partials/sidebar"); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Show Data Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">home</a></li>
                        <li class="breadcrumb-item active">Show Data Siswa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?php echo base_url('../uploads/' . $emis['foto']) ?>" class="img-thumbnail" width="2000" height="2000">
                                </div>

                                <div class="col-md-12">
                                    <dl class="dl-horizontal">
                                        <dt>NIS</dt>
                                        <dd><?php echo $emis['nis']; ?></dd>
                                        <dt>NISN</dt>
                                        <dd><?php echo $emis['nisn']; ?></dd>
                                        <dt>Nama Siswa</dt>
                                        <dd><?php echo $emis['nama']; ?></dd>
                                        <dt>Alamat</dt>
                                        <dd><?php echo $emis['alamat']; ?></dd>
                                        <dt>Jenis Kelamin</dt>
                                        <dd><?php echo $emis['jenis_kel']; ?></dd>
                                        <dt>Tempat Lahir</dt>
                                        <dd><?php echo $emis['tempat_lhr']; ?></dd>
                                        <dt>Tanggal Lahir</dt>
                                        <dd><?php echo $emis['tgl_lahir']; ?></dd>
                                        <dt>Agama</dt>
                                        <dd><?php echo $emis['agama']; ?></dd>
                                        <dt>Tinggi Badan</dt>
                                        <dd><?php echo $emis['tinggi_bdn']; ?></dd>
                                        <dt>Berat Badan</dt>
                                        <dd><?php echo $emis['berat_bdn']; ?></dd>
                                        <dt>Riwayat Penyakit</dt>
                                        <dd><?php echo $emis['riwayat_pnykt']; ?></dd>
                                        <dt>Nama Ayah</dt>
                                        <dd><?php echo $emis['nama_ayah']; ?></dd>
                                        <dt>Nama Ibu</dt>
                                        <dd><?php echo $emis['nama_ibu']; ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url('Emis'); ?>" class="btn btn-outline-info float-right">back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo view('_partials/footer'); ?>