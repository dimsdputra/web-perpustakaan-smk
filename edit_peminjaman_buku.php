<?php
session_start();
require "koneksi.php";

if (editPeminjaman($_GET["id"]) > 0) {
   $_SESSION["berhasil"] = "Data berhasil diubah";
   header("Location: daftar_peminjaman_buku.php");
}

?>