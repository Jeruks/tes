<!-- Form Elements -->
<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <h3>Tambah Kategori</h3>
                <form method="POST">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input class="form-control" name="nama_kategori" />
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
                        
                        $nama_kategori = $_POST ['nama_kategori'];

                        $simpan = $_POST['simpan'];

                        if ($simpan) {

                            $sql = $conn->query("INSERT INTO tb_kategori (nama_kategori)values('$nama_kategori')");


                            if ($sql) {
                                ?>
                                    <script type="text/javascript">
                                        alert ("Data Berhasil Ditambahkan!");
                                        window.location.href="?page=kategori";
                                    </script>
                                <?php
                            }


                        }
                        
                        ?>