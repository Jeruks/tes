
<a href="?page=transaksi&aksi=tambah" class="btn btn-success" style="margin-bottom: 5px;"><i class="fa fa-plus"></i> Tambah Data</a>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Peminjaman
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Terlambat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            $sql = $conn->query("SELECT * FROM tb_pinjam WHERE status='pinjam'");

                            while ($data = $sql->fetch_assoc()) {

                            


                            ?>

                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['judul'] ?></td>
                                    <td><?php echo $data['nim'] ?></td>
                                    <td><?php echo $data['nama'] ?></td>
                                    <td><?php echo $data['tgl_pinjam'] ?></td>
                                    <td><?php echo $data['tgl_kembali'] ?></td>
                                    <td>
                                        <?php 
                                        
                                            $denda = 1000;

                                            $tgl_dateline = $data['tgl_kembali'];
                                            $tgl_kembali = date('Y-m-d');

                                            $lambat = terlambat($tgl_dateline, $tgl_kembali);
                                            $denda1 = $lambat*$denda;

                                            if($lambat>0) {
                                                echo "
                                                    <font color='red'>$lambat hari<br>(Rp $denda1)</font>
                                                ";
                                            }else{
                                                echo $lambat ."Hari";
                                            }
                                        
                                        ?>
                                    </td>
                                    <td><?php echo $data['status'] ?></td>
                                    <td>
                                        <a href="?page=transaksi&aksi=kembali&id_pinjam=<?php echo $data['id_pinjam']; ?>&judul=<?php echo $data['judul']; ?>" class="btn btn-info">Kembali</a>
                                        <a href="?page=transaksi&aksi=perpanjang&id_pinjam=<?php echo $data['id_pinjam']; ?>&judul=<?php echo $data['judul']; ?>&lambat=<?php echo $lambat ?>&tgl_kembali=<?php echo $data['tgl_kembali'] ?>" class="btn btn-danger "><b>Perpanjang</b></a>
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