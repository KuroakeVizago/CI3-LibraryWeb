<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Hasil Input Data Mahasiswa</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			padding: 20px;
		}

		h1 {
			color: #333;
			text-align: center;
		}

		.result-container {
			background-color: #fff;
			border: 1px solid #ddd;
			border-radius: 5px;

			padding: 20px;
			margin: 0 auto;
			max-width: 500px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}

		.result-container p {
			margin: 10px 0;
			font-size: 16px;
		}

		.result-container p:first-child {
			margin-top: 0;
		}

		.result-container p:last-child {
			margin-bottom: 0;
		}
	</style>
</head>

<body>
	<div class="result-container">
		<h1>Hasil Input Data Mahasiswa</h1>
		<p><strong>Nama:</strong> <?php echo $nama; ?></p>
		<p><strong>NPM:</strong> <?php echo $npm; ?></p>
		<p><strong>Angkatan:</strong> <?php echo $angkatan; ?></p>
		<p><strong>Kelas:</strong> <?php echo $kelas; ?></p>
		<p><strong>Alamat:</strong> <?php echo $alamat; ?></p>
		<p><strong>Mata Kuliah Favorit:</strong> <?php echo
													$mata_kuliah; ?></p>
	</div>
</body>

</html>
