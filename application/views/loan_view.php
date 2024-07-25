<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Koleksi Buku</title>
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
		<h1>Daftar Koleksi Buku</h1>
		<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Buku</button>
	</div>
	<div class="search-container">
		<?php echo form_open('loan', ['method' => 'get']); ?>
		<input type="text" name="query" class="form-control" placeholder="Search by title" value="<?php echo $query ?? ''; ?>">
		<?php echo form_close(); ?>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead class="table-light">
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Penulis</th>
				<th>Genre</th>
				<th>Tahun Terbit</th>
				<th>Dipinjam Oleh</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Jatuh Tempo</th>
				<th>Tanggal Kembali</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1; // Initialize the sequential number
			foreach ($library as $item):
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td>
						<a href="#" class="item-name" data-bs-toggle="modal" data-bs-target="#editModal"
						   data-id="<?php echo $item['id']; ?>"
						   data-title="<?php echo $item['title']; ?>"
						   data-author="<?php echo $item['author']; ?>"
						   data-genre="<?php echo $item['genre']; ?>"
						   data-published_year="<?php echo $item['published_year']; ?>"
						   data-borrowed_by="<?php echo $item['borrowed_by']; ?>"
						   data-borrow_date="<?php echo $item['borrow_date']; ?>"
						   data-due_date="<?php echo $item['due_date']; ?>"
						   data-return_date="<?php echo $item['return_date']; ?>">
							<?php echo $item['title']; ?>
						</a>
					</td>
					<td><?php echo $item['author']; ?></td>
					<td><?php echo $item['genre']; ?></td>
					<td><?php echo $item['published_year']; ?></td>
					<td><?php echo $item['borrowed_by']; ?></td>
					<td><?php echo $item['borrow_date']; ?></td>
					<td><?php echo $item['due_date']; ?></td>
					<td><?php echo $item['return_date']; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Edit Buku</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="editForm" method="POST" action="library/update">
					<input type="hidden" name="id" id="edit-id">
					<div class="mb-3">
						<label for="edit-title" class="form-label">Judul Buku</label>
						<input type="text" class="form-control" id="edit-title" name="title">
					</div>
					<div class="mb-3">
						<label for="edit-author" class="form-label">Penulis</label>
						<input type="text" class="form-control" id="edit-author" name="author">
					</div>
					<div class="mb-3">
						<label for="edit-genre" class="form-label">Genre</label>
						<input type="text" class="form-control" id="edit-genre" name="genre">
					</div>
					<div class="mb-3">
						<label for="edit-published_year" class="form-label">Tahun Terbit</label>
						<input type="number" class="form-control" id="edit-published_year" name="published_year">
					</div>
					<div class="mb-3">
						<label for="edit-borrowed_by" class="form-label">Dipinjam Oleh</label>
						<input type="text" class="form-control" id="edit-borrowed_by" name="borrowed_by">
					</div>
					<div class="mb-3">
						<label for="edit-borrow_date" class="form-label">Tanggal Pinjam</label>
						<input type="date" class="form-control" id="edit-borrow_date" name="borrow_date">
					</div>
					<div class="mb-3">
						<label for="edit-due_date" class="form-label">Tanggal Jatuh Tempo</label>
						<input type="date" class="form-control" id="edit-due_date" name="due_date">
					</div>
					<div class="mb-3">
						<label for="edit-return_date" class="form-label">Tanggal Kembali</label>
						<input type="date" class="form-control" id="edit-return_date" name="return_date">
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
				<h5 class="modal-title" id="createModalLabel">Tambah Buku</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="createForm" method="POST" action="library/store">
					<div class="mb-3">
						<label for="create-title" class="form-label">Judul Buku</label>
						<input type="text" class="form-control" id="create-title" name="title">
					</div>
					<div class="mb-3">
						<label for="create-author" class="form-label">Penulis</label>
						<input type="text" class="form-control" id="create-author" name="author">
					</div>
					<div class="mb-3">
						<label for="create-genre" class="form-label">Genre</label>
						<input type="text" class="form-control" id="create-genre" name="genre">
					</div>
					<div class="mb-3">
						<label for="create-published_year" class="form-label">Tahun Terbit</label>
						<input type="number" class="form-control" id="create-published_year" name="published_year">
					</div>
					<div class="mb-3">
						<label for="create-borrowed_by" class="form-label">Dipinjam Oleh</label>
						<input type="text" class="form-control" id="create-borrowed_by" name="borrowed_by">
					</div>
					<div class="mb-3">
						<label for="create-borrow_date" class="form-label">Tanggal Pinjam</label>
						<input type="date" class="form-control" id="create-borrow_date" name="borrow_date">
					</div>
					<div class="mb-3">
						<label for="create-due_date" class="form-label">Tanggal Jatuh Tempo</label>
						<input type="date" class="form-control" id="create-due_date" name="due_date">
					</div>
					<div class="mb-3">
						<label for="create-return_date" class="form-label">Tanggal Kembali</label>
						<input type="date" class="form-control" id="create-return_date" name="return_date">
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url("/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"); ?>"></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		const editModal = document.getElementById('editModal');
		const editForm = document.getElementById('editForm');
		const deleteButton = document.getElementById('deleteButton');

		editModal.addEventListener('show.bs.modal', function (event) {
			const button = event.relatedTarget;
			const id = button.getAttribute('data-id');
			const title = button.getAttribute('data-title');
			const author = button.getAttribute('data-author');
			const genre = button.getAttribute('data-genre');
			const published_year = button.getAttribute('data-published_year');
			const borrowed_by = button.getAttribute('data-borrowed_by');
			const borrow_date = button.getAttribute('data-borrow_date');
			const due_date = button.getAttribute('data-due_date');
			const return_date = button.getAttribute('data-return_date');

			editForm.querySelector('#edit-id').value = id;
			editForm.querySelector('#edit-title').value = title;
			editForm.querySelector('#edit-author').value = author;
			editForm.querySelector('#edit-genre').value = genre;
			editForm.querySelector('#edit-published_year').value = published_year;
			editForm.querySelector('#edit-borrowed_by').value = borrowed_by;
			editForm.querySelector('#edit-borrow_date').value = borrow_date;
			editForm.querySelector('#edit-due_date').value = due_date;
			editForm.querySelector('#edit-return_date').value = return_date;

			deleteButton.setAttribute('data-id', id);
		});

		deleteButton.addEventListener('click', function () {
			const id = this.getAttribute('data-id');
			if (confirm('Are you sure you want to delete this item?')) {
				window.location.href = 'library/delete?id=' + id;
			}
		});
	});
</script>
</body>
</html>
