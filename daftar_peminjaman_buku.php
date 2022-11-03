<?php
session_start();
require 'koneksi.php';

$jumlahDataPerHalaman = 10;
$jumlahData = count(ambil_data("SELECT * FROM peminjaman_buku;"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"]) ? $_GET["halaman"] : 1);
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$all_data = ambil_data("SELECT peminjaman_buku.*, siswa.NIS, siswa.nama, siswa.kelas, buku.judul FROM peminjaman_buku INNER JOIN siswa ON peminjaman_buku.id_siswa = siswa.id INNER JOIN buku ON peminjaman_buku.id_buku = buku.kode_buku LIMIT $awalData, $jumlahDataPerHalaman");

if(isset($_POST["cari"])) {
	$all_data = cari($_POST["keyword"], "peminjaman_buku");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Peminjaman Buku</title>
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
					<h1 class="m-0">Daftar Peminjaman Buku</h1>
				</div>
			</div>
			<div class="w-full ps-5 pe-5 pt-2 pb-2">
				<div class="mt-2">
					<button type="button" class="btn" style="background-color: #00ADB5;">
						<a class="text-decoration-none d-block text-white" aria-current="page" href="tambah_peminjaman.php">Tambah Peminjaman Buku</a>
					</button>
					<?php
						if (isset($_SESSION["peminjaman_message"])) :
					?>
						<div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
							<?php echo $_SESSION["peminjaman_message"]; ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					<?php
						unset($_SESSION["peminjaman_message"]);
						endif;
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
			<div class="w-full ps-5 pe-5 pt-2 pb-2">
				<div class="card">
					<table class="table text-center">
						<thead>
							<tr>
								<th scope="col">No.</th>
								<th scope="col" class="table-secondary">NIS</th>
								<th scope="col">Nama</th>
								<th scope="col">Kelas</th>
								<th scope="col">Kode Buku</th>
								<th scope="col">Buku Dipinjam</th>
								<th scope="col">Tanggal Peminjaman</th>
								<th scope="col">Tanggal Pengembalian</th>
								<th scope="col">Status Peminjaman</th>
								<th scope="col">Ubah Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach($all_data as $data) : ?>
								<tr>
									<th scope="row"><?= $i ?></th>
									<td class="table-secondary"><?= $data["NIS"] ?></td>
									<td><?= $data["nama"] ?></td>
									<td><?= $data["kelas"] ?></td>
									<td><?= $data["id_buku"] ?></td>
									<td><?= $data["judul"] ?></td>
									<td><?= $data["tanggal_peminjaman"] ?></td>
									<td><?= $data["tanggal_pengembalian"] ?></td>
									<td><?= $data["status_peminjaman"] ?></td>
									<td>
										<?php if ($data["status_peminjaman"] === "Dipinjam") : ?>
											<a href="edit_peminjaman_buku.php?id=<?= $data["id"] ?>" class="btn btn-success w-100 text-decoration-none text-white">Ubah</a>
										<?php else : ?>
											<a href="edit_peminjaman_buku.php?id=<?= $data["id"] ?>" class="btn btn-secondary w-100 text-decoration-none text-white">Ubah</a>
										<?php endif; ?>
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