<?php
include("koneksi.php");
$query_view = mysqli_query($koneksi, "SELECT tb_karyawan.NIK,nama,jabatan,bagian, tb_cuti.jenis_cuti, tb_cuti.from_date, tb_cuti.id_karyawan,last_date, tb_cuti.keterangan FROM tb_karyawan INNER JOIN tb_cuti ON tb_karyawan.id=tb_cuti.id_karyawan");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST CUTI KARYAWAN</title>
</head>

<body>
    <h1>
        <left>LIST CUTI KARYAWAN</left>
    </h1>
    <p>kembali ke halaman input:
        <a href="input_karyawan.php">kembali</a>
    </p>
</body>

<form method="POST" action="">
    <table width="" border="1" class="table table-white" border="1">
        <tr>
            <td align="center">id_karyawan</td>
            <td align="center">NIK</td>
            <td align="center">Nama Karyawan</td>
            <td>Jabatan</td>
            <td>bagian</td>
            <td>Jenis cuti yang diambil</td>
            <td>dari tanggal</td>
            <td>sampai tanggal</td>
            <td>keterangan</td>
        </tr>

        <?php
        $no = 1;
        while ($tampil = mysqli_fetch_array($query_view)) { ?>
            <tr>
                <td align="center"><?php echo $tampil['id_karyawan']; ?></td>
                <td><?php echo $tampil['NIK']; ?></td>
                <td><?php echo $tampil['nama']; ?></td>
                <td><?php echo $tampil['jabatan']; ?></td>
                <td><?php echo $tampil['bagian']; ?></td>
                <td><?php echo $tampil['jenis_cuti']; ?></td>
                <td><?php echo $tampil['from_date']; ?></td>
                <td><?php echo $tampil['last_date']; ?></td>
                <td><?php echo $tampil['keterangan']; ?></td>
            </tr>
        <?php } ?>
    </table>
</form>

</html>

<!-- <a href="input_karyawan.php">Logout</a> -->