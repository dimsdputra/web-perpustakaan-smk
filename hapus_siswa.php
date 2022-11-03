<?php
session_start();
require 'koneksi.php';

$id = $_GET["id"];
$nama = ambil_data("SELECT * FROM siswa WHERE id = $id")[0]["nama"];

if(hapusSiswa($id) > 0) {
   $_SESSION["message_success"] = "Data siswa ". $nama ." berhasil dihapus";
   header("Location: daftar_siswa.php");
}
?>