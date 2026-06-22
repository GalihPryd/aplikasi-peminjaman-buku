<div class="p-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="semi-bold">Data Peminjaman</h3>
        <a href="?action=tambah_peminjaman" class="btn btn-secondary">Tambah Peminjaman</a>
    </div>

    <div class="table-responsive">

        <table class="table table-striped table-bordered mt-3">
            <tr class="fw-bold text-center">
                <th>No</th>
                <th>NIS</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Aksi</th>
            </tr>
            <?php

                /** @var mysqli $conn */
                $no = 1;
                $query = mysqli_query($conn, "SELECT * FROM `transaksi`, `buku`, `anggota` WHERE buku.id_buku = transaksi.id_buku AND anggota.id_anggota = transaksi.id_anggota AND transaksi.status_transaksi = 'Peminjaman' ORDER BY transaksi.id_transaksi DESC");
                foreach($query as $peminjam){ ?>
                    <tr class="text-center">
                        <td width="2%"><?= $no++ ?></td>
                        <td><?= $peminjam['nis'] ;?></td>
                        <td><?= $peminjam['nama_anggota'] ;?></td>
                        <td><?= $peminjam['judul_buku'] ;?></td>
                        <td><?= $peminjam['tgl_pinjam'] ;?></td>
                        <td width="23%">
                            <?php 
                                $pesan = "Pengembalian Buku Oleh $peminjam[nama_anggota], Buku $peminjam[judul_buku]";
                                $isi = "'$pesan', $peminjam[id_transaksi], $peminjam[id_buku]";
                            ?>

                            <a onclick="pengembalian(<?= $isi ?>)" class="btn btn-success">Pengembalian</a>
                            <?php 
                                $pesan = "Anda Yakin Ingin Menghapus Buku Oleh $peminjam[nama_anggota], Buku $peminjam[judul_buku]";
                                $isi = "'$pesan', $peminjam[id_transaksi], $peminjam[id_buku]";
                            ?>

                            <a onclick="hapus(<?= $isi ?>)" class="btn btn-danger">Pengembalian</a>
                        </td>
                    </tr>
                <?php }?>
        </table>
    </div>
</div>

<script>
    function pengembalian(pesan,id_transaksi,id_buku){
        if(confirm(pesan)){
            window.location.href = '?action=proses_pengembalian&id='+id_transaksi+'&buku='+id_buku;
        }
    }
    function hapus(pesan,id_transaksi,id_buku){
        if(confirm(pesan)){
            window.location.href = '?action=hapus&id='+id_transaksi+'&buku='+id_buku;
        }
    }
</script>