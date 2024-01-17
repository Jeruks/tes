
<a href="?page=kategori&aksi=tambah" class="btn btn-success" style="margin-bottom: 5px;"><i class="fa fa-plus"></i> Tambah Data</a>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Kategori
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            $sql = $conn->query("SELECT * FROM tb_kategori");

                            while ($data = $sql->fetch_assoc()) {


                            ?>

                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['nama_kategori'] ?></td>
                                    <td>
                                        <a href="?page=kategori&aksi=ubah&id_kategori=<?php echo $data['id_kategori']; ?>" class="btn btn-info">Edit</a>
                                        <a href="?page=kategori&aksi=hapus&id_kategori=<?php echo $data['id_kategori']; ?>" class="btn btn-danger alert_notif">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>