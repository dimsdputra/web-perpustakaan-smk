<?php
session_start();
require 'koneksi.php';

$id = $_GET["id"];

$siswa = ambil_data("SELECT * FROM siswa WHERE id = $id")[0];

if(isset($_POST["submit"])) {
   if(editSiswa($_POST) > 0) {
      $_SESSION["siswa_message"] = "Data siswa ". $siswa["nama"] ." berhasil diubah";
      header("Location: daftar_siswa.php");
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Siswa</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
	<div class="main-container row">
		<div class="col-2 p-0"><?php include("navbar.php") ?></div>
		<div class="col-10 p-0">
			<div class="bg-secondary">
				<div class="container pt-2 pb-2 pe-5 ps-5 text-light">
					<h1 class="">Edit Data Siswa</h1>
				</div>
			</div>
			<div class="container pt-2 pb-2 pe-5 ps-5">
				<div class="mt-2">
					<form action="" method="post">
						<div class="card p-3">
							<input type="hidden" name="id" value="<?= $siswa["id"] ?>">
							<div class="mb-3">
								<label for="NIS" class="form-label">NIS</label>
								<input type="text" class="form-control" id="NIS" name="NIS" value="<?= $siswa["NIS"] ?>" required>
							</div>
							<div class="mb-3">
								<label for="nama" class="form-label">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa["nama"] ?>" required>
							</div>
							<div class="mb-3">
								<label for="kelas" class="form-label">Kelas</label>
								<select class="form-select" aria-label="Default select example" id="kelas" name="kelas" required>
									<option value="<?= $siswa["kelas"] ?>" selected disabled><?= $siswa["kelas"] ?></option>
									<option value="X RPL">X RPL</option>
									<option value="XI RPL">XI RPL</option>
									<option value="XII RPL">XII RPL</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
								<select class="form-select" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin" required>
									<option value="<?= $siswa["jenis_kelamin"] ?>" selected disabled><?= $siswa["jenis_kelamin"] ?></option>
									<option value="laki-laki">Laki-laki</option>
									<option value="perempuan">Perempuan</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="alamat" class="form-label">Alamat</label>
								<textarea class="form-control" id="alamat" rows="3" name="alamat" required><?= $siswa["alamat"] ?></textarea>
							</div>
							<div class="mb-3">
								<button type="submit" name="submit" class="btn text-light" style="background-color: #00ADB5;">Update</button>
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