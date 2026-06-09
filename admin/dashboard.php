<?php

session_start();
if(!isset($_SESSION['id_admin'])){
    header('Location: login-admin.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Aplikasi Perpustakaan Digital Sekolah</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <style>
        body{
            background:#f8fafc;
        }

        .sidebar{
            min-height:100vh;
            background:#1E293B;
        }

        .sidebar a{
            color:#cbd5e1;
            text-decoration:none;
            display:block;
            padding:12px;
            border-radius:10px;
            margin-bottom:5px;
            font-size: 18px;
        }

        .sidebar a:hover{
            background:#334155;
        }

        .logo{
            color:white;
            font-size:20px;
            text-align: center;
            font-weight:bold;
        }

        .navbar-custom{
            background:white;
            box-shadow:0 2px 10px rgba(0,0,0,.05);
        }

</style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-3">
                <div class="logo mb-4">
                    Perpustakaan Digital
                </div>
                <a href="#">Dashboard</a>
                <a href="#">Data Siswa</a>
                <a href="#">Data Guru</a>
                <a href="#">Laporan</a>
                <a href="#">Logout</a>

            </div>

            <!-- Content -->

            <div class="col-md-10 p-0">

                <nav class="navbar navbar-expand-lg navbar-custom px-4">
                    <span class="navbar-brand">
                        Dashboard
                    </span>
                </nav>

                <div class="p-4">
                    <div class="row">
                        <div class=" mb-3">
                            <div class="card card-dashboard">
                                <div class="card-body">
                                    <h5>Selamat Datang, <?= $_SESSION['nama_admin'] ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-dashboard mt-3">
                    
                </div>

            </div>
        </div>
    </div>
</body>
</html>