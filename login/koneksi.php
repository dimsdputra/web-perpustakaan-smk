<?php
$conn = mysqli_connect("localhost", "root", "", "latihan");

// if($conn){
//     $buka=mysqli_select_db($conn, "latihan");
//     echo "database terhubung";
//     if (!$buka) {
//         echo "Database tidak dapat terhubung";
//     }
// }else{echo "Database tidak terhubung";}

//Registrasi Admin
function registrasi($data)
{
    global $conn;

    //require username dan password
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah terdaftar!')</script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai')
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah ke database
    $query = "INSERT INTO user VALUES('', '$username', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


//Tambah data Siswa
function tambah($data){
    global $conn;

    $nis = htmlspecialchars($data["NIS"]);
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $cek_nis = mysqli_query($conn, "SELECT NIS FROM siswa WHERE NIS = '$nis'");
    $cek_nama = mysqli_query($conn, "SELECT nama FROM siswa WHERE nama = '$nama'");

    if (mysqli_fetch_assoc($cek_nama) || mysqli_fetch_assoc($cek_nis)) {
        $_SESSION['gagal'] = "NIS atau Nama Siswa Sudah Terdaftar!";
		header("Location: http://localhost/web_dinamis/index.php?page=tambah_siswa");
    }

    $query = "INSERT INTO siswa VALUES('', '$nis', '$nama', '$kelas', '$jenis_kelamin', '$alamat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Ambil data siswa
function ambil_data($data){
    global $conn;
    
    $result = mysqli_query($conn, $data);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

//Tambah data Buku
function tambahBuku($data){
    global $conn;

    $kode_buku = htmlspecialchars($data["kode_buku"]);
    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
    $penerbit = htmlspecialchars($data["penerbit"]);

    $cek_kode = mysqli_query($conn, "SELECT kode_buku FROM buku WHERE kode_buku = '$kode_buku'");
    $cek_judul = mysqli_query($conn, "SELECT judul FROM buku WHERE judul = '$judul'");

    if (mysqli_fetch_assoc($cek_kode) || mysqli_fetch_assoc($cek_judul)) {
        $_SESSION['gagal'] = "Kode Buku atau Judul Sudah Ada!";
		header("Location: http://localhost/web_dinamis/index.php?page=tambah_buku");
    }

    $query = "INSERT INTO buku VALUES('$kode_buku', '$judul', '$penulis', '$tahun_terbit', '$penerbit')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}