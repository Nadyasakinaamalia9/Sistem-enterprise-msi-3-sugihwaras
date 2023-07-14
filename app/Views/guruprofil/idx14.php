<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

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
            <li class="breadcrumb-item active">Data Guru</li>
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
            <div class="card-header">
              List Pegawai
              <a href="<?php echo base_url('guruprofil/create14'); ?>" class="btn btn-primary float-right">Tambah</a>
            </div>
            <div class="card-body">
              <?php
              if (!empty(session()->getFlashdata('success'))) { ?>
                <div class="alert alert-success">
                  <?php echo session()->getFlashdata('success'); ?>
                </div>
              <?php } ?>

              <?php if (!empty(session()->getFlashdata('info'))) { ?>
                <div class="alert alert-info">
                  <?php echo session()->getFlashdata('info'); ?>
                </div>
              <?php } ?>

              <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                <div class="alert alert-warning">
                  <?php echo session()->getFlashdata('warning'); ?>
                </div>
              <?php } ?>

              <!-- <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Cari Disini');
                    $form_keyword = [
                      'type'  => 'text',
                      'name'  => 'keyword',
                      'id'    => 'keyword',
                      'value' => $keyword,
                      'class' => 'form-control',
                      'placeholder' => 'Silahkan Cari'
                    ];
                    echo form_input($form_keyword);
                    ?>
                  </div>
                </div>
              </div> -->

              <div class="table-responsive">
                <table class="table table-bordered table-hovered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <!-- <th>NIK</th> -->
                      <th>ID Pegawai</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Jenis Kelamin</th>
                      <!-- <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th> -->
                      <!-- <th>Agama</th>
                                            <th>Masuk Tahun</th> -->
                      <th>SK Guru</th>
                      <th>Jabatan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $nomor = 0;
                    foreach ($dosen0072 as $key => $row) { ?>
                      <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $row['nip']; ?></td>
                        <!-- <td><?php echo $row['nik']; ?></td> -->
                        <td><?php echo $row['id_pegawai']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['jenis_kel']; ?></td>
                        <!-- <td><?php echo $row['tempat_lhr']; ?></td>
                                            <td><?php echo $row['tgl_lahir']; ?></td>
                                            <td><?php echo $row['agama']; ?></td>
                                            <td><?php echo $row['masuk_thn']; ?></td> -->
                        <td><?php echo $row['sk_guru']; ?></td>
                        <td><?php echo $row['jabatan']; ?></td>

                        <td>
                          <div class="btn-group">
                            <a href="<?php echo base_url('dataguru/show3/' . $row['id_pegawai']); ?>" class="btn btn-sm btn-primary">
                              <i class="fa fa-eye"></i>
                            </a>
                            <a href="<?php echo base_url('dataguru/edit3/' . $row['id_pegawai']); ?>" class="btn btn-sm btn-success">
                              <i class="fa fa-edit"></i>
                            </a>
                            <a href="<?php echo base_url('dataguru/delete3/' . $row['id_pegawai']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Pendaftar ini?');">
                              <i class="fa fa-trash-alt"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="row mt-3 float-right">
                <div class="col-md-12">
                  <!-- <?php echo $pager->links('dataguru', 'bootstrap_pagination') ?> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo view('_partials/footer'); ?>