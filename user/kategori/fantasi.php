

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Kategori Fantasi
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Lokasi</th>
                                <th>Jumlah Buku</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            $sql = $conn->query("SELECT * FROM tb_buku WHERE id_kategori='8'");

                            while ($data = $sql->fetch_assoc()) {


                            ?>

                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['judul'] ?></td>
                                    <td><?php echo $data['pengarang'] ?></td>
                                    <td><?php echo $data['penerbit'] ?></td>
                                    <td><?php echo $data['tahun_terbit'] ?></td>
                                    <td><?php echo $data['lokasi'] ?></td>
                                    <td><?php echo $data['jumlah_buku'] ?></td>
                                    <td>
                                    <a href="?page=kategori&aksi=fav&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-warning"><i class="fa fa-star"></i></a>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>