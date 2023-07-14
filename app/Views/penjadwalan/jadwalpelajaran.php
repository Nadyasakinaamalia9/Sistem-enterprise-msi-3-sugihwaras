<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jadwal Pembelajaran</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Jadwal Pembelajaran</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($jadwal) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($jadwal as $jadwal) : ?>
                                            <?php if ($jadwal['status'] == 'verifikasi') : ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $jadwal['hari']; ?></td>
                                                    <td><?= $jadwal['jam']; ?></td>
                                                    <td><?= $jadwal['mata_pelajaran']; ?></td>
                                                    <td><?= $jadwal['nama_guru']; ?></td>
                                                    <td><?= $jadwal['status']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url('penjadwalan/tolak/' . $jadwal['id']); ?>" class="btn btn-danger btn-sm">Tolak</a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="7">Belum ada jadwal pembelajaran.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php echo view('_partials/footer'); ?>
