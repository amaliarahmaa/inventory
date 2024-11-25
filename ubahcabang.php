<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"SELECT * FROM cabang WHERE id_cabang='$id'");
	$d = mysqli_fetch_array($data);
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Update Data Cabang</title>
		<!-- Tambahkan Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
	 
	<div class="container mt-5">
		<h2 class="text-center text-primary mb-4">Update Data Cabang</h2>
		<a href="datacabang.php" class="btn btn-secondary mb-3">Kembali</a>
		
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0">Form Update Data Cabang</h5>
			</div>
			<div class="card-body">
				<form method="post" action="editcabang.php">
					<div class="mb-3">
						<label for="nama_cabang" class="form-label">Nama Cabang</label>
						<input type="hidden" name="id_cabang" value="<?php echo $d['id_cabang']; ?>">
						<input type="text" name="nama_cabang" id="nama_cabang" class="form-control" value="<?php echo $d['nama_cabang']; ?>">
					</div>
					<div class="mb-3">
						<label for="alamat_cabang" class="form-label">Alamat Cabang</label>
						<input type="text" name="alamat_cabang" id="alamat_cabang" class="form-control" value="<?php echo $d['alamat_cabang']; ?>">
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>

	<!-- Tambahkan Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	</body>
	</html>
	<?php 
} else {
	echo "ID cabang tidak ditemukan.";
}
?>
