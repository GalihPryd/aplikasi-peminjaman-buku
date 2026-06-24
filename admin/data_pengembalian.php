<div class="p-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="semi-bold">Data Pengembalian</h3>
        <a href="?action=data_peminjaman" class="btn btn-secondary">Data Peminjaman</a>
    </div>

    <div class="table-responsive">

        <table class="table table-striped table-bordered mt-3">
            <tr class="fw-bold text-center">
                <th>No</th>
                <th>NIS</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Pengembalian</th>
                <th>Aksi</th>
            </tr>
            <?php

                /** @var mysqli $conn */
                $no = 1;
                $query = mysqli_query($conn, "SELECT * FROM `transaksi`, `buku`, `anggota` WHERE buku.id_buku = transaksi.id_buku AND anggota.id_anggota = transaksi.id_anggota AND transaksi.status_transaksi = 'Pengembalian' ORDER BY transaksi.id_transaksi DESC");
                if(mysqli_num_rows($query) > 0){
                foreach($query as $peminjam){ ?>
                    <tr class="text-center">
                        <td width="2%"><?= $no++ ?></td>
                        <td><?= $peminjam['nis'] ;?></td>
                        <td><?= $peminjam['nama_anggota'] ;?></td>
                        <td><?= $peminjam['judul_buku'] ;?></td>
                        <td><?= $peminjam['tgl_pinjam'] ;?></td>
                        <td><?= $peminjam['tgl_kembali'] ;?></td>
                        <td width="10%">
                            <?php 
                                $pesan = "Anda Yakin Ingin Menghapus Buku Oleh $peminjam[nama_anggota], Buku $peminjam[judul_buku]";
                                $isi = "'$pesan', $peminjam[id_transaksi], $peminjam[id_buku]";
                            ?>
                            <a onclick="hapus(<?= $isi ?>)" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php }} else{?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">Tidak Ada Data Saat Ini</td>
                    </tr>
                <?php }?>
        </table>
    </div>
</div>

<script>
    function hapus(pesan,id_transaksi,id_buku){
        if(confirm(pesan)){
            window.location.href = '?action=hapus_peminjaman&id='+id_transaksi+'&buku='+id_buku;
        }
    }
</script>