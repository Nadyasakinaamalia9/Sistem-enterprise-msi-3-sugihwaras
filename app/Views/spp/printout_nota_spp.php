<!DOCTYPE html>
<html>

<head>
    <title>Printout Nota SPP</title>
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
    <?php if ($spp) : ?>
        <div class="print-section">
            <div class="kop">
                <img src="<?php echo base_url('themes/dist'); ?>/img/msi.png" alt="AdminLTE Logo">

                <h1>MSI 3 Sugihwaras</h1> <!-- Ganti dengan nama sekolah -->
            </div>

            <h2>Pembayaran SPP</h2>

            <table>
                <?php foreach ($spp as $dt) : ?>
                    <tr>

                        <td>NIS:</td>
                        <td><?php echo isset($dt->nis) ? $dt->nis : ''; ?></td>

                    <tr>
                        <td>Tanggal Bayar:</td>
                        <td><?php echo isset($dt->tanggal_bayar) ? $dt->tanggal_bayar : ''; ?></td>
                    </tr>
                    <tr>
                        <td>Bulan:</td>
                        <td><?php echo isset($dt->bulan) ? $dt->bulan : ''; ?></td>
                    </tr>
                    <tr>
                        <td>Beban Pembayaran:</td>
                        <td><?php echo isset($dt->beban_pembayaran) ? $dt->beban_pembayaran : ''; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>

    <!-- Tambahkan tombol cetak -->
    <button onclick="window.print()">Cetak</button>
</body>

</html>