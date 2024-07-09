<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- Include Bootswatch CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.0/cerulean/bootstrap.min.css">
	<!-- Bootstrap CSS -->
	<link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">	<!-- Custom CSS for additional styling (optional) -->
	<!-- Custom CSS for additional styling (optional) -->
	<style>
		.login-container {
			max-width: 400px;
			margin: 50px auto;
			padding: 20px;
			border: 1px solid #ddd;
			border-radius: 10px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}
		.login-header {
			margin-bottom: 20px;
			text-align: center;
		}
		.login-header h2 {
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
			color: black;
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
			<label for="username" class="form-label">Username</label>
			<input type="text" name="username" class="form-control" />
		</div>

		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="password" name="password" class="form-control" />
		</div>

		<button type="submit" class="btn btn-primary w-100">Login</button>

		<?php echo form_close(); ?>

		<div class="register-link">
			<p>Don't have an account? <a href="<?php echo base_url('register'); ?>">Register here</a></p>
		</div>
	</div>
</div>


<!-- Include Bootstrap JS (optional for interactive components) -->
<script src="<?= base_url('assets/bootswatch-5/docs/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
