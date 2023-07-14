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
                    <?php if (session()->getFlashdata('success')) { ?>
                        <h2>Daftar Jadwal Perlu Verifikasi</h2>
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
                            <?php if (!empty($jadwal)) {
                                $no = 1;
                                foreach ($jadwal as $j) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $j['id_pegawai']; ?></td>
                                        <td><?php echo $j['hari']; ?></td>
                                        <td><?php echo $j['waktu_mulai']; ?></td>
                                        <td><?php echo $j['waktu_selesai']; ?></td>
                                        <td><?php
                                            if ($j['mapel'] == "matematika")
                                                echo "Matematika";
                                            elseif ($j['mapel'] == "bhs_indonesia")
                                                echo "Bahasa Indonesia";
                                            elseif ($j['mapel'] == "bhs_inggris")
                                                echo "Bahasa Inggris";
                                            elseif ($j['mapel'] == "ipa")
                                                echo "Ilmu Pengetahuan Alam";
                                            elseif ($j['mapel'] == "ips")
                                                echo "Ilmu Pengetahuan Sosial";
                                            elseif ($j['mapel'] == "agama")
                                                echo "Pendidikan Agama Islam";
                                            ?></td>
                                        <td><?php echo $j['kelas']; ?></td>
                                        <td><?php echo $j['tahun_ajaran']; ?></td>

                                        <td>
                                            <?php if ($j['status'] == 'tunggu') : ?>
                                                <a href="<?php echo base_url('penjadwalan/verifikasi/' . $j['id']); ?>" class="btn btn-sm btn-primary">Verifikasi</a>
                                                <a href="<?php echo base_url('penjadwalan/tolak/' . $j['id']); ?>" class="btn btn-danger">Tolak</a>
                                            <?php elseif ($j['status'] == 'verifikasi') : ?>
                                                <span class="badge badge-success">Diverifikasi</span>
                                            <?php elseif ($j['status'] == 'tolak') : ?>
                                                <span class="badge badge-danger">Ditolak</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="7">Belum ada jadwal perlu verifikasi.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                </div>

            </div>
            <div class="row mt-3 float-right">
                <div class="col-md-12">
                    <?php echo $pager->links('penjadwalan', 'bootstrap_pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>