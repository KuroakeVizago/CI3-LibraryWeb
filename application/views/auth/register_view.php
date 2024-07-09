<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<!-- Include Bootswatch CSS -->
	<link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">	<!-- Custom CSS for additional styling (optional) -->
	<!-- Custom CSS for additional styling (optional) -->
	<style>
		.register-container {
			max-width: 400px;
			margin: 50px auto;
			padding: 20px;
			border: 1px solid #ddd;
			border-radius: 10px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}
		.register-header {
			margin-bottom: 20px;
			text-align: center;
		}
		.register-header h2 {
			margin: 0;
		}
		.alert {
			margin-top: 10px;
		}
		.login-link {
			text-align: center;
			margin-top: 10px;
		}
		.login-link a{
			color: black;
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
			<label for="username" class="form-label">Username</label>
			<input type="text" name="username" class="form-control" />
		</div>

		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="password" name="password" class="form-control" />
		</div>

		<button type="submit" class="btn btn-primary w-100">Register</button>

		<?php echo form_close(); ?>

		<div class="login-link">
			<p>Already have an account? <a href="<?php echo base_url(); ?>">Login here</a></p>
		</div>
	</div>
</div>

<!-- Include Bootstrap JS (optional for interactive components) -->
<script src="<?= base_url('assets/bootswatch-5/docs/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
