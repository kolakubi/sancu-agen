<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css">
</head>
<body style="padding: 10px; background-color: #00abc5;">

	<div class="container">
		<div
			class="row" style="display: flex; align-items: center; justify-content: center; height: 100vh;"
		>
			<div class="col-md-4 col-sm-12 col-xs-12" style="background-color: #00abc5;">
				<p class="text-center">
					<img src="<?php echo base_url() ?>asset/image/logo-sancu-new-2.png" alt="logo-sancu">
				</p>
				<?php if($gagal) : ?>
					<p class="text-center" style="color: white; background-color: red"><?php echo 'Username atau Password salah' ?></p>
				<?php endif ?>
				<?php echo form_open('login/validasi') ?>
					<div class="form-group">
						<label style="color: #222">Username: </label>
						<input type="text" name="username" class="form-control">
						<span class="text-danger"><?php echo form_error('username') ?></span>
					</div>
					<div class="form-group">
						<label style="color: #222">Password: </label>
						<input type="password" name="password" class="form-control">
						<span class="text-danger"><?php echo form_error('password') ?></span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info btn-block">Login</button>
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>

</body>
</html>
