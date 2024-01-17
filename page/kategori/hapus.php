<?php 

$id_kategori = $_GET['id_kategori'];

session_start();

$conn->query("DELETE FROM tb_kategori WHERE id_kategori='$id_kategori'");

//set session sukses
$_SESSION["sukses"] = 'Data Berhasil Hapus';

//redirect ke halaman index.php
header('Location: ?page=kategori');


?>

<!-- <script type="text/javascript">
    window.location.href="?page=kategori";
</script> -->