<?php 

$nim = $_GET['nim'];

$conn->query("DELETE FROM tb_anggota WHERE nim='$nim'");


?>

<script type="text/javascript">
    window.location.href="?page=anggota";
</script>