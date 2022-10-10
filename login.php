<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'koneksi.php';

//cek subimt
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body style=" background-color: #222831;">
    <div class="text-light text-center position-absolute top-50 start-50 translate-middle w-50">
        <h1>Halaman Login</h1>
        <?php if (isset($error)) : ?>
            <span style="color: red; font-size: 12px;"> Username atau password salah</span>
        <?php endif; ?>
        <div class="w-100">
            <form action="" method="post">
                <div class="card p-3">
                    <div class="mt-3">
                        <label for="username" class="form-label text-dark">Username</label>
                        <input type="text" id="username" class="form-control" aria-describedby="username" name="username" required>
                    </div>
                    <div class="mt-3">
                        <label for="password" class="form-label text-dark">Password</label>
                        <input type="password" id="password" class="form-control" aria-describedby="password" name="password" required>
                    </div>
                    <div class="mt-3 mb-3">
                        <button type="submit" name="login" class="btn text-light" style="background-color: #00ADB5;">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>