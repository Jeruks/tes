<!-- Form Elements -->
<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <h3>Tambah Anggota</h3>
                <form method="POST">
                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" name="nim" />
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" />
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" name="tempat_lahir" />
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" name="tgl_lahir" type="date" />
                    </div>

                    <div class="form-group" name="jk">
                        <label>Jenis Kelamin</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="jk" id="optionsRadios1" value="L" />Laki-laki
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="jk" id="optionsRadios2" value="P" />Perempuan
                            </label>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Jurusan</label>
                        <input class="form-control" type="text" name="prodi" />
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

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$prodi = $_POST['prodi'];

$simpan = $_POST['simpan'];

if ($simpan) {

    $sql = $conn->query("INSERT INTO tb_anggota (nim, nama, tempat_lahir, tgl_lahir, jk, prodi )values('$nim', '$nama', '$tempat_lahir', '$tgl_lahir', '$jk', '$prodi')");


    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Ditambahkan!");
            window.location.href = "?page=anggota";
        </script>
<?php
    }
}

?>