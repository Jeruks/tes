<?php 

$id_buku = $_GET['id_buku'];

$sql = $conn->query("SELECT * FROM tb_buku WHERE id_buku='$id_buku'");

$tampil = $sql->fetch_assoc();

$tahun2 = $tampil['tahun_terbit'];

$lokasi = $tampil['lokasi'];

?>



<!-- Form Elements -->
<div class="panel panel-default">
    <div class="panel-heading">
        Edit Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <h3>Tambah Buku</h3>
                <form method="POST">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name="judul" value="<?php echo $tampil['judul']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input class="form-control" name="pengarang" value="<?php echo $tampil['pengarang']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input class="form-control" name="penerbit" value="<?php echo $tampil['penerbit']; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <select class="form-control" name="tahun">
                            <?php

                            $tahun = date("Y");

                            for ($i = $tahun - 30; $i <= $tahun; $i++) {

                                if ($i==$tahun2) {
                                    echo'<option value="'.$i.'" selected>' .$i. '</option>';

                                }else{
                                                    
                                                    echo  '<option value="' . $i . '">' . $i . '</option>';
                                                    
                                                    }
                                                    
                            }

                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>ISBN</label>
                        <input class="form-control" name="isbn" value="<?php echo $tampil['isbn']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Jumlah Buku</label>
                        <input class="form-control" type="number" name="jumlah" value="<?php echo $tampil['jumlah_buku']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <select class="form-control" name="lokasi">
                            <option value="rak1" <?php if($lokasi=='rak1') {echo "selected";} ?>>Rak 1</option>
                            <option value="rak2" <?php if($lokasi=='rak2') {echo "selected";} ?>>Rak 2</option>
                            <option value="rak3" <?php if($lokasi=='rak3') {echo "selected";} ?>>Rak 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Input</label>
                        <input class="form-control" name="tanggal" type="date" value="<?php echo $tampil['tgl_input']; ?>" />
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
                        
                        $judul = $_POST ['judul'];
                        $pengarang = $_POST ['pengarang'];
                        $penerbit = $_POST ['penerbit'];
                        $tahun = $_POST ['tahun'];
                        $isbn = $_POST ['isbn'];
                        $jumlah = $_POST ['jumlah'];
                        $lokasi = $_POST ['lokasi'];
                        $tanggal = $_POST ['tanggal'];

                        $simpan = $_POST['simpan'];

                        if ($simpan) {

                            $sql = $conn->query("UPDATE tb_buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun', isbn='$isbn', jumlah_buku='$jumlah', lokasi='$lokasi', tgl_input='$tanggal' WHERE id_buku='$id_buku'");


                            if ($sql) {
                                ?>
                                    <script type="text/javascript">
                                        alert ("Edit Data Berhasil!");
                                        window.location.href="?page=buku";
                                    </script>
                                <?php
                            }


                        }
                        
                        ?>