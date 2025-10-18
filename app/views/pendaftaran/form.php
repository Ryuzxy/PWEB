<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran</title>
  <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
  <div class="container">
    <h2>Form Pendaftaran</h2>

    <form action="/pendaftaran/submit" method="POST" enctype="multipart/form-data">
      <label>Nama:</label><br>
      <input type="text" name="nama" required><br><br>

      <label>Jenis Kelamin:</label><br>
      <select name="jenis_kelamin" required>
        <option value="">-- Pilih --</option>
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
      </select><br><br>

      <label>Tanggal Lahir:</label><br>
      <input type="text" id="tanggal_lahir" name="tanggal_lahir" placeholder="Pilih tanggal" required><br><br>

      <label>Upload Foto:</label><br>
      <input type="file" name="foto" accept="image/*" required><br><br>

      <label>Tanda Tangan:</label><br>
      <canvas id="signature-pad" width="400" height="150" style="border:1px solid #000"></canvas><br>
      <button type="button" id="clear">Hapus</button>
      <input type="hidden" name="tanda_tangan" id="tanda_tangan"><br><br>

      <button type="submit">Kirim</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    flatpickr("#tanggal_lahir", {
      dateFormat: "d-m-Y",
      altInput: true,
      altFormat: "j F Y",
      maxDate: "today",
      locale: {
        firstDayOfWeek: 1,
        weekdays: {
          shorthand: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
          longhand: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        },
        months: {
          shorthand: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
          longhand: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        },
      }
    });
  </script>

  <script src="/js/signature.js"></script>
</body>
</html>
