<?php

session_start();
require_once '../config/koneksi.php';
if(!isset($_SESSION['id_admin'])){
    header('Location: ../login-admin.php');
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
            color: #cbd5e1;
            text-decoration:none;
            display:block;
            padding:12px;
            border-radius:10px;
            margin-bottom:8px;
            font-size: 18px;
            border-bottom: 1px solid #cbd5e1;
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
                <a href="dashboard.php">Dashboard</a>
                <a href="?action=data_buku">Data Buku</a>
                <a href="?action=data_anggota">Data Anggota</a>
                <a href="?action=data_peminjaman">Peminjaman Buku</a>
                <a href="logout.php" onclick="return(confirm('Yakin ingin logout!'))">Logout</a>

            </div>

            <!-- Content -->

            <div class="col-md-10 p-0">
                <nav class="navbar navbar-expand-lg navbar-custom px-4">
                    
                    <div class="ms-auto">
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['nama_admin'] ?>&background=1E293B&color=cbd5e1" width="40" height="40" class="rounded-circle me-2">
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li><hr class="dropdown-divider"></li>

                                <li>
                                    <a class="dropdown-item text-muted" href="logout.php" onclick="return(confirm('Yakin ingin logout!'))">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- <div class="p-4">
                    <div class="row">
                        <div class=" mb-3">
                            <div class="card card-dashboard">
                                <div class="card-body">
                                    <h5>Selamat Datang, <?= $_SESSION['nama_admin'] ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                 <div class="p-4">
                    <div class="row">
                        <div class="mb-3">
                            <div class="card card-dashboard mt-3">
                                <?php
                                    if(isset($_GET['action'])){
                                        $fileName = $_GET['action'] . ".php";
                                        if(file_exists($fileName)){
                                            require($fileName);
                                        }else{ 
                                            echo "<div class='p-4'>Halaman Tidak Ditemukan!</div>";
                                        }
                                    }else{?>
                                    <div class="p-4">
                                                <div class="row">
                                                    <div class=" mb-3">
                                                        <h5>Selamat Datang, <?= $_SESSION['nama_admin'] ?> 👋</h5>
                                                        <p class="text-justify text-muted">
                                                                Selamat datang kembali di Sistem Perpustakaan Digital. Kelola data buku, anggota, dan transaksi peminjaman dengan mudah melalui dashboard ini.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                   <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>