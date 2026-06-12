<?php 
include 'koneksi.php'; 
include 'navbar.php'; 

// POINT QUERY DEMO: Mengambil seluruh baris data dari tabel jurusan
$query = "SELECT * FROM jurusan";
$result = mysqli_query($koneksi, $query);
?>

<div class="container">
    <h2> Data Jurusan</h2>
    <a href="jurusan_tambah.php" class="btn btn-add">+ Tambah Jurusan</a>
    
    <table style="border-radius: 8px; overflow: hidden; box-shadow: 0 0 0 1px #40444b;">
        <thead>
            <tr>
                <th style="width: 60px;">No</th>
                <th>Nama Jurusan</th>
                <th>Akreditasi</th>
                <th style="width: 180px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_jurusan']; ?></td>
                <td>
                    <span style="background: #e2e8f0; color: #111827; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 700;">
                        <?= $row['akreditasi']; ?>
                    </span>
                </td>
                <td style="text-align: center;">
                    <a href="jurusan_edit.php?id=<?= $row['id_jurusan']; ?>" class="btn btn-edit">Edit</a>
                    <a href="jurusan_hapus.php?id=<?= $row['id_jurusan']; ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus jurusan ini?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
    // Script untuk mengaktifkan class active di menu Data Jurusan
    document.getElementById('nav-jurusan').classList.add('active');
</script>
</body>
</html>