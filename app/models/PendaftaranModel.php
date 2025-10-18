<?php
class PendaftaranModel {
    public function simpanData($data, $files) {
        $nama = $data['nama'];
        $jenis_kelamin = $data['jenis_kelamin'];

        // Upload foto
        $foto_name = time() . '_' . basename($files['foto']['name']);
        move_uploaded_file($files['foto']['tmp_name'], '../public/uploads/foto/' . $foto_name);

        // Simpan tanda tangan base64 (dari canvas)
        $tanda_tangan = $data['tanda_tangan'];
        $image = str_replace('data:image/png;base64,', '', $tanda_tangan);
        $image = base64_decode($image);
        $file_ttd = '../public/uploads/tanda_tangan/' . time() . '_ttd.png';
        file_put_contents($file_ttd, $image);

        // Simpan ke database (contoh, nanti bisa pakai PDO)
        // ...
    }
}
