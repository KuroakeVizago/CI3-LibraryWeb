<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Barang</title>
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="shared/css/style.css">
</head>
<body>

<?php if ($this->session->flashdata('success')): ?>
	<div class="alert alert-success">
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
	<div class="alert alert-danger">
		<?php echo $this->session->flashdata('error'); ?>
	</div>
<?php endif; ?>

<div class="container">
	<div class="d-flex justify-content-between align-items-center my-4">
		<h1>Daftar Barang</h1>
		<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#createModal">Create</button>
	</div>
	<table class="table">
		<thead class="table-light">
		<tr>
			<th>No Barang</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Kategori Barang</th>
			<th>Deskripsi Barang</th>
			<th>Harga Beli</th>
			<th>Harga Jual</th>
			<th>Stok Barang</th>
			<th>Supplier Barang</th>
			<th>Tanggal Masuk</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$no_barang = 1; // Initialize the sequential number
		foreach ($barang as $item):
			?>
			<tr>
				<td><?php echo $no_barang++; ?></td>
				<td><?php echo $item['kode_barang']; ?></td>
				<td>
					<a href="#" class="item-name" data-bs-toggle="modal" data-bs-target="#editModal"
					   data-id="<?php echo $item['id_barang']; ?>"
					   data-kode="<?php echo $item['kode_barang']; ?>"
					   data-nama="<?php echo $item['nama_barang']; ?>"
					   data-kategori="<?php echo $item['kategori_barang']; ?>"
					   data-deskripsi="<?php echo $item['deskripsi_barang']; ?>"
					   data-harga-beli="<?php echo $item['harga_beli']; ?>"
					   data-harga-jual="<?php echo $item['harga_jual']; ?>"
					   data-stok="<?php echo $item['stok_barang']; ?>"
					   data-supplier="<?php echo $item['supplier_barang']; ?>"
					   data-tanggal="<?php echo $item['tanggal_masuk']; ?>">
						<?php echo $item['nama_barang']; ?>
					</a>
				</td>
				<td><?php echo $item['kategori_barang']; ?></td>
				<td><?php echo $item['deskripsi_barang']; ?></td>
				<td><?php echo $item['harga_beli']; ?></td>
				<td><?php echo $item['harga_jual']; ?></td>
				<td><?php echo $item['stok_barang']; ?></td>
				<td><?php echo $item['supplier_barang']; ?></td>
				<td><?php echo $item['tanggal_masuk']; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="editForm" method="POST" action="barang/update">
					<input type="hidden" name="id_barang" id="edit-id">
					<div class="mb-3">
						<label for="edit-kode" class="form-label">Kode Barang</label>
						<input type="text" class="form-control" id="edit-kode" name="kode_barang">
					</div>
					<div class="mb-3">
						<label for="edit-nama" class="form-label">Nama Barang</label>
						<input type="text" class="form-control" id="edit-nama" name="nama_barang">
					</div>
					<div class="mb-3">
						<label for="edit-kategori" class="form-label">Kategori Barang</label>
						<input type="text" class="form-control" id="edit-kategori" name="kategori_barang">
					</div>
					<div class="mb-3">
						<label for="edit-deskripsi" class="form-label">Deskripsi Barang</label>
						<textarea class="form-control" id="edit-deskripsi" name="deskripsi_barang"></textarea>
					</div>
					<div class="mb-3">
						<label for="edit-harga-beli" class="form-label">Harga Beli</label>
						<input type="number" class="form-control" id="edit-harga-beli" name="harga_beli">
					</div>
					<div class="mb-3">
						<label for="edit-harga-jual" class="form-label">Harga Jual</label>
						<input type="number" class="form-control" id="edit-harga-jual" name="harga_jual">
					</div>
					<div class="mb-3">
						<label for="edit-stok" class="form-label">Stok Barang</label>
						<input type="number" class="form-control" id="edit-stok" name="stok_barang">
					</div>
					<div class="mb-3">
						<label for="edit-supplier" class="form-label">Supplier Barang</label>
						<input type="text" class="form-control" id="edit-supplier" name="supplier_barang">
					</div>
					<div class="mb-3">
						<label for="edit-tanggal" class="form-label">Tanggal Masuk</label>
						<input type="date" class="form-control" id="edit-tanggal" name="tanggal_masuk">
					</div>
					<div class="d-flex justify-content-between">
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button type="button" class="btn btn-danger" id="deleteButton" data-id="">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="createModalLabel">Create Barang</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="createForm" method="POST" action="barang/store">
					<div class="mb-3">
						<label for="create-kode" class="form-label">Kode Barang</label>
						<input type="text" class="form-control" id="create-kode" name="kode_barang">
					</div>
					<div class="mb-3">
						<label for="create-nama" class="form-label">Nama Barang</label>
						<input type="text" class="form-control" id="create-nama" name="nama_barang">
					</div>
					<div class="mb-3">
						<label for="create-kategori" class="form-label">Kategori Barang</label>
						<input type="text" class="form-control" id="create-kategori" name="kategori_barang">
					</div>
					<div class="mb-3">
						<label for="create-deskripsi" class="form-label">Deskripsi Barang</label>
						<textarea class="form-control" id="create-deskripsi" name="deskripsi_barang"></textarea>
					</div>
					<div class="mb-3">
						<label for="create-harga-beli" class="form-label">Harga Beli</label>
						<input type="number" class="form-control" id="create-harga-beli" name="harga_beli">
					</div>
					<div class="mb-3">
						<label for="create-harga-jual" class="form-label">Harga Jual</label>
						<input type="number" class="form-control" id="create-harga-jual" name="harga_jual">
					</div>
					<div class="mb-3">
						<label for="create-stok" class="form-label">Stok Barang</label>
						<input type="number" class="form-control" id="create-stok" name="stok_barang">
					</div>
					<div class="mb-3">
						<label for="create-supplier" class="form-label">Supplier Barang</label>
						<input type="text" class="form-control" id="create-supplier" name="supplier_barang">
					</div>
					<div class="mb-3">
						<label for="create-tanggal" class="form-label">Tanggal Masuk</label>
						<input type="date" class="form-control" id="create-tanggal" name="tanggal_masuk">
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="../../../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		const editModal = document.getElementById('editModal');
		const editForm = document.getElementById('editForm');
		const deleteButton = document.getElementById('deleteButton');

		editModal.addEventListener('show.bs.modal', function (event) {
			const button = event.relatedTarget;
			const id = button.getAttribute('data-id');
			const kode = button.getAttribute('data-kode');
			const nama = button.getAttribute('data-nama');
			const kategori = button.getAttribute('data-kategori');
			const deskripsi = button.getAttribute('data-deskripsi');
			const hargaBeli = button.getAttribute('data-harga-beli');
			const hargaJual = button.getAttribute('data-harga-jual');
			const stok = button.getAttribute('data-stok');
			const supplier = button.getAttribute('data-supplier');
			const tanggal = button.getAttribute('data-tanggal');

			editForm.querySelector('#edit-id').value = id;
			editForm.querySelector('#edit-kode').value = kode;
			editForm.querySelector('#edit-nama').value = nama;
			editForm.querySelector('#edit-kategori').value = kategori;
			editForm.querySelector('#edit-deskripsi').value = deskripsi;
			editForm.querySelector('#edit-harga-beli').value = hargaBeli;
			editForm.querySelector('#edit-harga-jual').value = hargaJual;
			editForm.querySelector('#edit-stok').value = stok;
			editForm.querySelector('#edit-supplier').value = supplier;
			editForm.querySelector('#edit-tanggal').value = tanggal;

			deleteButton.setAttribute('data-id', id);
		});

		deleteButton.addEventListener('click', function () {
			const id = this.getAttribute('data-id');
			if (confirm('Are you sure you want to delete this item?')) {
				window.location.href = 'barang/delete?id=' + id;
			}
		});
	});
</script>
</body>
</html>
