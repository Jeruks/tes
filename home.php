<marquee behavior="" direction="">
    <h2>
        <font color="cyan">Selamat Datang!!</font>
    </h2>
</marquee>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2>Admin Dashboard</h2>
            <h5>Welcome Admin , Love to see you back. </h5>
        </div>
    </div>
    <!-- /. ROW  -->
    <hr />
    <div class="row">
        <a href="?page=buku">
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-red set-icon">
                        <i class="fa fa-book"></i>
                    </span>
                    <div class="text-box">
                        <?php
                        $sql = "SELECT count(id_buku) as jumlah FROM tb_buku";
                        $query = mysqli_query($conn, $sql);
                        $r = mysqli_fetch_assoc($query);
                        echo "<p class='main-text'>" . $r['jumlah'] . "</p>";
                        ?>
                        <p class="text-muted">Total Buku</p>
                    </div>
                </div>
            </div>
        </a>
        <a href="?page=kategori">
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                    <div class="text-box">
                        <?php
                        $sql = "SELECT count(id_kategori) as jumlah FROM tb_kategori";
                        $query = mysqli_query($conn, $sql);
                        $r = mysqli_fetch_assoc($query);
                        echo "<p class='main-text'>" . $r['jumlah'] . "</p>";
                        ?>
                        <p class="text-muted">Kategori</p>
                    </div>
                </div>
            </div>
        </a>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">4</p>
                    <p class="text-muted">Peminjaman</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">3 Orders</p>
                    <p class="text-muted">Pending</p>
                </div>
            </div>
        </div>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;

                    $sql = $conn->query("SELECT * FROM tb_kategoribuku INNER JOIN tb_kategori ON tb_kategoribuku.id_kategori = tb_kategori.id_kategori INNER JOIN tb_buku ON tb_kategoribuku.id_buku = tb_buku.id_buku ORDER BY judul ASC");

                    while ($data = $sql->fetch_assoc()) {

                    ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['judul'] ?></td>
                            <td><?php echo $data['nama_kategori'] ?></td>
                        </tr>
                </tbody>
            <?php } ?>
            </table>
        </div>
    </div>