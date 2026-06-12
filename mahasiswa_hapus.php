<?php
include 'koneksi.php';
$nim_get = $_GET['nim'];

// Ambil info data untuk hapus file fisik foto di storage
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto FROM mahasiswa WHERE nim = '$nim_get'"));
if($data['foto'] && file_exists("uploads/".$data['foto'])) { unlink("uploads/".$data['foto']); }

// POINT QUERY DEMO: Hapus record dari database
mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = '$nim_get'");
header("Location: mahasiswa.php");
?>