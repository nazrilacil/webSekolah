<?php 

	include '../koneksi.php';

	if(isset($_GET['idpengguna'])){

		$delete = mysqli_query($conn, "DELETE FROM pengguna WHERE id = '".$_GET['idpengguna']."' ");
		echo "<script>window.location = 'pengguna.php'</script>";

	}

	if(isset($_GET['idjurusan'])){

		$jurusan = mysqli_query($conn, "SELECT gambar FROM jurusan WHERE id = '".$_GET['idjurusan']."' ");

		if(mysqli_num_rows($jurusan) > 0){

			$p = mysqli_fetch_object($jurusan);

			if(file_exists("../uploads/jurusan/".$p->gambar)){

				unlink("../uploads/jurusan/".$p->gambar);

			}

		}

		$delete = mysqli_query($conn, "DELETE FROM jurusan WHERE id = '".$_GET['idjurusan']."' ");
		echo "<script>window.location = 'jurusan.php'</script>";

	}

	if(isset($_GET['idgaleri'])){

		$galeri = mysqli_query($conn, "SELECT foto FROM galeri WHERE id = '".$_GET['idgaleri']."' ");

		if(mysqli_num_rows($galeri) > 0){

			$p = mysqli_fetch_object($galeri);

			if(file_exists("../uploads/galeri/".$p->foto)){

				unlink("../uploads/galeri/".$p->foto);

			}

		}

		$delete = mysqli_query($conn, "DELETE FROM galeri WHERE id = '".$_GET['idgaleri']."' ");
		echo "<script>window.location = 'galeri.php'</script>";

	}
	if(isset($_GET['idslider'])){
		$id = intval($_GET['idslider']);

		$query = " SELECT image FROM sliders WHERE id = $id";
		$slider = mysqli_query($conn, $query);

		if (mysqli_num_rows($slider) > 0 ) {
			$p = mysqli_fetch_object($slider);

			$filePath = '../uploads/' . $p->image;

			if (file_exists($filePath)) {
				unlink($filePath);
			}

			// Hapus data dari tabel
			$delete = mysqli_query($conn, "DELETE FROM sliders WHERE id = $id");

			if ($delete) {
				echo "<script>alert('Slider berhasil dihapus'); window.location = 'slider.php'</script>";
			} else {
				echo "<script>alert('Slider gagal dihapus'); window.location = 'slider.php'</script>";
			}
		} else {
				echo "<script>alert('Slider tidak ditemukan'); window.location = 'slider.php'</script>";
		}

	}

	if(isset($_GET['idinformasi'])){

		$informasi = mysqli_query($conn, "SELECT gambar FROM informasi WHERE id = '".$_GET['idinformasi']."' ");

		if(mysqli_num_rows($informasi) > 0){

			$p = mysqli_fetch_object($informasi);

			if(file_exists("../uploads/informasi/".$p->gambar)){

				unlink("../uploads/informasi/".$p->gambar);

			}

		}

		$delete = mysqli_query($conn, "DELETE FROM informasi WHERE id = '".$_GET['idinformasi']."' ");
		echo "<script>window.location = 'informasi.php'</script>";

	}

?>