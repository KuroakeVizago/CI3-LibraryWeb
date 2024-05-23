<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Input Data Mahasiswa</title>
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

		form {
			background-color: #fff;
			border: 1px solid #ddd;
			border-radius: 5px;
			padding: 20px;
			margin: 0 auto;
			max-width: 500px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}

		label {
			font-weight: bold;
		}

		input[type="text"],
		textarea {

			width: calc(100% - 20px);
			padding: 8px;
			margin-top: 5px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		textarea {
			height: 100px;
			resize: vertical;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}

		.error {
			color: red;
			font-size: 12px;
			margin-top: -5px;
			margin-left: 5px;
		}
	</style>
</head>

<body>
	<h1>Input Data Mahasiswa</h1>
	<?php echo form_open(
		base_url('mahasiswa/show_result'),
		'method="post"'
	); ?>
	<label for="nama">Nama:</label>
	<?php echo form_input('nama', set_value('nama')); ?>
	<?php echo form_error(
		'nama',
		'<div class="error">',
		'</div>'
	); ?><br>
	<label for="npm">NPM:</label>
	<?php echo form_input('npm', set_value('npm')); ?>
	<?php echo form_error('npm', '<div class="error">', '</div>');
	?><br>
	<label for="angkatan">Angkatan:</label>

	<?php echo form_input('angkatan', set_value('angkatan')); ?>
	<?php echo form_error(
		'angkatan',
		'<div class="error">',
		'</div>'
	); ?><br>
	<label for="kelas">Kelas:</label>
	<?php echo form_input('kelas', set_value('kelas')); ?>
	<?php echo form_error(
		'kelas',
		'<div class="error">',
		'</div>'
	); ?><br>
	<label for="alamat">Alamat:</label>
	<?php echo form_textarea('alamat', set_value('alamat')); ?>
	<?php echo form_error(
		'alamat',
		'<div class="error">',
		'</div>'
	); ?><br>
	<label for="mata_kuliah">Mata Kuliah Favorit:</label>
	<?php echo form_input(
		'mata_kuliah',
		set_value('mata_kuliah')
	); ?>
	<?php echo form_error(
		'mata_kuliah',
		'<div class="error">',
		'</div>'
	); ?><br>
	<?php echo form_submit('submit', 'Tampilkan'); ?>
	<?php echo form_close(); ?>
</body>

</html>
