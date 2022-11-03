<?php

session_start();
require("koneksi.php");

$count = ambil_data("SELECT COUNT(id) AS 'count' FROM admin")[0]; 

if ($count["count"] == 1) {
   $_SESSION["message_warning"] = "Gagal menghapus Admin, Jumlah minimal 1 Admin";
} else {
   if (hapusAdmin($_GET["id"]) > 0) {
      $_SESSION["message_success"] = "Berhasil menghapus Admin";
   } else {
      $_SESSION["admin_message"] = "Gagal menghapus Admin";
   }
}

header("Location: daftar_admin.php");

?>