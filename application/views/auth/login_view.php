<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<!-- Include Bootswatch Darkly CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.0/darkly/bootstrap.min.css">
	<!-- Bootstrap CSS -->
	<link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<!-- Custom CSS for additional styling (optional) -->
	<style>
		body {
			background-color: #343a40; /* Dark background for the whole page */
		}
		.login-container {
			max-width: 400px;
			margin: 50px auto;
			padding: 20px;
			border-radius: 10px;
			background-color: #212529; /* Dark background for the form container */
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); /* Darker shadow for better contrast */
		}
		.login-header {
			margin-bottom: 20px;
			text-align: center;
		}
		.login-header h2 {
			color: #fff; /* White text for the header */
			margin: 0;
		}
		.alert {
			margin-top: 10px;
		}
		.register-link {
			text-align: center;
			margin-top: 10px;
		}
		.register-link a {
			color: #007bff; /* Bootstrap primary color for the link */
		}
		.register-link a:hover {
			color: #0056b3; /* Darker color on hover */
			text-decoration: underline;
		}
		@media (max-width: 576px) {
			.login-container {
				margin: 20px;
				padding: 15px;
			}
		}
	</style>
</head>
<body>

<div class="container">
	<div class="login-container">
		<div class="login-header">
			<h2>Login</h2>
		</div>

		<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

		<?php if ($this->session->flashdata('error')): ?>
			<div class="alert alert-danger">
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php endif; ?>

		<?php echo form_open('login'); ?>

		<div class="mb-3">
			<label for="username" class="form-label text-white">Username</label>
			<input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" required />
		</div>

		<div class="mb-3">
			<label for="password" class="form-label text-white">Password</label>
			<input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required />
		</div>

		<button type="submit" class="btn btn-primary w-100">Login</button>

		<?php echo form_close(); ?>

		<div class="register-link">
			<p class="text-white">Don't have an account? <a href="<?php echo base_url('register'); ?>">Register here</a></p>
		</div>
	</div>
</div>

<!-- Include Bootstrap JS (optional for interactive components) -->
<script src="<?= base_url('assets/bootswatch-5/docs/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
