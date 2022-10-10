<?php

//Jangan Ubah Yang Ini Ya Gaes, Masih Diperbaiki

session_start();
require 'koneksi.php';

//Ambil data Admin
$id = $_GET["id"];

$user = ambil_data("SELECT * FROM user WHERE id = $id")[0];
// var_dump($user);
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
                    <h1 class="m-0">Data Admin</h1>
                </div>
            </div>
            <div class="container ps-5 pe-5 pt-2 pb-2">
                <div class="mt-2">
                    <?php foreach ($admin as $data_admin) : ?>
                        <tr>
                            <td class="table-secondary"><?= $data_admin["id"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <button type="button" class="btn" style="background-color: #00ADB5;"><a class="text-decoration-none d-block text-white" aria-current="page" href="registrasi.php">Tambah Admin</a></button>
                    <?php
                    if (isset($_SESSION['registrasi'])) :
                    ?>
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            <?php echo $_SESSION['registrasi']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION["registrasi"]);
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
