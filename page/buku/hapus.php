<?php 

$id_buku = $_GET['id_buku'];

$conn->query("DELETE FROM tb_buku WHERE id_buku='$id_buku'");


?>

<script type="text/javascript">
    window.location.href="?page=buku";
</script>