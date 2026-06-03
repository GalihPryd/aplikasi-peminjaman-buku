<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Aplikasi Perpustakaan Digital Sekolah</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="vh-100 row justify-content-center align-items-center">
        <form action="" method="post" class="col-md-3 border p-4 bg-white rounded-4">
            <h4 class="text-center">Form Login</h4>
            <h5 class="text-center mb-4">Aplikasi Perpustakaan Digital Sekolah</h5>
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" autocomplete="new-password">
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" autocomplete="new-password">
            <button class="btn btn-success w-100 mb-3" name="loginAdmin" type="submit">Login</button>
            <a href="login-anggota.php" class="text-decoration-none">Login Sebagai Anggota Perpustakaan</a>
        </form>
    </div>
</body>
</html>
    <?php 
    include('config/koneksi.php');

    if(isset($_POST['loginAdmin'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($conn, "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'");
        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_array($query);
            session_start();
            $_SESSION['id_admin'] = $data['id_admin'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama_admin'] = $data['nama_admin'];
            header('Location: admin/dashboard.php');
        }else{
            echo "<script>alert('Login Gagal, Username & Password Salah'); </script>";
        }
    }
    ?>
