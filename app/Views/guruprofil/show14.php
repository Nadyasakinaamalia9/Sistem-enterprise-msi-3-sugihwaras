<?php echo view("_partials/header"); ?>
<?php echo view("_partials/sidebar"); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Pegawai</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Pegawai</li>
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
                  <img src="<?php echo base_url('../uploads/' . $dataguru['foto']) ?>" class="img-fluid" width="200" height="200">

                </div>
                <div class="col-md-8">
                  <dl class="dl-horizontal">
                    <dt>Nama</dt>
                    <dd><?php echo $dataguru['nama']; ?></dd>
                    <dt>NIP</dt>
                    <dd><?php echo $dataguru['nip']; ?></dd>
                    <dt>NIK</dt>
                    <dd><?php echo $dataguru['nik']; ?></dd>
                    <dt>ID Pegawai</dt>
                    <dd><?php echo $dataguru['id_pegawai']; ?></dd>
                    <dt>Alamat</dt>
                    <dd><?php echo $dataguru['alamat']; ?></dd>
                    <dt>Jenis Kelamin</dt>
                    <dd><?php echo $dataguru['jenis_kel']; ?></dd>
                    <dt>Tempat Lahir</dt>
                    <dd><?php echo $dataguru['tempat_lhr']; ?></dd>
                    <dt>Tanggal Lahir</dt>
                    <dd><?php echo $dataguru['tgl_lahir']; ?></dd>
                    <dt>Agama</dt>
                    <dd><?php echo $dataguru['agama']; ?></dd>
                    <dt>Tahun Masuk</dt>
                    <dd><?php echo $dataguru['masuk_thn']; ?></dd>
                    <dt>SK Guru</dt>
                    <dd><?php echo $dataguru['sk_guru']; ?></dd>

                  </dl>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-outline-info float-right">back</a>

            </div>
          </div>


        </div>
      </div>
    </div>
  </div>

</div>
</div>
<?php echo view('_partials/footer'); ?>