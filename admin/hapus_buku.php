<?php
    /** @var mysqli $conn */
$id = $_GET['id'];
$data = mysqli_query($conn, "DELETE FROM `buku` WHERE `id_buku`='$id'");
if($data){
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data Berhasil Di Hapus',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                }).then(() =>{
                    window.location.href = '?action=data_buku';
                });
                </script>
            ";
    }else{
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: 'Data Gagal Di Hapus',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                }).then(() =>{
                    window.location.href = '?action=data_buku';
                });
                </script>
            ";
    }
