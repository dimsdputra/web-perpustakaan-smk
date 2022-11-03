<?php
session_start();
require 'koneksi.php';

$limit = ambil_data("SELECT COUNT(id) AS 'limit' FROM admin")[0];

if ($limit["limit"] == 10) {
    $_SESSION["admin_message"] = "Admin gagal di tambahkan, batas 10 Admin";
    header("Location: daftar_admin.php");
}

if (isset($_POST["submit"])) {
    if (tambahAdmin($_POST) > 0) {
        $_SESSION["admin_message"] = "Admin berhasil ditambahkan";
    } else {
        $_SESSION["admin_message"] = "Admin gagal ditambahkan";
    }
    header("Location: daftar_admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="main-container row">
        <div class="col-2 p-0"><?php include("navbar.php") ?></div>
        <div class="content col-10 p-0">
            <div class="bg-secondary">
                <div class="container pt-2 pb-2 pe-5 ps-5 text-light">
                    <h1 class="">Tambah Admin</h1>
                </div>
            </div>
            <div class="container pt-2 pb-2 pe-5 ps-5">
                <div class="mt-2">
                    <form action="" method="post">
                        <div class="card p-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Bagus Adrian" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="bagus2234" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="In here..." required>
                            </div>
                            <div class="mb-3">
                                <label for="konfir_password" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="konfir_password" id="konfir_password" class="form-control" placeholder="In here..." required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn text-light" style="background-color: #00ADB5;">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>