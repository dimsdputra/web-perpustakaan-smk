<?php
require '../../login/koneksi.php';

if (isset($_POST["submit"])) {
	if (tambah($_POST) > 0) {
		$_SESSION['berhasil'] = "Data Berhasil Ditambahkan";
		header("Location: http://localhost/web_dinamis/index.php?page=siswa");
	}
}
?>

<body>
	<div>
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
							<button type="button" class="btn text-light bg-warning"><a href="index.php?page=edit_siswa">Edit</a></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>