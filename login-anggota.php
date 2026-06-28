<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Anggota - Aplikasi Perpustakaan Digital Sekolah</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body{
            background: linear-gradient(
                135deg,
                #f8fafc,
                #dbeafe
            );
            height: 100vh;
        }

        .login-card{
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,.1);
        }

        .btn-login{
            background: #4F7DF3;
            border: none;
        }

        .btn-login:hover{
            background: #3a68db;
        }

        .logo{
            width:80px;
            height:80px;
            background:#4F7DF3;
            border-radius:50%;
            margin:auto;
            display:flex;
            justify-content:center;
            align-items:center;
            color:white;
            font-size:30px;
            font-weight:bold;
        }
    </style>
</head>
<body class="bg-light">
   <div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card login-card">
                <div class="card-body p-5">
                    <h3 class="text-center">Login Anggota</h3>
                    <h5 class="text-center mb-4">Aplikasi Perpustakaan Digital Sekolah</h5>
                    <form method="post" class="mb-3">
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username" autocomplete="new-password">
                        </div>
                        <div class="mb-4">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" autocomplete="new-password">
                        </div>

                        <button class="btn btn-login text-white w-100" name="loginAnggota" type="submit"> Login </button>
                    </form>
                    <p class="text-muted text-center">Login Sebagai Admin <a href="login-admin.php" class="fst-italic">Masuk Sini</a></p>
                </div>

            </div>

        </div>

    </div>
</div>
</body>
</html>
    <?php 
    include('config/koneksi.php');

    if(isset($_POST['loginAnggota'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($conn, "SELECT * FROM `anggota` WHERE `username` = '$username' AND `password` = '$password'");
        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_array($query);
            session_start();
            $_SESSION['id_anggota'] = $data['id_anggota'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama_anggota'] = $data['nama_anggota'];
            
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Login Berhasil!',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                }).then(() =>{
                    window.location.href = 'anggota/dashboard.php';
                });
                </script>
            ";
        }else{
            echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: 'Login Gagal!',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                }).then(() =>{
                    window.location.href = 'login-anggota.php';
                });
                </script>
            ";
        }
    }
    ?>
