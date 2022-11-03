<?php

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>

<div class="sidebar shadow" id="side-nav" style=" background-color: #222831;">
    <div style="width: 100%; height: 15vh; display: flex; align-items: center; justify-items: center; padding: 10px 35px">
        <img src="./asset/smkn-mjg.png" alt="" style="width: 35%; object-fit: cover;">
        <p style="margin: 0; padding-left: 20px; color: white; font-weight: 700;">
            SMKN <br>
            Mojoagung
        </p>
    </div>
    <ul class="list-unstyled px-4">
        <li class="list">
            <a class="text-decoration-none text-light d-block p-2" aria-current="page" href="index.php">
                <i class="bi bi-house-door"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light p-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-people">

                </i> Siswa</a>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="daftar_siswa.php">Daftar Siswa</a></li>
                <li><a class="dropdown-item" href="tambah_siswa.php">Tambah Data Siswa</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light p-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-book">

                </i> Buku</a>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="daftar_buku.php">Daftar Buku</a>
                </li>
                <li>
                    <a class="dropdown-item" href="tambah_buku.php">Tambah Data Buku</a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light p-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-journals"></i>
                Peminjaman Buku
                </a>
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
                <li><a class="dropdown-item" href="daftar_admin.php">Daftar Admin</a></li>
                <li><a class="dropdown-item" href="tambah_admin.php">Tambah Admin</a></li>
            </ul>
        </li>
        <p>
            <a class="text-decoration-none text-light btn" style="background-color: #00ADB5;" href="logout.php">Logout</a>
        </p>
    </ul>
</div>