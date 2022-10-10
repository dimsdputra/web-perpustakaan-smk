<?php
session_start();

require 'koneksi.php';

if (isset($_POST["submit"])) {
    if (tambahPeminjamanBuku($_POST) > 0) {
        $_SESSION['berhasil'] = "Data Berhasil Ditambahkan";
        header("Location: daftar_peminjaman_buku.php");
    }
}

//Ambil data siswa
$siswa = ambil_data("SELECT * FROM siswa");

//Ambil data buku
$buku = ambil_data("SELECT * FROM buku");
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
                    <h1 class="">Tambah Data Peminjaman Buku</h1>
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
                                <label for="kode_buku" class="form-label">Nama Peminjam</label>
                                <select class="form-select" aria-label="Default select example" id="peminjam" name="peminjam" required>
									<option disabled selected>Pilih Data</option>
                                    <?php foreach ($siswa as $data_siswa) : ?>
									<option value=<?= $data_siswa["id"]; ?>><?= $data_siswa["nama"]; ?></option>
                                    <?php endforeach; ?>
								</select>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Buku</label>
                                <select class="form-select" aria-label="Default select example" id="judul_buku" name="judul_buku" required>
									<option disabled selected>Pilih Data</option>
									<?php foreach ($buku as $data_buku) : ?>
									<option value=<?= $data_buku["kode_buku"]; ?>><?= $data_buku["judul"]; ?></option>
                                    <?php endforeach; ?>
								</select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                            </div>
                            <div class="mb-3">
                                <label for="status_peminjaman" class="form-label">Status Peminjaman</label>
                                <select class="form-select" aria-label="Default select example" id="status_peminjaman" name="status_peminjaman" required>
									<option disabled selected>Pilih Status Peminjaman</option>
									<option value="Dipinjam">Dipinjam</option>
									<option value="Dikembalikan">Dikembalikan</option>
								</select>
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