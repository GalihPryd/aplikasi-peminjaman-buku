<?php
$id = $_GET['id'];
$buku = $_GET['buku'];

/** @var mysqli $conn */
$query = mysqli_query($conn, "DELETE FROM `transaksi` WHERE `id_transaksi`='$id'");
if($query){
    mysqli_query($conn, "UPDATE `buku` SET `status`='tersedia' WHERE `id_buku`='$buku'");
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data Peminjaman Berhasil Dihapus',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                }).then(() =>{
                    window.location.href = '?action=data_peminjaman';
                });
                </script>
            ";
}