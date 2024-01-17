<a href="?page=buku&aksi=tambah" class="btn btn-success" style="margin-bottom: 5px;"><i class="fa fa-plus"></i> Tambah Data</a>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Buku
            </div>
            <div class="panel-body">
                <div class="table-responsive text-center">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Judul</th>
                                <th style="text-align: center;">Pengarang</th>
                                <th style="text-align: center;">Penerbit</th>
                                <th style="text-align: center;">Kategori</th>
                                <th style="text-align: center;">Jumlah Buku</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            $sql = $conn->query("SELECT tb_buku.*, tb_kategori.nama_kategori FROM tb_buku,tb_kategori WHERE tb_kategori.id_kategori=tb_buku.id_kategori ORDER BY id_buku");

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
                                        <a href="?page=buku&aksi=ubah&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-info ">Edit</a>
                                        <a onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" href="?page=buku&aksi=hapus&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-danger ">Hapus</a>
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