<?php
include 'koneksi.php';
include 'navbar.php';

// Menangkap parameter NIM dari URL saat tombol detail diklik
$nim_get = $_GET['nim'];

// POINT QUERY DEMO: Mengambil data 1 mahasiswa secara spesifik dan merelasikannya dengan tabel jurusan
$query = "SELECT mahasiswa.*, jurusan.nama_jurusan 
          FROM mahasiswa 
          LEFT JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan 
          WHERE mahasiswa.nim = '$nim_get'";
          
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>

<div class="container">
    <h2>Halaman Detail</h2>
    
    <div style="display: flex; gap: 40px; align-items: flex-start; margin-top: 30px; background: #282c34; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
        
        <div style="text-align: center;">
            <p style="margin-top: 0; font-weight: 600; color: var(--primary); margin-bottom: 12px;">Foto Mahasiswa</p>
            <?php if(!empty($data['foto']) && file_exists("uploads/".$data['foto'])) : ?>
                <img src="uploads/<?= $data['foto']; ?>" alt="Foto <?= $data['nama_mahasiswa']; ?>" style="width: 150px; height: 190px; object-fit: cover; border-radius: 8px; border: 4px solid white; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
            <?php else : ?>
                <img src="https://via.placeholder.com/150x190?text=No+Image" alt="No Image" style="width: 150px; height: 190px; object-fit: cover; border-radius: 8px; border: 4px solid white; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);">
            <?php endif; ?>
        </div>
        
        <div style="flex-grow: 1;">
            <table style="margin: 0; box-shadow: none; width: 100%;">
                <tr style="background: transparent; border-bottom: 1px solid #e2e8f0;">
                    <td style="width: 140px; font-weight: bold; padding: 12px 0; color: var(--primary);">NIM</td>
                    <td style="padding: 12px 0;">: <?= $data['nim']; ?></td>
                </tr>
                <tr style="background: transparent; border-bottom: 1px solid #e2e8f0;">
                    <td style="font-weight: bold; padding: 12px 0; color: var(--primary);">Nama</td>
                    <td style="padding: 12px 0;">: <?= $data['nama_mahasiswa']; ?></td>
                </tr>
                <tr style="background: transparent; border-bottom: 1px solid #e2e8f0;">
                    <td style="font-weight: bold; padding: 12px 0; color: var(--primary);">Jenis Kelamin</td>
                    <td style="padding: 12px 0;">: <?= $data['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
                </tr>
                <tr style="background: transparent; border: none;">
                    <td style="font-weight: bold; padding: 12px 0; color: var(--primary);">Jurusan</td>
                    <td style="padding: 12px 0;">: <?= $data['nama_jurusan'] ?? '<em style="color:#94a3b8;">Belum Pilih Jurusan</em>'; ?></td>
                </tr>
            </table>
        </div>
        
    </div>
    
    <div style="margin-top: 25px; text-align: left;">
        <a href="mahasiswa.php" class="btn btn-detail" style="background-color: #64748b;">← Kembali ke Data Mahasiswa</a>
    </div>
</div>

<script>
    // Memastikan tab menu Data Mahasiswa tetap aktif menyala biru
    document.getElementById('nav-mahasiswa').classList.add('active');
</script>
</body>
</html>