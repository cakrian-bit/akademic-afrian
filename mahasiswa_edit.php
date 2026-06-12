<?php
include 'koneksi.php';
$nim_get = $_GET['nim'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim_get'"));
$jurusan_res = mysqli_query($koneksi, "SELECT * FROM jurusan");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_mahasiswa'];
    $jk = $_POST['jenis_kelamin'];
    $id_jurusan = $_POST['id_jurusan'];
    
    $foto_name = $_FILES['foto']['name'];
    $foto_tmp  = $_FILES['foto']['tmp_name'];
    
    if(!empty($foto_name)) {
        $ekstensi = pathinfo($foto_name, PATHINFO_EXTENSION);
        $foto_baru = $nim_get . "_" . time() . "." . $ekstensi;
        move_uploaded_file($foto_tmp, "uploads/" . $foto_baru);
        
        // Hapus foto lama jika ada fisiknya di folder
        if($data['foto'] && file_exists("uploads/".$data['foto'])) { unlink("uploads/".$data['foto']); }
    } else {
        $foto_baru = $data['foto']; // Gunakan foto lama jika tidak ganti
    }

    // POINT QUERY DEMO: Update record mahasiswa
    $query = "UPDATE mahasiswa SET nama_mahasiswa='$nama', jenis_kelamin='$jk', id_jurusan='$id_jurusan', foto='$foto_baru' WHERE nim='$nim_get'";
    if (mysqli_query($koneksi, $query)) { header("Location: mahasiswa.php"); }
}
?>
<?php include 'index.php'; ?>
<div class="container" style="max-width: 500px; margin-top: -20px;">
    <h2>Edit Data Mahasiswa</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label style="display:block; margin: 10px 0 5px;">NIM (Kunci Utama)</label>
        <input type="text" value="<?= $data['nim']; ?>" style="width:100%; padding:8px; margin-bottom:15px; background:#e2e8f0;" disabled>

        <label style="display:block; margin: 10px 0 5px;">Nama Mahasiswa</label>
        <input type="text" name="nama_mahasiswa" value="<?= $data['nama_mahasiswa']; ?>" style="width:100%; padding:8px; margin-bottom:15px;" required>

        <label style="display:block; margin: 10px 0 5px;">Jenis Kelamin</label>
        <input type="radio" name="jenis_kelamin" value="L" <?= $data['jenis_kelamin']=='L'?'checked':''; ?>> Laki-laki
        <input type="radio" name="jenis_kelamin" value="P" <?= $data['jenis_kelamin']=='P'?'checked':''; ?>> Perempuan

        <label style="display:block; margin: 15px 0 5px;">Jurusan</label>
        <select name="id_jurusan" style="width:100%; padding:8px; margin-bottom:15px;" required>
            <?php while($j = mysqli_fetch_assoc($jurusan_res)) : ?>
                <option value="<?= $j['id_jurusan']; ?>" <?= $j['id_jurusan']==$data['id_jurusan']?'selected':''; ?>><?= $j['nama_jurusan']; ?></option>
            <?php endwhile; ?>
        </select>

        <label style="display:block; margin: 10px 0 5px;">Ganti Foto (Kosongkan jika tidak diubah)</label>
        <input type="file" name="foto" accept="image/*" style="margin-bottom:20px;">

        <div>
            <button type="submit" name="submit" class="btn btn-add">Update</button>
            <a href="mahasiswa.php" class="btn btn-detail">Kembali</a>
        </div>
    </form>
</div>
</body></html>