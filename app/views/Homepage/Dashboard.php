<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Sistem Pendaftaran</title>
  <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>
  <div class="container">

    <div class="header">
      <div class="brand">
        <h1>Dashboard</h1>
      </div>
      <a href="/login/logout" class="btn danger">Logout</a>
    </div>

    <div class="card">
      <h2>Selamat Datang, <?= htmlspecialchars($data['username']); ?> 👋</h2>
      <p class="keterangan">
        Ini adalah halaman utama dashboard Anda. Silakan pilih menu di bawah untuk melanjutkan.
      </p>

      <ul class="menu-list">
        <li>
          <span>📋 Tambah daftar pendaftar</span>
          <button class="btn secondary" onclick="window.location.href='/pendaftaran/form'">Tambah Data</button>
        </li>
        <li>
          <span>⚙️ Pengaturan akun</span>
          <button class="btn secondary" onclick="window.location.href='/'">Pengaturan Akun</button>
        </li>
      </ul>
    </div>

    <footer class="footer">
      <p>Hak Cipta &copy; <?= date('Y'); ?> Sistem Pendaftaran. Semua Hak Dilindungi.</p>
    </footer>

  </div>
</body>
</html>
