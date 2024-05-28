<div class="card border border-primary">
	<div class="card-header bg-primary text-white">List Data Mahasiswa</div>
	<div class="card-body">
		<div class="button-container">
			<form action="<?php echo site_url('mahasiswa/search_mahasiswa'); ?>"
				  method="post">
				<input class="form-control" type="text" value="<?php echo
				isset($keyword)?$keyword:''?>" name="keyword" placeholder="Cari Nama Mahasiswa">
				<button class="btn btn-primary mt-2" type="submit">Cari</button>
				<button class="btn btn-success mt-2"
						onclick="window.location.href='<?php echo base_url('mahasiswa/data_mahasiswa');
						?>'"
						type="button">Reset</button>
			</form>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-hover mt-3">
				<thead>
				<tr class="table-primary">
					<th class="text-center">ID</th>
					<th class="text-center">Nama</th>
					<th class="text-center">NPM</th>
					<th class="text-center">Angkatan</th>
					<th class="text-center">Kelas</th>
					<th class="text-center">Alamat</th>
					<th class="text-center">Mata Kuliah Favorit</th>
					<th class="text-center">Email</th>
					<th class="text-center">Jenis Kelamin</th>
					<th class="text-center">Tanggal Lahir</th>
				</tr>
				</thead>
				<?php foreach ($mahasiswa as $mhs) { ?>
					<tbody>
					<tr>
						<td><?php echo $mhs['id']; ?></td>
						<td><?php echo $mhs['nama']; ?></td>
						<td><?php echo $mhs['npm']; ?></td>
						<td><?php echo $mhs['angkatan']; ?></td>
						<td><?php echo $mhs['kelas']; ?></td>
						<td><?php echo $mhs['alamat']; ?></td>
						<td><?php echo $mhs['mata_kuliah_favorit']; ?></td>
						<td><?php echo $mhs['email']; ?></td>
						<td><?php echo $mhs['jenis_kelamin']; ?></td>
						<td><?php echo $mhs['tanggal_lahir']; ?></td>
					</tr>
					</tbody>
				<?php } ?>
			</table>
		</div>
	</div>
</div>
