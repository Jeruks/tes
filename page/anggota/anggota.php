
<a href="?page=anggota&aksi=tambah" class="btn btn-success" style="margin-bottom: 5px;"><i class="fa fa-plus"></i> Tambah Data</a>
<a href="./laporan/laporan-anggota-excel.php" target="blank" class="btn btn-primary" style="margin-bottom: 5px;"><i class="fa fa-print"></i> Export (Laporan)</a>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Anggota
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            $sql = $conn->query("SELECT * FROM tb_anggota");

                            while ($data = $sql->fetch_assoc()) {

                                $jk = ($data['jk']=='L')?"Laki-laki":"Perempuan";


                            ?>

                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['nim'] ?></td>
                                    <td><?php echo $data['nama'] ?></td>
                                    <td><?php echo $data['tempat_lahir'] ?></td>
                                    <td><?php echo $data['tgl_lahir'] ?></td>
                                    <td><?php echo $jk; ?></td>
                                    <td><?php echo $data['prodi'] ?></td>
                                    <td>
                                        <a href="?page=anggota&aksi=ubah&nim=<?php echo $data['nim']; ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil-square fa-2x"></i></a>
                                        <a onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" href="?page=anggota&aksi=hapus&nim=<?php echo $data['nim']; ?>" class="btn btn-danger "><b>Hapus</b></a>
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