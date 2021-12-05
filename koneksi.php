<?php
$host = "localhost"; //host database
$username = "root"; //username database
$database = "uts_prg3"; //database 
$password = ""; //password database

$koneksi =  mysqli_connect($host, $username, $password, $database); //membuat koneksi ke server mysqli

if ($koneksi->connect_error) {
    die("koneksi ke database gagal!");
} else {
    echo "<b>koneksi ke database berhasil</b>";
}
