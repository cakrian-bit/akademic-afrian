<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan = '$id'"));

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_jurusan'];
    $akreditasi = $_POST['akreditasi'];
    // POINT QUERY DEMO: Update tabel jurusan berdasarkan id_jurusan
    $query = "UPDATE jurusan SET nama_jurusan='$nama', akreditasi='$akreditasi' WHERE id_jurusan='$id'";
    if (mysqli_query($koneksi, $query)) { header("Location: jurusan.php"); }
}
?>
<?php include 'index.php'; ?>
<div class="container" style="max-width: 500px; margin-top: -20px;">
    <h2>Edit Data Jurusan</h2>
    <form action="" method="POST">
        <label style="display:block; margin: 10px 0 5px;">Nama Jurusan</label>
        <input type="text" name="nama_jurusan" value="<?= $data['nama_jurusan']; ?>" style="width:100%; padding:8px; margin-bottom:15px;" required>
        
        <label style="display:block; margin: 10px 0 5px;">Akreditasi</label>
        <select name="akreditasi" style="width:100%; padding:8px; margin-bottom:20px;" required>
            <option value="Unggul" <?= $data['akreditasi'] == 'Unggul' ? 'selected' : ''; ?>>Unggul</option>
            <option value="Baik Sekali" <?= $data['akreditasi'] == 'Baik Sekali' ? 'selected' : ''; ?>>Baik Sekali</option>
            <option value="Baik" <?= $data['akreditasi'] == 'Baik' ? 'selected' : ''; ?>>Baik</option>
        </select>
        <button type="submit" name="submit" class="btn btn-add" style="margin:0;">Update</button>
        <a href="jurusan.php" class="btn btn-detail">Kembali</a>
    </form>
</div>
</body></html>