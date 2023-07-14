<html>

<body>
    <center>
        <h2 style="margin-top:50px;">
           SPP 2023
        </h2>
        <p style="margin-top:-10px;">
           SUMBANGAN PEMBINAAN PENDIDIKAN - MSI 3 Sugihwaras
        </p>
    </center>
    <table border="1" width="100%">
        <thead>
            <tr>
            <th scope="col">NO.</th>
                <th scope="col">NIS</th>
                <th scope="col">Tanggal Bayar</th>
                <th scope="col">Bulan</th>
                <th scope="col">Beban Bayar</th>
                <th scope="col">ID Pegawai</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
            <?php foreach ($spp as $dt) : ?>
                <tr>
                    <td scope="row" style="text-align: center;"><?= $i++; ?></td>
                    <td style="text-align: center;"><?= $dt->nis; ?></td>
                    <td style=" text-align: center;"><?= $dt->tanggal_bayar; ?></td>
                    <td style="text-align: center;"><?= $dt->bulan; ?></td>
                    <td style=" text-align: center;"><?= $dt->beban_pembayaran; ?></td>
                    <td style=" text-align: center;"><?= $dt->id_pegawai; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>