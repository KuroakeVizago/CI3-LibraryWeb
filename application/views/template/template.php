<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>

	<link rel="icon" href="<?php echo site_url('assets/sprites/okita01.png'); ?>" type="image/x-icon">

	<!-- Bootstrap CSS -->
	<link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

	<!-- Custom CSS -->
	<style>
		/* Custom styles */
		.navbar-brand {
			font-size: 1.5rem;
		}
		.nav-link {
			font-size: 1.2rem;
		}
		.footer-text {
			font-size: 0.9rem;
		}
		@media (max-width: 576px) {
			.navbar-brand {
				font-size: 1.2rem;
			}
			.nav-link {
				font-size: 1rem;
			}
			.footer-text {
				font-size: 0.8rem;
			}
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container-fluid">
		<a class="navbar-brand" href="#"><?php echo $user; ?></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav me-auto">
				<li class="nav-item">
					<a class="nav-link <?php echo $active_menu == 'home' ? 'active' : ''; ?>" href="<?= base_url('home'); ?>">Data Perpustakaan</a>
				</li>
			</ul>
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('logout'); ?>">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<div class="container mt-5 mb-5">
	<?php echo $content; ?>
	<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top border-2">
		<div class="col-md-4 d-flex align-items-center">
			<a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
				<img width="50" height="44" src="<?php echo base_url('assets/sprites/okita01.png'); ?>" alt="Logo">
			</a>
			<span class="text-muted footer-text">©2024 Praktikum TIF, <b>Zaebi Agustia Hidayatullah</b> | 1412220052</span>
		</div>
	</footer>
</div>

<script src="<?= base_url('assets/bootswatch-5/docs/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
