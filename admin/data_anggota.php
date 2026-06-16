<div class="p-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="semi-bold">Data Anggota</h3>
        <a href="?action=tambah_anggota" class="btn btn-secondary">Tambah Anggota</a>
    </div>

    <div class="table-responsive">

        <table class="table table-striped table-bordered mt-3">
            <tr class="fw-bold text-center">
                <th>No</th>
                <th>NIS</th>
                <th>Nama Anggota</th>
                <th>Username</th>
                <th>Password</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
            <?php

                /** @var mysqli $conn */
                $no = 1;
                $query = mysqli_query($conn, "SELECT * FROM `anggota` ORDER BY id_anggota DESC");
                foreach($query as $anggota){ ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $anggota['nis'] ;?></td>
                        <td><?= $anggota['nama_anggota'] ;?></td>
                        <td><?= $anggota['username'] ;?></td>
                        <td><?= $anggota['password'] ;?></td>
                        <td><?= $anggota['kelas'] ;?></td>
                        <td width="23%">
                            <a href="?action=edit_anggota&id=<?= $anggota['id_anggota']; ?>" class="btn btn-warning">Edit Anggota</a>
                            <a onclick="return(confirm('Yakin Ingin Menghapus Data'))" href="?action=hapus_anggota&id=<?= $anggota['id_anggota']; ?>" class="btn btn-danger">Hapus Anggota</a>
                        </td>
                    </tr>
                <?php }?>
        </table>
    </div>
</div>

