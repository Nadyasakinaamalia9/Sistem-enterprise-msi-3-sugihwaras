<?php

header("Content-type: application/vnc-ms-excel");
header("Content-Disposition: attachment; filename=Data Spp.xls");


?>

<html>

<body>
    <table width="100%">
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
                    <td scope="row" style="text-align: left;"><?= $i++; ?></td>
                    <td style="text-align: left;"><?= $dt->nis; ?></td>
                    <td style=" text-align: left;"><?= $dt->tanggal_bayar; ?></td>
                    <td style="text-align: left;"><?= $dt->bulan; ?></td>
                    <td style=" text-align: left;"><?= $dt->beban_pembayaran; ?></td>
                    <td style=" text-align: left;"><?= $dt->id_pegawai; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>