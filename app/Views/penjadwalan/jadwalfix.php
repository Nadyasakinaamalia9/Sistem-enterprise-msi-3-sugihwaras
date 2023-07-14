<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Jadwal Pelajaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Jadwal Pelajaran</li>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            // Define the desired order of days
                            $order = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

                            // Sort the $jadwalfix array by day
                            usort($jadwalfix, function ($a, $b) use ($order) {
                                $dayA = array_search($a['hari'], $order);
                                $dayB = array_search($b['hari'], $order);
                                return $dayA - $dayB;
                            });

                            foreach ($jadwalfix as $j) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $j['id_pegawai']; ?></td>
                                    <td><?php echo $j['hari']; ?></td>
                                    <td><?php echo $j['waktu_mulai']; ?></td>
                                    <td><?php echo $j['waktu_selesai']; ?></td>
                                    <td><?php echo $j['mapel']; ?></td>
                                    <td><?php echo $j['kelas']; ?></td>
                                    <td><?php echo $j['tahun_ajaran']; ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>