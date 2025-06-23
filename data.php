<?php
include 'koneksi.php';

$data = [];

$informasi = mysqli_query($conn, "SELECT * FROM informasi");
while ($row = mysqli_fetch_assoc($informasi)) {
    $fileImg = "uploads/informasi/" . $row['gambar'];
    $data[] = [
        'id' => $row['id'],
        'tipe' => 'informasi',
        'judul' => $row['judul'],
        'keterangan' => $row['keterangan'],
        'gambar' => $fileImg
    ];
}

$jurusan = mysqli_query($conn, "SELECT * FROM jurusan");
while ($row = mysqli_fetch_assoc($jurusan)) {
    $filePath = "uploads/jurusan/" . $row['gambar'];
    $data[] = [
        'id' => $row['id'],
        'tipe' => 'jurusan',
        'judul' => $row['nama'],
        'keterangan' => $row['keterangan'],
        'gambar' => $filePath
    ];
}
$galeri = mysqli_query($conn, "SELECT * FROM galeri");
while ($row = mysqli_fetch_assoc($galeri)) {
    $fileFoto = "uploads/galeri/" . $row['foto'];
    $data[] = [
        'id' => $row['id'],
        'tipe' => 'gambar',
        'judul' => $row['keterangan'],
        'keterangan' => $row['created_at'],
        'gambar' => $fileFoto
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
?>
