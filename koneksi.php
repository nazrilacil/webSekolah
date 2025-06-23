<?php 
	$conn = mysqli_connect('localhost', 'root', '', 'db_sekolah') or die ('Gagal terhubung ke database');
    $identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_object($identitas);
?>