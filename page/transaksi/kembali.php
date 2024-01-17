<?php 

$id_pinjam = $_GET['id_pinjam'];
$judul = $_GET['judul'];

$sql = $conn->query("UPDATE tb_pinjam SET status='kembali' WHERE id_pinjam='$id_pinjam'");

$sql = $conn->query("UPDATE tb_buku set jumlah_buku = (jumlah_buku+1) WHERE judul='$judul'");

?>

    <script type="text/javascript">
        alert('Berhasil Mengembalikan Buku!!');
        window.location.href="?page=transaksi";
    </script>

<?php




?>