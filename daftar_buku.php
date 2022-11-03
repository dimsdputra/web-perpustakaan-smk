<?php
session_start();
require 'koneksi.php';

$jumlahDataPerHalaman = 10;
$jumlahData = count(ambil_data("SELECT * FROM buku;"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"]) ? $_GET["halaman"] : 1);
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

//Ambil data buku
$buku = ambil_data("SELECT * FROM buku LIMIT $awalData, $jumlahDataPerHalaman");

if (isset($_POST["cari"])) {
    $buku = cari($_POST["keyword"], "buku");
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
        <div class="col-2 p-0"><?php include("navbar.php"); ?></div>
        <div class="content col-10 p-0">
            <div class="bg-secondary">
                <div class="container pt-2 pb-2 pe-5 ps-5 text-light">
                    <h1 class="m-0">Daftar Buku</h1>
                </div>
            </div>
            <div class="container ps-5 pe-5 pt-2 pb-2">
                <div class="mt-2">
                    <button type="button" class="btn" style="background-color: #00ADB5;"><a class="text-decoration-none d-block text-white" aria-current="page" href="tambah_buku.php">Tambah Data Buku</a></button>
                    <?php if (isset($_SESSION["message_success"])) : ?>
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            <?php echo $_SESSION["message_success"]; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif (isset($_SESSION["message_fail"])) : ?>
                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            <?php echo $_SESSION["message_fail"]; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        endif;
                        unset($_SESSION["message_success"]);
                        unset($_SESSION["message_fail"]);
                    ?>
                    
                    <ul class="pagination mt-4">
                        <li class="page-item">
                            <?php if ($halamanAktif > 1) : ?>
                                <a href="?halaman=<?= $halamanAktif - 1 ?>" class="page-link">&lt;</a>
                            <?php endif; ?>
                        </li>

                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                            <?php if ($i == $halamanAktif) : ?>
                                <li class="page-item">
                                    <a href="?halaman=<?= $i ?>" class="page-link text-primary"><?= $i ?></a>
                                </li>
                            <?php else : ?>
                                <li class="page-item">
                                    <a href="?halaman=<?= $i ?>" class="page-link text-secondary"><?= $i ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <li class="page-item">
                            <?php if ($halamanAktif < $jumlahHalaman) : ?>
                                <a href="?halaman=<?= $halamanAktif + 1 ?>" class="page-link">&gt;</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
                <div class="mt-2">
                    <form action="" method="post" class="d-flex">
                        <input type="text" name="keyword" placeholder="Cari..." autocomplete="off" class="form-control w-25 me-3" id="keyword">
                        <button type="submit" name="cari" class="btn btn-primary" id="tombol-cari">Cari</button>
                    </form>
                </div>
            </div>
            <div class="container ps-5 pe-5 pt-2 pb-2">
                <div class="card">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col" class="table-secondary">Kode Buku</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($buku as $data_buku) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td class="table-secondary"><?= $data_buku["kode_buku"]; ?></td>
                                <td><?= $data_buku["judul"]; ?></td>
                                <td><?= $data_buku["penulis"]; ?></td>
                                <td><?= $data_buku["tahun_terbit"]; ?></td>
                                <td><?= $data_buku["penerbit"]; ?></td>
                                <td class="d-flex gap-2">
                                    <a href="edit_buku.php?kode_buku=<?= $data_buku["kode_buku"] ?>" class="btn btn-warning text-decoration-none d-block text-white">Edit</a>
                                    <a href="hapus_buku.php?kode_buku=<?= $data_buku["kode_buku"] ?>" class="btn btn-danger text-decoration-none d-block text-white">Delete</a>
                                </td>
                            </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>