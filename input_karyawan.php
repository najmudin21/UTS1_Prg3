<?php
include("koneksi.php");
$query_view = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");

if (isset($_POST['save'])) {
    $karyawan = $_POST['karyawan'];
    $jenis_cuti = $_POST['jenis_cuti'];
    $keterangan = $_POST['keterangan'];
    $from_date = $_POST['from_date'];
    $last_date = $_POST['last_date'];

    $status_query = mysqli_query($koneksi, "SELECT cuti_status FROM tb_karyawan WHERE id =' . $karyawan . '");
    $status_cuti = mysqli_fetch_array($status_query);

    if ((int)$status_query == 1) {
        $query_input = mysqli_query($koneksi, "insert into tb_cuti(id_karyawan,jenis_cuti,keterangan,from_date,last_date)
        values('$karyawan', '$jenis_cuti', '$keterangan', '$from_date', '$last_date')");

        if ($query_input) {
            // $change_status = mysqli_query($koneksi, "update tb_karyawan set cuti_status=0 WHERE id=" . $karyawan);
            header('location:input_karyawan.php?pesan=success');
        } else {
            echo mysqli_error($koneksi);
        }
    } else {
        header('location:input_karyawan.php?pesan=failed');
    }
}

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "success") {
        echo "<script>alert('data sudah tersimpan!')</script>";
    }
    if ($_GET['pesan'] == "failed") {
        echo "<script>alert('tidak ada jatah cuti!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Karyawan</title>
</head>
<style>
    .btn-primary:hover {
        background-color: aqua;
    }
</style>

<body>
    <p>
    <h1>Form pengajuan cuti karyawan</h1>
    </p>

    <form action="" method="post">
        <table>
            <tr>
                <td>Pilih Karyawan</td>
                <td><select class="form-control" name="karyawan">
                        <option disabled selected>-- Pilih Karyawan --</option>
                        <?php $no = 1;
                        while ($karyaone = mysqli_fetch_array($query_view)) { ?>
                            <option value="<?php echo $karyaone['id'];  ?>"><?= $karyaone['nama']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Jenis cuti yang diambil</label></td>
                <div class="form-group">
                    <td><select class="form-control" name="jenis_cuti">
                            <option disabled selected>-- Pilih jenis cuti --</option>
                            <option value="Cuti Tahunan">Cuti Tahunan</option>
                            <option value="Cuti Besar">Cuti Besar</option>
                            <option value="Cuti Sakit">Cuti Sakit</option>
                            <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                            <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
                            <option value="Cuti diluar Tanggungan Negara">Cuti diluar Tanggungan Negara</option>
                        </select></td>
                </div>
            </tr>
            <tr>
                <td>dari tanggal</td>
                <td><input type="date" name="from_date">
                    <label for="">Sampai dengan</label>
                    <input type="date" required class="form-control" name="last_date">
                </td>
            </tr>
            <td>Keterangan</td>
            <td><textarea class="form-control" placeholder="masukan keterangan cuti anda" name="keterangan"></textarea></td>
            <tr>
                <td><input class="btn btn-primary" type="submit" name="save" value="save"></td>
            </tr>
            <td><a class="btn btn-danger" href="tampil_karyawan.php" role="button">menampilkan data</a>
            </td>
            </tr>
        </table>
    </form>
</body>

</html>