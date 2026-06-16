<?php
    /** @var mysqli $conn */
$id = $_GET['id'];
$query_anggota = mysqli_query($conn, "SELECT * FROM `anggota` WHERE `id_anggota` = '$id'");
$data_anggota= mysqli_fetch_array($query_anggota);

?>

<div class="p-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="semi-bold">Edit Data Anggota</h3>
    </div>

    <form action="#" class="mt-3" method="post">
        <div class="row g-2">
            <div class="col-md">
                <div class="mb-3">
                    <label for="nis" class="form-label">Nis</label>
                    <input type="text" name="nis" class="form-control" id="nis" value="<?= $data_anggota['nis'] ?>">
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="<?= $data_anggota['username'] ?>">
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md">
                <div class="mb-3">
                    <label for="nama_anggota" class="form-label">Nama Anggota</label>
                    <input type="text" name="nama_anggota" class="form-control" id="nama_anggota" value="<?= $data_anggota['nama_anggota'] ?>">
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="password" value="<?= $data_anggota['password'] ?>">
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $data_anggota['kelas'] ?>">
                </div>
            </div>
        </div>

        <button type="submit" name="edit_anggota" class="btn btn-primary">Edit</button>
        <a href="?action=data_anggota" class="btn btn-secondary">Kembali</a>
    </form>

</div>

<?php
    /** @var mysqli $conn */

if(isset($_POST['edit_anggota'])){
    $nis = $_POST['nis'];
    $nama_anggota = $_POST['nama_anggota'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $kelas = $_POST['kelas'];

    $query = mysqli_query($conn, "UPDATE `anggota` SET `nis`='$nis',`nama_anggota`='$nama_anggota',`username`='$username',`password`='$password',`kelas`='$kelas' WHERE `id_anggota`='$id'");

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
                    window.location.href = '?action=data_anggota';
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
                    window.location.href = '?action=data_anggota';
                });
                </script>
            ";
    }
}