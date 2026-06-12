<?php 
include 'koneksi.php'; 
include 'navbar.php'; 
?>

<div class="container">
    <h2> Beranda</h2>
    <p style="color: #64748b; margin-bottom: 20px;">Selamat datang di Sistem Informasi Manajemen Data Akademik. Berikut adalah profil pengembang aplikasi:</p>
    
    <div class="profile-card">
        <img src="uploads/rian.jpg" alt="Foto Diva Nanda Afrian" class="profile-img" onerror="this.src='https://via.placeholder.com/130x165?text=Foto+Profil'">
        <div class="profile-info">
            <table>
                <tr><td style="width: 80px;"><strong>NIM</strong></td><td>: 2502041322</td></tr>
                <tr><td><strong>Nama</strong></td><td>: Diva Nanda Afrian</td></tr>
                <tr><td><strong>Prodi</strong></td><td>: Informatika</td></tr>
                <tr><td><strong>Kelas</strong></td><td>: IF-B</td></tr>
            </table>
        </div>
    </div>
</div>

<script>
    // Script untuk mengaktifkan class active di menu Beranda
    document.getElementById('nav-beranda').classList.add('active');
</script>
</body>
</html>