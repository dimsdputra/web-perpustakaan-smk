<?php
session_start();
require 'koneksi.php';

$kode_buku = $_GET["kode_buku"];
$judul = ambil_data("SELECT * FROM buku WHERE kode_buku = $kode_buku")[0]["judul"];

if(hapusBuku($kode_buku) > 0) {
   $_SESSION["message_success"] = "Data buku ". $judul ." berhasil dihapus";
   header("Location: daftar_buku.php");
}
?>