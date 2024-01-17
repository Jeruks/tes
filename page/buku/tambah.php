<!-- Form Elements -->
<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <h3>Tambah Buku</h3>
                <form method="POST">
                    <div class="form-group">
                        <label>Judul</label>
                        <input class="form-control" name="judul" />
                    </div>
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input class="form-control" name="pengarang" />
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input class="form-control" name="penerbit" />
                    </div>

                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <select class="form-control" name="tahun">
                            <?php

                            $tahun = date("Y");

                            for ($i = $tahun - 30; $i <= $tahun; $i++) {
                                echo '
                                                    
                                                        <option value="' . $i . '">' . $i . '</option>
                                                    
                                                    ';
                            }

                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="id_kategori">
                            <?php 
                            $sql = "SELECT * FROM tb_kategori ORDER BY nama_kategori";
                            $query = mysqli_query($conn, $sql);
                            while($r=mysqli_fetch_assoc($query)) {
                                echo "<option value='".$r['id_kategori']."'>".$r['nama_kategori']."</option>";;
                            }
                            
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Buku</label>
                        <input class="form-control" type="number" name="jumlah" />
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <select class="form-control" name="lokasi">
                            <option value="rak1">Rak 1</option>
                            <option value="rak2">Rak 2</option>
                            <option value="rak3">Rak 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Input</label>
                        <input class="form-control" name="tanggal" type="date" />
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
                        $id_kategori = $_POST ['id_kategori']; 
                        $jumlah = $_POST ['jumlah'];
                        $lokasi = $_POST ['lokasi'];
                        $tanggal = $_POST ['tanggal'];

                        $simpan = $_POST['simpan'];

                        if ($simpan) {

                            $sql = $conn->query("INSERT INTO tb_buku (judul, pengarang, penerbit, tahun_terbit, id_kategori, jumlah_buku, lokasi, tgl_input )values('$judul', '$pengarang', '$penerbit', '$tahun', '$id_kategori', '$jumlah', '$lokasi', '$tanggal ')");


                            if ($sql) {
                                ?>
                                    <script type="text/javascript">
                                        alert ("Data Berhasil Ditambahkan!");
                                        window.location.href="?page=buku";
                                    </script>
                                <?php
                            }


                        }
                        
                        ?>