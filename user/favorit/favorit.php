
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Buku Favorit
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
                                <th>Kategori</th>
                                <th>Jumlah Buku</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            $sql = $conn->query("SELECT * FROM koleksi INNER JOIN tb_user ON koleksi.id_user = tb_user.id_user INNER JOIN tb_buku ON koleksi.id_buku = tb_buku.id_buku ORDER BY judul ASC");

                            while ($data = $sql->fetch_assoc()) {


                            ?>

                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['judul'] ?></td>
                                    <td><?php echo $data['pengarang'] ?></td>
                                    <td><?php echo $data['penerbit'] ?></td>
                                    <td><?php echo $data['nama_kategori'] ?></td>
                                    <td><?php echo $data['jumlah_buku'] ?></td>
                                    <td>
                                        <a onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" href="?page=favorit&aksi=hapus&id_koleksi=<?php echo $data['id_koleksi']; ?>" class="btn btn-danger ">Hapus</a>
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