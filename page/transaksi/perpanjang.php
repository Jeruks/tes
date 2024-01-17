<?php 

    $id_pinjam = $_GET['id_pinjam'];
    $judul = $_GET['judul'];
    $tgl_kembali = $_GET['tgl_kembali'];
    $lambat = $_GET['lambat'];

    if ($lambat > 7) {
        ?>

        <script>
            alert('Buku Tidak Dapat Diperpanjang, Karena Lebih Dari 7 HARI!!!... Silahkan Kembalikan Buku Terlebih Dahulu Kemudian Melakukan Peminjaman Kembali.');
            window.location.href="?page=transaksi";
        </script>

        <?php

    }else{
        $pecah_tgl_kembali = explode("-", $tgl_kembali);
        $next_7_hari = mktime(0,0,0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[0]+7, $pecah_tgl_kembali[2]);
        $hari_next = date("d-m-Y", $next_7_hari);

        $sql = $conn->query("UPDATE tb_pinjam set tgl_kembali='$hari_next' WHERE id_pinjam='$id_pinjam'");

        if($sql) {
            ?>
                <script type="text/javascript">
                    alert('Perpanjangan Berhasil!');
                    window.location.href="?page=transaksi";
                </script>
            <?php

        }else {
            ?>
                <script type="text/javascript">
                    alert('Perpanjangan Gagal!');
                    window.location.href="?page=transaksi";
                </script>
            <?php
        }
    }




?>