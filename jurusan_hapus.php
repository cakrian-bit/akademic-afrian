<?php
include 'koneksi.php';
$id = $_GET['id'];
// POINT QUERY DEMO: Delete dari tabel jurusan
mysqli_query($koneksi, "DELETE FROM jurusan WHERE id_jurusan = '$id'");
header("Location: jurusan.php");
?>