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
                    <!-- Tampilan daftar jadwal yang perlu diverifikasi oleh tata usaha -->
                    <h2>Daftar Jadwal Perlu Verifikasi</h2>

                    <?php if (session()->getFlashdata('success')) { ?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                    <?php } ?>

                    <?php if (session()->getFlashdata('warning')) { ?>
                        <div class="alert alert-warning">
                            <?php echo session()->getFlashdata('warning'); ?>
                        </div>
                    <?php } ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Guru</th>
                                <th>Hari</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th>Tahun Ajaran</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>

                            <!-- Loop melalui jadwal -->
                            <?php $no = 1;
                            foreach ($jadwal as $item) : ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $item['id_pegawai']; ?></td>
                                    <td><?php echo $item['hari']; ?></td>
                                    <td><?php echo $item['waktu_mulai']; ?></td>
                                    <td><?php echo $item['waktu_selesai']; ?></td>
                                    <td><?php echo $item['mapel']; ?></td>
                                    <td><?php echo $item['kelas']; ?></td>
                                    <td><?php echo $item['tahun_ajaran']; ?></td>

                                    <td>


                                        <?php if ($item['status'] == 'verifikasi') : ?>
                                            <span class="badge badge-success">Diverifikasi</span>
                                        <?php elseif ($item['status'] == 'tolak') : ?>
                                            <span class="badge badge-danger">Ditolak</span>
                                        <?php elseif ($item['status'] == 'tunggu') : ?>
                                            <span class="badge badge-secondary">Tunggu</span>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                    </table>


                </div>
            </div>
        </div>
        <div class="row mt-3 float-right">

        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>