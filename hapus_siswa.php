<?php
session_start();
require 'koneksi.php';

if(hapusSiswa($_GET["id"]) > 0) {
   $_SESSION["siswa_message"] = "Data berhasil dihapus";
   header("Location: daftar_siswa.php");
}
?>