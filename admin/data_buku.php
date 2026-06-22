<div class="p-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="semi-bold">Data Buku</h3>
        <a href="?action=tambah_buku" class="btn btn-secondary">Tambah Buku</a>
    </div>

    <div class="table-responsive">

        <table class="table table-striped table-bordered mt-3">
            <tr class="fw-bold text-center">
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php

                /** @var mysqli $conn */
                $no = 1;
                $query = mysqli_query($conn, "SELECT * FROM `buku` ORDER BY id_buku DESC");
                foreach($query as $buku){ ?>
                    <tr class="text-center">
                        <td width="2%"><?= $no++ ?></td>
                        <td><?= $buku['judul_buku'] ;?></td>
                        <td><?= $buku['pengarang'] ;?></td>
                        <td><?= $buku['penerbit'] ;?></td>
                        <td><?= $buku['tahun_terbit'] ;?></td>
                        <td><?= $buku['status'] ;?></td>
                        <td width="23%">
                            <a href="?action=edit_buku&id=<?= $buku['id_buku']; ?>" class="btn btn-warning">Edit Buku</a>
                            <a onclick="return(confirm('Yakin Ingin Menghapus Data'))" href="?action=hapus_buku&id=<?= $buku['id_buku']; ?>" class="btn btn-danger">Hapus Buku</a>
                        </td>
                    </tr>
                <?php }?>
        </table>
    </div>
</div>

