<?php

$conn = mysqli_connect("localhost", "root", "", "perpus_php");

// general function
function ambil_data($data) {
    global $conn;
    
    $result = mysqli_query($conn, $data);
    
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword, $database) {
    if ($database === "siswa") {
        $query = "SELECT * FROM siswa WHERE
            nama LIKE '%$keyword%' OR 
            NIS LIKE '%$keyword%' OR
            jenis_kelamin LIKE '%$keyword%' OR
            kelas LIKE '%$keyword%';";
    } else if ($database === "buku") {
        $query = "SELECT * FROM buku WHERE
            kode_buku LIKE '%$keyword%' OR 
            judul LIKE '%$keyword%' OR
            penerbit LIKE '%$keyword%' OR
            tahun_terbit LIKE '%$keyword%' OR
            penulis LIKE '%$keyword%';";
    } else {
        $query = "SELECT peminjaman_buku.*, siswa.NIS, siswa.nama, siswa.kelas, buku.judul FROM peminjaman_buku
            INNER JOIN siswa ON peminjaman_buku.id_siswa = siswa.id
            INNER JOIN buku ON peminjaman_buku.id_buku = buku.kode_buku WHERE
            NIS LIKE '%$keyword%' OR
            nama LIKE '%$keyword%' OR
            judul LIKE '%$keyword%' OR
            kode_buku LIKE '%$keyword%' OR
            tanggal_peminjaman LIKE '%$keyword%' OR
            status_peminjaman LIKE '%$keyword%' OR
            kelas LIKE '%$keyword%';";
    }
    
    return ambil_data($query);
}


// kelola admin function
function tambahAdmin($data) {
    global $conn;

    $name = htmlspecialchars($data["name"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $konfir_password = mysqli_real_escape_string($conn, $data["konfir_password"]);

    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah terdaftar!')</script>";
        return false;
    }

    if ($password !== $konfir_password) {
        echo "<script>alert('konfirmasi password tidak sesuai')</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO admin VALUES(NULL, '$username', '$password', '$name')";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function editAdmin($data, $condition) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $username = strtolower(stripslashes($data["username"]));
    
    if ($condition === "with password") {
        $password_baru = mysqli_real_escape_string($conn, $data["password_baru"]);
        $hash_password = password_hash($password_baru, PASSWORD_DEFAULT);

        $query = "UPDATE admin SET nama = '$nama', username = '$username', password = '$hash_password' WHERE id = $id";
    } else {
        $query = "UPDATE admin SET nama = '$nama', username = '$username' WHERE id = $id";
    }

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusAdmin($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM admin WHERE id = $id");
    
    return mysqli_affected_rows($conn);
}



// siswa function
function tambahSiswa($data){
    global $conn;
    
    $nis = htmlspecialchars($data["NIS"]);
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    
    $cek_nama = ambil_data("SELECT nama FROM siswa WHERE nama = '$nama'")[0]["nama"];
    $cek_nis = ambil_data("SELECT NIS FROM siswa WHERE NIS = '$nis'")[0]["NIS"];

    if ($cek_nis == $nis) {
        $_SESSION['message_fail'] = "NIS siswa sudah terdaftar";
        header("Location: tambah_siswa.php");
    } elseif ($cek_nama == $nama) {
        $_SESSION['message_fail'] = "Nama siswa sudah terdaftar";
        header("Location: tambah_siswa.php");
    }
    
    $query = "INSERT INTO siswa VALUES('', '$nis', '$nama', '$kelas', '$jenis_kelamin', '$alamat')";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}


function editSiswa($data) {
    global $conn;
    
    $id = intval($data["id"]);
    $nis = htmlspecialchars($data["NIS"]);
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    
    $cek_nama = ambil_data("SELECT nama FROM siswa WHERE nama = '$nama' AND id != $id")[0]["nama"];
    $cek_nis = ambil_data("SELECT NIS FROM siswa WHERE NIS = '$nis' AND id != $id")[0]["NIS"];

    if ($cek_nis == $nis) {
        $_SESSION['message_fail'] = "Gagal diubah, NIS Siswa sudah terdaftar";
        header("Location: daftar_siswa.php");
    } elseif ($cek_nama == $nama) {
        $_SESSION['message_fail'] = "Gagal diubah, nama Siswa sudah terdaftar";
        header("Location: daftar_siswa.php");
    }

    $query = "UPDATE siswa SET NIS = '$nis', nama = '$nama', kelas = '$kelas', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat' WHERE id = $id";
    mysqli_query($conn, $query);
        
    return mysqli_affected_rows($conn);
    
}

function hapusSiswa($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
    
    return mysqli_affected_rows($conn);
}


// buku function
function tambahBuku($data){
    global $conn;
    
    $kode_buku = htmlspecialchars($data["kode_buku"]);
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    
    $cek_kode = mysqli_query($conn, "SELECT kode_buku FROM buku WHERE kode_buku = '$kode_buku'");
    $kode = mysqli_fetch_assoc($cek_kode);
    
    if ($kode["kode_buku"]) {
        $_SESSION['message_fail'] = "Kode buku ". $kode["kode_buku"] ." sudah ada";
		header("Location: tambah_buku.php");
    }

    $query = "INSERT INTO buku VALUES('$kode_buku', '$judul', '$penulis', '$tahun_terbit', '$penerbit')";
    
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function editBuku($data) {
    global $conn;
    
    $kode_buku = $data["kode_buku"];
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
    
    $query = "UPDATE buku SET judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit' WHERE kode_buku = $kode_buku";
    
    mysqli_query($conn, $query);
    
    header("Location: daftar_buku.php");
    
    return mysqli_affected_rows($conn);
}

function hapusBuku($kode_buku) {
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE kode_buku = $kode_buku");
    
    return mysqli_affected_rows($conn);
}


// peminjaman function
function tambahPeminjaman($data) {
    global $conn;

    $peminjam = htmlspecialchars($data["peminjam"]);
    $judul_buku = htmlspecialchars($data["judul_buku"]);
    $tanggal_peminjaman = htmlspecialchars($data["tanggal_peminjaman"]);
    $tanggal_pengembalian = htmlspecialchars($data["tanggal_pengembalian"]);
    $status_peminjaman = htmlspecialchars($data["status_peminjaman"]);

    $id_siswa = ambil_data("SELECT id FROM siswa WHERE nama = '$peminjam'")[0]["id"];
    $id_buku = ambil_data("SELECT kode_buku FROM buku WHERE judul = '$judul_buku'")[0]["kode_buku"];

    $query = "INSERT INTO peminjaman_buku(id_siswa, id_buku, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman)
        VALUES ($id_siswa, $id_buku, '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function editPeminjaman($data) {
    global $conn;

    $check = ambil_data("SELECT status_peminjaman FROM peminjaman_buku WHERE id = $data")[0];
    if ($check["status_peminjaman"] === "Dipinjam") {
        mysqli_query($conn, "UPDATE peminjaman_buku SET status_peminjaman = 'Dikembalikan' WHERE id = $data");
    } else {
        mysqli_query($conn, "UPDATE peminjaman_buku SET status_peminjaman = 'Dipinjam' WHERE id = $data");
    }

    return mysqli_affected_rows($conn);
}

?>