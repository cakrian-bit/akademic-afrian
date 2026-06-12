<?php 
include 'koneksi.php'; 
include 'navbar.php'; 

// POINT QUERY DEMO: Menghubungkan tabel mahasiswa dengan tabel jurusan (LEFT JOIN)
$query = "SELECT mahasiswa.*, jurusan.nama_jurusan 
          FROM mahasiswa 
          LEFT JOIN jurusan ON mahasiswa.id_jurusan = jurusan.id_jurusan";
$result = mysqli_query($koneksi, $query);
?>

<div class="container">
    <h2> Data Mahasiswa</h2>
    <a href="mahasiswa_tambah.php" class="btn btn-add">+ Tambah Mahasiswa</a>
    
    <table style="border-radius: 8px; overflow: hidden; box-shadow: 0 0 0 1px #e2e8f0;">
        <thead>
            <tr>
                <th style="width: 60px;">No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>L/P</th>
                <th>Nama Jurusan</th>
                <th style="width: 240px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><strong><?= $row['nim']; ?></strong></td>
                <td><?= $row['nama_mahasiswa']; ?></td>
                <td><?= $row['jenis_kelamin']; ?></td>
                <td><?= $row['nama_jurusan'] ?? '<em style="color:#94a3b8;">Belum Pilih Jurusan</em>'; ?></td>
                <td style="text-align: center;">
                    <a href="mahasiswa_edit.php?nim=<?= $row['nim']; ?>" class="btn btn-edit">Edit</a>
                    <a href="mahasiswa_hapus.php?nim=<?= $row['nim']; ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?')">Delete</a>
                    <a href="mahasiswa_detail.php?nim=<?= $row['nim']; ?>" class="btn btn-detail">Detail</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
    // Script untuk mengaktifkan class active di menu Data Mahasiswa
    document.getElementById('nav-mahasiswa').classList.add('active');
</script>
</body>
</html>