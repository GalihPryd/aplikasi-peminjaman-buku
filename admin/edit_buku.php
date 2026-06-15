<?php
    /** @var mysqli $conn */
$id = $_GET['id'];
$query_buku = mysqli_query($conn, "SELECT * FROM `buku` WHERE `id_buku` = '$id'");
$data_buku = mysqli_fetch_array($query_buku);

?>

<div class="p-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="semi-bold">Edit Data Buku</h3>
    </div>

    <form action="#" class="mt-3" method="post">
        <div class="row g-2">
            <div class="col-md">
                <div class="mb-3">
                    <label for="judul_buku" class="form-label">Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control" id="judul_buku" value="<?= $data_buku['judul_buku'] ?>">
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <label for="pengarang" class="form-label">Pengarang</label>
                    <input type="text" name="pengarang" class="form-control" id="pengarang" value="<?= $data_buku['pengarang'] ?>">
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md">
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" id="penerbit" value="<?= $data_buku['penerbit'] ?>">
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control" id="tahun_terbit" value="<?= $data_buku['tahun_terbit'] ?>">
                </div>
            </div>
        </div>

        <button type="submit" name="edit_buku" class="btn btn-primary">Edit</button>
        <a href="?action=data_buku" class="btn btn-secondary">Kembali</a>
    </form>

</div>

<?php
    /** @var mysqli $conn */

if(isset($_POST['edit_buku'])){
    $judul = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $query = mysqli_query($conn, "UPDATE `buku` SET `judul_buku`='$judul',`pengarang`='$pengarang',`penerbit`='$penerbit',`tahun_terbit`='$tahun_terbit' WHERE `id_buku`='$id'");

    if($query){
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Data Berhasil Di Edit',
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
                    title: 'Data Gagal Di Edit',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                }).then(() =>{
                    window.location.href = '?action=data_buku';
                });
                </script>
            ";
    }
}