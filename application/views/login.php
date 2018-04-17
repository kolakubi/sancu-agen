<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.css">
</head>
<body style="padding: 10px;">

	<div class="container">
		<div
			class="row"
			style="display: flex;
			align-items: center;
			justify-content: center;
			height: 100vh"
		>
			<div class="col-md-4 col-sm-12 col-xs-12" style="background-color: #00abc5; border-radius: 20px">
				<h1 class="text-center">Login</h1>
				<p class="text-center">
					<img src="<?php echo base_url() ?>asset/image/logo-sancu-new-2.png" alt="logo-sancu">
				</p>
				<?php echo form_open('login/validasi') ?>
					<div class="form-group">
						<label>Username: </label>
						<input type="text" name="username" class="form-control">
						<span class="text-danger"><?php echo form_error('username') ?></span>
					</div>
					<div class="form-group">
						<label>Password: </label>
						<input type="password" name="password" class="form-control">
						<span class="text-danger"><?php echo form_error('password') ?></span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-lg btn-info">Login</button>
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>

</body>
</html>
