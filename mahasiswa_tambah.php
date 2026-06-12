<?php
include 'koneksi.php';
// MENGGUNAKAN NAVBAR, BUKAN INDEX.PHP AGAR BIODATA BERANDA TIDAK IKUT MUNCUL
include 'navbar.php'; 

// Mengambil list jurusan dari database untuk isi dropdown select
$jurusan_res = mysqli_query($koneksi, "SELECT * FROM jurusan");

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mahasiswa'];
    $jk = $_POST['jenis_kelamin'];
    $id_jurusan = $_POST['id_jurusan'];
    
    // Proses Upload File Foto Mahasiswa
    $foto_name = $_FILES['foto']['name'];
    $foto_tmp  = $_FILES['foto']['tmp_name'];
    
    if(!empty($foto_name)) {
        $ekstensi = pathinfo($foto_name, PATHINFO_EXTENSION);
        $foto_baru = $nim . "_" . time() . "." . $ekstensi; // Rename file unik berdasarkan NIM dan waktu
        move_uploaded_file($foto_tmp, "uploads/" . $foto_baru);
    } else {
        $foto_baru = NULL;
    }

    // POINT QUERY DEMO: Menyimpan record mahasiswa baru ke database beserta nama file fotonya
    $query = "INSERT INTO mahasiswa (nim, nama_mahasiswa, jenis_kelamin, id_jurusan, foto) 
              VALUES ('$nim', '$nama', '$jk', '$id_jurusan', '$foto_baru')";
              
    if (mysqli_query($koneksi, $query)) { 
        echo "<script>window.location.href='mahasiswa.php';</script>";
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}
?>

<div class="container" style="max-width: 600px;">
    <h2>Tambah Data Mahasiswa</h2>
    
    <form action="" method="POST" enctype="multipart/form-data" style="margin-top: 20px;">
        
        <div style="margin-bottom: 20px;">
            <label style="display:block; font-weight: 600; margin-bottom: 8px; color: var(--primary);">NIM</label>
            <input type="text" name="nim" placeholder="Masukkan NIM..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; font-weight: 600; margin-bottom: 8px; color: var(--primary);">Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" placeholder="Masukkan Nama Lengkap..." style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; font-weight: 600; margin-bottom: 8px; color: var(--primary);">Jenis Kelamin</label>
            <div style="display: flex; gap: 20px; align-items: center; padding: 5px 0;">
                <label style="font-weight: normal; cursor: pointer;">
                    <input type="radio" name="jenis_kelamin" value="L" checked style="cursor: pointer;"> Laki-laki
                </label>
                <label style="font-weight: normal; cursor: pointer;">
                    <input type="radio" name="jenis_kelamin" value="P" style="cursor: pointer;"> Perempuan
                </label>
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display:block; font-weight: 600; margin-bottom: 8px; color: var(--primary);">Jurusan</label>
            <select name="id_jurusan" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; background: white; box-sizing: border-box;" required>
                <option value="">-- Pilih Jurusan --</option>
                <?php while($j = mysqli_fetch_assoc($jurusan_res)) : ?>
                    <option value="<?= $j['id_jurusan']; ?>"><?= $j['nama_jurusan']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display:block; font-weight: 600; margin-bottom: 8px; color: var(--primary);">Foto Mahasiswa</label>
            <input type="file" name="foto" accept="image/*" style="width: 100%; padding: 5px 0;" required>
            <small style="color: #64748b; display: block; margin-top: 4px;">Format file wajib gambar (.jpg, .jpeg, .png)</small>
        </div>

        <div style="display: flex; gap: 10px; border-top: 1px solid #e2e8f0; padding-top: 20px;">
            <button type="submit" name="submit" class="btn btn-add" style="margin: 0; padding: 10px 24px;">Simpan Data</button>
            <a href="mahasiswa.php" class="btn btn-detail" style="background-color: #64748b; padding: 10px 24px; display: flex; align-items: center;">Kembali</a>
        </div>
    </form>
</div>

<script>
    // Tetap menyalakan indikator aktif pada menu Data Mahasiswa di Navbar
    document.getElementById('nav-mahasiswa').classList.add('active');
</script>
</body>
</html>