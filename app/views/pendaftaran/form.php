<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
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
    <input type="date" name="tanggal_lahir" required><br><br>
    
    <label>Upload Foto:</label><br>
    <input type="file" name="foto" accept="image/*" required><br><br>

    <label>Tanda Tangan:</label><br>
    <canvas id="signature-pad" width="400" height="150" style="border:1px solid #000"></canvas><br>
    <button type="button" id="clear">Hapus</button>
    <!-- <input type="hidden" name="tanda_tangan" id="tanda_tangan"><br><br> -->

    <button type="submit">Kirim</button>
</form>
<script src="/js/signature.js"></script>

</body>
</html>
