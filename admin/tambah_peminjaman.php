<?php
/** @var mysqli $conn */
$anggota = mysqli_query($conn, "SELECT * FROM `anggota`");
$buku = mysqli_query($conn, "SELECT * FROM `buku` WHERE `status` = 'tersedia'");
?>
<div class="p-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="semi-bold">Tambah Data Peminjaman</h3>
    </div>

    <form action="#" class="mt-3" method="post">
        <div class="row g-2">
            <div class="col-md">
                <div class="mb-3">
                    <label for="id_anggota" class="form-label">Nama Anggota</label>
                    <select class="form-select" aria-label="Default select example" name="id_anggota" id="id_anggota">
                        <option selected>Pilih Anggota</option>
                        <?php
                        foreach($anggota as $data){
                            echo "<option value='$data[id_anggota]'>$data[nama_anggota]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <label for="id_buku" class="form-label">Judul Buku</label>
                    <select class="form-select" aria-label="Default select example" name="id_buku" id="id_buku">
                        <option selected>Pilih Buku</option>
                        <?php
                        foreach($buku as $data){
                            echo "<option value='$data[id_buku]'>$data[judul_buku]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                    <input type="datetime-local" name="tgl_pinjam" class="form-control" id="tgl_pinjam">
                </div>
            </div>
        </div>

        <button type="submit" name="simpan_peminjaman" class="btn btn-primary">Simpan</button>
        <a href="?action=data_peminjaman" class="btn btn-secondary">Kembali</a>
    </form>

</div>

<?php
    /** @var mysqli $conn */

if(isset($_POST['simpan_peminjaman'])){
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $status_transaksi = 'Peminjaman';

    $query = mysqli_query($conn, "INSERT INTO `transaksi`(`id_anggota`, `id_buku`, `tgl_pinjam`, `status_transaksi`) VALUES ('$id_anggota','$id_buku','$tgl_pinjam','$status_transaksi')");

    if($query){
        mysqli_query($conn, "UPDATE `buku` SET `status`='tidak' WHERE `id_buku`='$id_buku'");
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data Berhasil Disimpan',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                }).then(() =>{
                    window.location.href = '?action=data_peminjaman';
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
                    title: 'Data Gagal Disimpan',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                }).then(() =>{
                    window.location.assign = '?action=tambah_peminjaman';
                });
                </script>
            ";
    }
}