<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register - Sistem Pendaftaran</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">
  <div class="card" style="max-width: 400px; margin: 50px auto;">
    <h2 style="text-align:center;">Daftar Akun</h2>

    <?php if (!empty($data['error'])): ?>
      <p class="error-msg"><?= $data['error']; ?></p>
    <?php endif; ?>

    <form class="form" method="POST" action="/register/store">
      <div class="row">
        <label>Username</label>
        <input type="text" name="username" required>
      </div>
      <div class="row">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>
      <button type="submit" class="btn">Daftar</button>
    </form>
  </div>
</div>
</body>
</html>
