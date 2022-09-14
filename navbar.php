<!DOCTYPE html>
<html>

<head>
    <title>Membuat Halaman Web Dinamis Dengan PHP</title>
    <link rel="stylesheet" href="./asset/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="sidebar shadow" id="side-nav" style=" background-color: #222831;">
        <div class="header-box px-2 pt-3 pb-4 text-white">
            <img src="logo smkn mojoagung.png" alt="" srcset="" class="w-25">
            <h1>halo</h1>
        </div>
        <ul class="list-unstyled px-2">
            <li class="list">
                <a class="text-decoration-none text-light d-block p-2" aria-current="page" href="dashboard.php">
                    <i class="bi bi-house-door"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light p-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-people"></i> Siswa</a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./siswa/siswa.php">Daftar Siswa</a></li>
                    <li><a class="dropdown-item" href="index.php?page=tambah_siswa">Tambah Data Siswa</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light p-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-people"></i> Buku</a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?page=buku">Daftar Buku</a></li>
                    <li><a class="dropdown-item" href="index.php?page=tambah_buku">Tambah Data Buku</a></li>
                </ul>
            </li>
            <li class="list"><a class="text-decoration-none text-light d-block p-2" aria-current="page" href="index.php?page=peminjaman_buku"><i class="bi bi-journals"></i> Peminjaman Buku</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light p-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i> Admin</a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?page=data_admin">Data Admin</a></li>
                    <li><a class="dropdown-item" href="index.php?page=registrasi">Tambah Admin</a></li>
                </ul>
            </li>
            <h3 class="p-2"><a class="text-decoration-none text-light btn" style="background-color: #00ADB5;" href="./login/logout.php">Logout</a></h3>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>