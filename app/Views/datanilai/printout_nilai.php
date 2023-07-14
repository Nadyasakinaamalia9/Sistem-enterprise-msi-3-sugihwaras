<!DOCTYPE html>
<html>

<head>
    <title>Printout Hasil Akhir</title>
    <!-- Tambahkan CSS khusus untuk tampilan cetak -->
    <style>
        /* Atur tampilan cetak */
        @media print {

            /* Semua elemen kecuali tombol cetak akan disembunyikan saat mencetak */
            body * {
                visibility: hidden;
            }

            .print-section,
            .print-section * {
                visibility: visible;
            }

            .print-section {
                position: absolute;
                left: 0;
                top: 0;
            }

            /* Tampilan untuk kop */
            .kop {
                text-align: center;
                margin-bottom: 20px;
            }

            .kop img {
                width: 100px;
                /* Sesuaikan ukuran logo */
                height: auto;
            }
        }
    </style>
</head>

<body>
    <?php if ($pengajuanhasil) : ?>
        <div class="print-section">
            <div class="kop">
                <img src="<?php echo base_url('themes/dist'); ?>/img/msi.png" alt="AdminLTE Logo">

                <h1>MSI 3 Sugihwaras</h1> <!-- Ganti dengan nama sekolah -->
            </div>

            <h2>Nilai Akhir</h2>

            <table>
                <?php foreach ($pengajuanhasil as $dt) : ?>
                    <tr>

                        <td>NIS:</td>
                        <td><?php echo isset($dt->nis) ? $dt->nis : ''; ?></td>

                    <tr>
                        <td>Bahasa Indonesia:</td>
                        <td><?php echo isset($dt->bhs_indonesia) ? $dt->bhs_indonesia : ''; ?></td>
                    </tr>

                    <tr>
                        <td>Bahasa Inggris:</td>
                        <td><?php echo isset($dt->bhs_inggris) ? $dt->bhs_inggris : ''; ?></td>
                    </tr>

                    <tr>
                        <td>IPA:</td>
                        <td><?php echo isset($dt->ipa) ? $dt->ipa : ''; ?></td>
                    </tr>

                    <tr>
                        <td>IPS:</td>
                        <td><?php echo isset($dt->ips) ? $dt->ips : ''; ?></td>
                    </tr>

                    <tr>
                        <td>Matematika:</td>
                        <td><?php echo isset($dt->matematika) ? $dt->matematika : ''; ?></td>
                    </tr>

                    <tr>
                        <td>Agama:</td>
                        <td><?php echo isset($dt->agama) ? $dt->agama : ''; ?></td>
                    </tr>

                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>

    <!-- Tambahkan tombol cetak -->
    <button onclick="window.print()">Cetak</button>
</body>

</html>