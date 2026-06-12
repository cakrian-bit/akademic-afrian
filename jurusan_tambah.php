<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama_jurusan'];
    $akreditasi = $_POST['akreditasi'];
    // POINT QUERY DEMO: Insert ke tabel jurusan
    $query = "INSERT INTO jurusan (nama_jurusan, akreditasi) VALUES ('$nama', '$akreditasi')";
    
    if (mysqli_query($koneksi, $query)) { 
        // Menggunakan JavaScript redirect agar perpindahan halaman mulus dan aman dari bug header
        echo "<script>window.location.href='jurusan.php';</script>"; 
        exit;
    }
}
?>
<?php include 'navbar.php'; ?>

<div class="container" style="max-width: 600px;">
    <h2>Tambah Data Jurusan</h2>
    
    <form action="" method="POST" style="margin-top: 20px;">
        <div style="margin-bottom: 20px;">
            <label style="display:block; font-weight: 600; margin-bottom: 8px; color: var(--primary);">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" placeholder="Masukkan Nama Jurusan..." style="width:100%; padding:10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;" required>
        </div>
        
        <div style="margin-bottom: 25px;">
            <label style="display:block; font-weight: 600; margin-bottom: 8px; color: var(--primary);">Akreditasi</label>
            <select name="akreditasi" style="width:100%; padding:10px; border: 1px solid #cbd5e1; border-radius: 6px; background: white; box-sizing: border-box;" required>
                <option value="">-- Pilih Akreditasi --</option>
                <option value="Unggul">Unggul</option>
                <option value="Baik Sekali">Baik Sekali</option>
                <option value="Baik">Baik</option>
            </select>
        </div>
        
        <div style="display: flex; gap: 10px; border-top: 1px solid #e2e8f0; padding-top: 20px;">
            <button type="submit" name="submit" class="btn btn-add" style="margin:0; padding: 10px 24px;">Simpan</button>
            <a href="jurusan.php" class="btn btn-detail" style="background-color: #64748b; padding: 10px 24px; display: flex; align-items: center;">Kembali</a>
        </div>
    </form>
</div>

<script>
    // Memastikan tab menu Data Jurusan di Navbar tetap menyala biru (aktif)
    document.getElementById('nav-jurusan').classList.add('active');
</script>
</body>
</html>