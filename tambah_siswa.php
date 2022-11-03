<?php
session_start();
require 'koneksi.php';

if (isset($_POST["submit"])) {
	if (tambahSiswa($_POST) > 0) {
		$_SESSION['siswa_message'] = "Data Berhasil Ditambahkan";
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
	<title>Tambah Siswa</title>
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
					<h1 class="">Tambah Data Siswa</h1>
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
								<label for="NIS" class="form-label">NIS</label>
								<input type="text" class="form-control" id="NIS" name="NIS" placeholder="1123432143" required>
							</div>
							<div class="mb-3">
								<label for="nama" class="form-label">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Budi Seriawan" required>
							</div>
							<div class="mb-3">
								<label for="kelas" class="form-label">Kelas</label>
								<select class="form-select" aria-label="Default select example" id="kelas" name="kelas" required>
									<option disabled selected>Pilih Kelas</option>
									<option value="X RPL">X RPL</option>
									<option value="XI RPL">XI RPL</option>
									<option value="XII RPL">XII RPL</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
								<select class="form-select" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin" required>
									<option disabled selected>Pilih Jenis Kelamin</option>
									<option value="laki-laki">Laki-laki</option>
									<option value="perempuan">Perempuan</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="alamat" class="form-label">Alamat</label>
								<textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
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