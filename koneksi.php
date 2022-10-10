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

//Ambil data
function ambil_data($data){
    global $conn;
    
    $result = mysqli_query($conn, $data);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
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
		header("Location: tambah_siswa.php");
    }

    $query = "INSERT INTO siswa VALUES('', '$nis', '$nama', '$kelas', '$jenis_kelamin', '$alamat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Edit data Siswa
function edit($data){
    global $conn;

    $id = $data["id"];
    $nis = htmlspecialchars($data["NIS"]);
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "UPDATE siswa SET NIS = '$nis', nama = '$nama', kelas = '$kelas', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat' WHERE id = $id";

    mysqli_query($conn, $query);

    header("Location: daftar_siswa.php");

    return mysqli_affected_rows($conn);
}

//hapus data siswa
function hapusSiswa($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");

    return mysqli_affected_rows($conn);
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

    if (mysqli_fetch_assoc($cek_kode)) {
        $_SESSION['gagal'] = "Kode Buku atau Judul Sudah Ada!";
		header("Location: tambah_buku.php");
    }

    $query = "INSERT INTO buku VALUES('$kode_buku', '$judul', '$penulis', '$tahun_terbit', '$penerbit')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Edit data Buku

//hapus data buku

//Tambah data Peminjaman Buku
function tambahPeminjamanBuku($data){
    global $conn;

    $nama_peminjam = htmlspecialchars($data["peminjam"]);
    $judul_buku = htmlspecialchars($data["judul_buku"]);
    $tanggal_peminjaman = htmlspecialchars($data["tanggal_peminjaman"]);
    $tanggal_pengembalian = htmlspecialchars($data["tanggal_pengembalian"]);
    $status_peminjaman = htmlspecialchars($data["status_peminjaman"]);

    $query = "INSERT INTO peminjaman_buku VALUES('', '$nama_peminjam', '$judul_buku', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Edit data Peminjaman Buku
