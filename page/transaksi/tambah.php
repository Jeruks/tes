<?php 

$tgl_pinjam = date("d-m-Y");
$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$kembali = date("d-m-Y", $tujuh_hari);


?>




<!-- Form Elements -->
<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <h3>Pinjam Buku</h3>
                <form method="POST">

                    <div class="form-group">
                        <label>Judul</label>
                        <select class="form-control" name="buku">
                            <?php
                            $sql = $conn->query("SELECT * FROM tb_buku ORDER BY id_buku");

                            while ($data = $sql->fetch_assoc()) {
                                echo "<option value='$data[id_buku].$data[judul]'>$data[judul]</option>";
                            }

                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <select class="form-control" name="nama">
                            <?php
                            $sql = $conn->query("SELECT * FROM tb_anggota ORDER BY nim");

                            while ($data = $sql->fetch_assoc()) {
                                echo "<option value='$data[nim].$data[nama]'>$data[nim] | $data[nama]</option>";
                            }

                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input class="form-control" name="tgl_pinjam" value="<?php echo $tgl_pinjam ?>" type="text" readonly />
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input class="form-control" name="tgl_kembali" value="<?php echo $kembali ?>" type="text" readonly />
                    </div>

                    <div>
                        <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php

    if (isset($_POST['simpan'])) {

        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_kembali = $_POST['tgl_kembali'];

        $buku = $_POST['buku'];
        $pecah_buku = explode(".", $buku);
        $id_buku = $pecah_buku[0];
        $judul = $pecah_buku[1];
        
        $nama = $_POST['nama'];
        $pecah_nama = explode(".", $nama);
        $nim = $pecah_nama[0];
        $nama = $pecah_nama[1];

        $sql = $conn->query("SELECT * FROM tb_buku WHERE judul='$judul'");
        while ($data = $sql->fetch_assoc()) {
            $sisa = $data['jumlah_buku'];

            if ($sisa == 0) {
                ?>
                    <script>
                        alert("Stok Buku Habis, Peminjaman Tidak Dapat Dilanjutkan, Silahkan Tambah Stok Buku Terlebih Dahulu!!");
                        window.location.href="?page=transaksi&aksi=tambah";
                    </script>
                <?php
            }else{
                $sql = $conn->query("INSERT INTO tb_pinjam(judul, nim, nama, tgl_pinjam, tgl_kembali, status) VALUES('$judul', '$nim', '$nama', '$tgl_pinjam', '$tgl_kembali', 'pinjam')");

                $sql2 = $conn->query("UPDATE tb_buku SET jumlah_buku=(jumlah_buku-1) WHERE id_buku='$id_buku'");

                ?>
                    <script>
                        alert("Peminjaman Berhasil!!");
                        window.location.href="?page=transaksi";
                    </script>
                <?php
            }
        }
    }



?>