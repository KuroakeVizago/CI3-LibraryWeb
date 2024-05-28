	<h1>Data Mahasiswa</h1>
	<form method="get">
		<input type="text" required name="keyword" placeholder="Cari mahasiswa berdasarkan nama..." value="<?= $keyword ?>">
		<button type="submit">Cari</button>
		<button onclick="window.location.href='<?php echo base_url('/'); ?>'" type="button">Reset</button>
	</form>
	<table border="1">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nama</th>
				<th>NPM</th>
				<th>Angkatan</th>
				<th>Kelas</th>
				<th>Alamat</th>
				<th>Mata Kuliah Favorit</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($mahasiswa as $mhs) : ?>
				<tr>
					<td><?php echo $mhs['id']; ?></td>
					<td><?php echo $mhs['nama']; ?></td>
					<td><?php echo $mhs['npm']; ?></td>
					<td><?php echo $mhs['angkatan']; ?></td>
					<td><?php echo $mhs['kelas']; ?></td>
					<td><?php echo $mhs['alamat']; ?></td>
					<td><?php echo $mhs['mata_kuliah_favorit']; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
