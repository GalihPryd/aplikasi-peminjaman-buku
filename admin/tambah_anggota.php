<div class="p-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="semi-bold">Tambah Data Anggota</h3>
    </div>

    <form action="#" class="mt-3" method="post">
        <div class="row g-2">
            <div class="col-md">
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="number" name="nis" class="form-control" id="nis">
                </div>
            </div>
             <div class="col-md">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username">
                </div>
            </div>
        </div>
        <div class="row g-2">
             <div class="col-md">
                <div class="mb-3">
                    <label for="nama_anggota" class="form-label">Nama Anggota</label>
                    <input type="text" name="nama_anggota" class="form-control" id="nama_anggota">
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="password">
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control" id="kelas">
                </div>
            </div>
        </div>

        <button type="submit" name="simpan_anggota" class="btn btn-primary">Simpan</button>
        <a href="?action=data_anggota" class="btn btn-secondary">Kembali</a>
    </form>

</div>

<?php
    /** @var mysqli $conn */

if(isset($_POST['simpan_anggota'])){
    $nis = $_POST['nis'];
    $nama_anggota = $_POST['nama_anggota'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $kelas = $_POST['kelas'];

    $query = mysqli_query($conn, "INSERT INTO `anggota`(`nis`, `nama_anggota`, `username`, `password`, `kelas`) VALUES ('$nis','$nama_anggota','$username','$password','$kelas')");

    if($query){
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
                    title: 'Data Gagal Disimpan',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                }).then(() =>{
                    window.location.assign = '?action=tambah_anggota';
                });
                </script>
            ";
    }
}