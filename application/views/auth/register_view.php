<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<!-- Include Bootswatch Darkly CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.0/darkly/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS for additional styling (optional) -->
	<style>
		body {
			background-color: #343a40; /* Dark background for the whole page */
		}
		.register-container {
			max-width: 400px;
			margin: 50px auto;
			padding: 20px;
			border: 1px solid #444;
			border-radius: 10px;
			background-color: #212529; /* Dark background for the form container */
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); /* Darker shadow for better contrast */
		}
		.register-header {
			margin-bottom: 20px;
			text-align: center;
		}
		.register-header h2 {
			color: #fff; /* White text for the header */
			margin: 0;
		}
		.alert {
			margin-top: 10px;
		}
		.login-link {
			text-align: center;
			margin-top: 10px;
		}
		.login-link a {
			color: #0d6efd; /* Bootstrap primary color for the link */
			text-decoration: none;
		}
		.login-link a:hover {
			color: #0a58ca; /* Darker color on hover */
			text-decoration: underline;
		}
		@media (max-width: 576px) {
			.register-container {
				margin: 20px;
				padding: 15px;
			}
		}
	</style>
</head>
<body>

<div class="container">
	<div class="register-container">
		<div class="register-header">
			<h2>Register</h2>
		</div>

		<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

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

		<?php echo form_open('register'); ?>

		<div class="mb-3">
			<label for="username" class="form-label text-white">Username</label>
			<input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" required />
		</div>

		<div class="mb-3">
			<label for="password" class="form-label text-white">Password</label>
			<input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required />
		</div>

		<button type="submit" class="btn btn-primary w-100">Register</button>

		<?php echo form_close(); ?>

		<div class="login-link">
			<p class="text-white">Already have an account? <a href="<?php echo base_url(); ?>">Login here</a></p>
		</div>
	</div>
</div>

<!-- Include Bootstrap JS (optional for interactive components) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.0/darkly/bootstrap.bundle.min.js"></script>
</body>
</html>
