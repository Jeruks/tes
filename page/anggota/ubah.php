<?php 

$nim = $_GET['nim'];

$sql = $conn->query("SELECT * FROM tb_anggota WHERE nim='$nim'");

$tampil = $sql->fetch_assoc();

$jk = $tampil['jk'];

?>



<!-- Form Elements -->
<div class="panel panel-default">
    <div class="panel-heading">
        Edit Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <h3>Edit Anggota</h3>
                <form method="POST">
                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" name="nim" value="<?php echo $tampil['nim']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" value="<?php echo $tampil['nama']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" name="tempat_lahir" value="<?php echo $tampil['tempat_lahir']; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" name="tgl_lahir" type="date" value="<?php echo $tampil['tgl_lahir']; ?>" />
                    </div>

                    <div class="form-group" name="jk">
                        <label>Jenis Kelamin</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="jk" id="optionsRadios1" value="L" <?php if($jk=='L') {echo "checked";} ?> />Laki-laki
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="jk" id="optionsRadios2" value="P" <?php if($jk=='P') {echo "checked";} ?> />Perempuan
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jurusan</label>
                        <input class="form-control" name="prodi" value="<?php echo $tampil['prodi']; ?>" />
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
                        
                        $nim = $_POST ['nim'];
                        $nama = $_POST ['nama'];
                        $tempat_lahir = $_POST ['tempat_lahir'];
                        $tgl_lahir = $_POST ['tgl_lahir'];
                        $jk = $_POST ['jk'];
                        $prodi = $_POST ['prodi'];

                        $simpan = $_POST['simpan'];

                        if ($simpan) {

                            $sql = $conn->query("UPDATE tb_anggota SET nim='$nim', nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', jk='$jk', prodi='$prodi' WHERE nim='$nim'");


                            if ($sql) {
                                ?>
                                    <script type="text/javascript">
                                        alert ("Edit Data Berhasil!");
                                        window.location.href="?page=anggota";
                                    </script>
                                <?php
                            }


                        }
                        
                        ?>