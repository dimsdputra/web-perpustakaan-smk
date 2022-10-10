<?php

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>

<div class="sidebar shadow" id="side-nav" style=" background-color: #222831;">
    <div class="header-box px-2 pt-3 pb-4">
        <img src="./asset/logo smkn mojoagung.png" alt="" srcset="" class="w-25">
    </div>
    <ul class="list-unstyled px-2">
        <li class="list"><a class="text-decoration-none text-light d-block p-2" aria-current="page" href="index.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light p-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-people"></i> Siswa</a>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="daftar_siswa.php">Daftar Siswa</a></li>
                <li><a class="dropdown-item" href="tambah_siswa.php">Tambah Data Siswa</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light p-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-book"></i> Buku</a>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="daftar_buku.php">Daftar Buku</a></li>
                <li><a class="dropdown-item" href="tambah_buku.php">Tambah Data Buku</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light p-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-journals"></i> Peminjaman Buku</a>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="daftar_peminjaman_buku.php">Daftar Peminjaman</a></li>
                <li><a class="dropdown-item" href="tambah_peminjaman.php">Tambah Data Peminjaman</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light p-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i> Admin</a>
            </a>
            <ul class="dropdown-menu">
                <!-- <li><a class="dropdown-item" href="daftar_data_admin.php">Data Admin</a></li> -->
                <li><a class="dropdown-item" href="registrasi.php">Tambah Admin</a></li>
            </ul>
        </li>
        <h3 class="p-2"><a class="text-decoration-none text-light btn" style="background-color: #00ADB5;" href="logout.php">Logout</a></h3>
    </ul>
</div>