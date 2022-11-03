<?php
session_start();
require 'koneksi.php';

$kode_buku = $_GET["kode_buku"];

$buku = ambil_data("SELECT * FROM buku WHERE kode_buku = $kode_buku")[0];

if(isset($_POST["submit"])) {
   if(editBuku($_POST) > 0) {
      $_SESSION["buku_message"] = "Data buku ". $buku["judul"] ." berhasil diedit";
      header("Location: daftar_buku.php");
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
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
                    <h1 class="">Edit Data Buku</h1>
                </div>
            </div>
            <div class="container pt-2 pb-2 pe-5 ps-5">
                <div class="mt-2">
                    <?php
                    if (isset($_SESSION['gagal'])) :
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            <?php echo $_SESSION['gagal']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION["gagal"]);
                    endif;
                    ?>
                    <form action="" method="post">
                        <div class="card p-3">
                            <div class="mb-3">
                                <label for="kode_buku" class="form-label">Kode Buku</label>
                                <input type="hidden" id="kode_buku" name="kode_buku" value="<?= $buku["kode_buku"] ?>">
                                <input type="number" class="form-control" value="<?= $buku["kode_buku"] ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="<?= $buku["judul"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $buku["penulis"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= $buku["tahun_terbit"] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku["penerbit"] ?>" required>
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