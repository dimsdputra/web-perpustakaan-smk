<?php
session_start();

require 'koneksi.php';

$id = $_GET["id"];

//Hapus Siswa
if (hapusSiswa($id) > 0) {
    $_SESSION['berhasil'] = "Data Siswa Berhasil Dihapus";
    header("Location: daftar_siswa.php");
}


