<?php

session_start();

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include 'function.php';

$conn = mysqli_connect('localhost', 'root', '', 'perpus') or die('database tidak terhubung!');

if ($_SESSION['admin'] || $_SESSION['user']) {



?>



    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="../assets/img/logo2.png">

        <title>Perpustakaan Digital</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <!-- TABLE STYLES-->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style="background-color: cyan; color: black; font-family: monospace;" href="index.php"><img src="../assets/img/logo1.png" width="30px"> E-PERPUS</a>
                </div>
                <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &copy; Copyright <b style="color: orange;">Jeruk</b> Rekayasa Perangkat Lunak </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="../assets/img/logo2.png" class="user-image img-responsive" />
                        </li>


                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-2x"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="?page=anggota"><i class="fa fa-user fa-2x"></i>Profil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-2x"></i>Pilih Buku 
                            
                            <i class="fa fa-arrow-down"></i></a>
                            <ul class="nav">
                                <li>
                                    <a href="?page=kategori&aksi=novel"><i class="fa fa-list"></i>Novel</a>
                                </li>
                                <li>
                                    <a href="?page=kategori&aksi=pengetahuan"><i class="fa fa-list"></i>Pengetahuan</a>
                                </li>
                                <li>
                                    <a href="?page=kategori&aksi=komik"><i class="fa fa-list"></i>Komik</a>
                                </li>
                                <li>
                                    <a href="?page=kategori&aksi=humor"><i class="fa fa-list"></i>Humor</a>
                                </li>
                                <li>
                                    <a href="?page=kategori&aksi=fantasi"><i class="fa fa-list"></i>Fantasi</a>
                                </li>
                                <li>
                                    <a href="?page=kategori&aksi=sci-fi"><i class="fa fa-list"></i>Sci-Fi</a>
                                </li>
                                <li>
                                    <a href="?page=kategori&aksi=horror"><i class="fa fa-list"></i>Horror</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?page=favorit"><i class="fa fa-star fa-2x"></i>Favorit</a>
                        </li>
                        <li>
                            <a href="../logout.php" onclick="return confirm('Are you sure want to logout?')"><i class="fa fa-sign-out fa-2x"></i>Logout</a>
                        </li>
                    </ul>

                </div>

            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">

                            <?php

                            $page = $_GET['page'];
                            $aksi = $_GET['aksi'];


                            if ($page == "buku") {
                                if ($aksi == "") {
                                    include "page/buku/buku.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/buku/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/buku/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/buku/hapus.php";
                                }
                            } elseif ($page == "anggota") {
                                if ($aksi == "") {
                                    include "page/anggota/anggota.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/anggota/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/anggota/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/anggota/hapus.php";
                                }
                            } elseif ($page == "favorit") {
                                if ($aksi == "") {
                                    include "favorit/favorit.php";
                                } 
                            } elseif ($page == "kategori") {
                                if ($aksi == "novel") {
                                    include "kategori/novel.php";
                                } elseif ($aksi == "horror") {
                                    include "kategori/horror.php";
                                } elseif ($aksi == "humor") {
                                    include "kategori/humor.php";
                                } elseif ($aksi == "fantasi") {
                                    include "kategori/fantasi.php";
                                } elseif ($aksi == "sci-fi") {
                                    include "kategori/sci-fi.php";
                                } elseif ($aksi == "pengetahuan") {
                                    include "kategori/pengetahuan.php";
                                } elseif ($aksi == "komik") {
                                    include "kategori/komik.php";
                                } elseif ($aksi == "fav") {
                                    include "kategori/fav.php";
                                }
                            } elseif ($page == "") {
                                include "home.php";
                            }

                            ?>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />

                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- DATA TABLE SCRIPTS -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>
        <!-- SWEETALERT -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
         <!-- function -->
        <?php
        if (@$_SESSION['sukses']) { ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'data berhasil dihapus',
                    timer: 3000,
                    showConfirmButton: false
                })
            </script>
        <?php
            unset($_SESSION['sukses']);
        }
        ?>

        <!-- return confirm -->
        <script>
            $('.alert_notif').on('click',function(){
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Yakin ingin hapus data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '$d33',
                    confirmButtonText: 'Ya',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Batal"

                }).then(result => {
                    //jika klik ya maka mengarahkan ke proses.php
                    if(result.isConfirmed){
                        window.location.href = getLink
                    }
                })
                return false;
            })
        </script>

        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>


    </body>

    </html>

<?php

} else {
    header("location:login.php");
}

?>