<?php 

$id_buku = $_GET['id_buku'];
$id_user = $_SESSION['user'];

$conn->query("INSERT INTO koleksi(id_user, id_buku) VALUES ('$id_user', '$id_buku')");

//redirect ke halaman index.php
header('Location: ?page=kategori&aksi=pengetahuan');


?>

<!-- <script type="text/javascript">
    window.location.href="?page=kategori";
</script> -->