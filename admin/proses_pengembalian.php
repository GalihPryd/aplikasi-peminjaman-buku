<?php
$id = $_GET['id'];
$buku = $_GET['buku'];

date_default_timezone_set('Asia/Jakarta');
$tgl_kembali = date('Y-m-d H:i:s');

/** @var mysqli $conn */
$query = mysqli_query($conn, "UPDATE `transaksi` SET `tgl_kembali`='$tgl_kembali',`status_transaksi`='Pengembalian' WHERE `id_transaksi`='$id'");
if($query){
    mysqli_query($conn, "UPDATE `buku` SET `status`='tersedia' WHERE `id_buku`='$buku'");
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Buku Berhasil Dikembalikan',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                }).then(() =>{
                    window.location.href = '?action=data_peminjaman';
                });
                </script>
            ";
}