<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/bootstrap.css">
</head>
<body>
	
	<div class="container">
		<div 
			class="row" 
			style="display: flex; 
			align-items: center; 
			justify-content: center; 
			height: 100vh"
		>
			<div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-8" style="background-color: rgba(255,255,255, 0.5); border-radius: 20px">
				<h1>login</h1>
				<?php echo form_open('login/validasi') ?>
					<div class="form-group">
						<label>Nik: </label>
						<input type="text" name="nik" class="form-control">
						<span class="text-danger"><?php echo form_error('nik') ?></span>
					</div>
					<div class="form-group">
						<label>Password: </label>
						<input type="password" name="password" class="form-control">
						<span class="text-danger"><?php echo form_error('password') ?></span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info">Login</button>
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>

</body>
</html>