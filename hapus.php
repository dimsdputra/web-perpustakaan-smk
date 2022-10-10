<?php
session_start();

require 'koneksi.php';

$id = $_GET["id"];

if (hapusSiswa($id) > 0) {
    $_SESSION['berhasil'] = "Data Siswa Berhasil Dihapus";
    header("Location: daftar_siswa.php");
}

if (hapusBuku($id) > 0) {
    $_SESSION['berhasil'] = "Data Buku Berhasil Dihapus";
    header("Location: buku.php");
}