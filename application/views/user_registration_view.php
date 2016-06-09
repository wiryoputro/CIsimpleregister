<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CodeIgniter User Registration Form Demo</title>
	<link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo $this->session->flashdata('verify_msg'); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>User Registration Form</h4>
			</div>
			<div class="panel-body">
				<?php $attributes = array("name" => "registrationform");
				echo form_open("user/register", $attributes);?>
				<div class="form-group">
					<label for="name">First Name</label>
					<input class="form-control" name="fname" placeholder="Your First Name" type="text" value="<?php echo set_value('fname'); ?>" />
					<span class="text-danger"><?php echo form_error('fname'); ?></span>
				</div>

				<div class="form-group">
					<label for="name">Last Name</label>
					<input class="form-control" name="lname" placeholder="Last Name" type="text" value="<?php echo set_value('lname'); ?>" />
					<span class="text-danger"><?php echo form_error('lname'); ?></span>
				</div>
				
				<div class="form-group">
					<label for="email">Email ID</label>
					<input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
					<span class="text-danger"><?php echo form_error('email'); ?></span>
				</div>
				
				<div class="form-group">
					<label for="name">Phone Number</label>
					<input class="form-control" name="phone" placeholder="Phone Number" type="tel" value="<?php echo set_value('phone'); ?>" />
					<span class="text-danger"><?php echo form_error('phone'); ?></span>
				</div>
				
				<div class="form-group">
					<label for="name">Occupation</label>
					<input class="form-control" name="jobs" placeholder="Occupation" type="text" value="<?php echo set_value('jobs'); ?>" />
					<span class="text-danger"><?php echo form_error('jobs'); ?></span>
				</div>

				<div class="form-group">
					<label for="subject">Password</label>
					<input class="form-control" name="password" placeholder="Password" type="password" />
					<span class="text-danger"><?php echo form_error('password'); ?></span>
				</div>

				<div class="form-group">
					<label for="subject">Confirm Password</label>
					<input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" />
					<span class="text-danger"><?php echo form_error('cpassword'); ?></span>
				</div>

				<div class="form-group">
					<button name="submit" type="submit" class="btn btn-default">Signup</button>
					<button name="cancel" type="reset" class="btn btn-default">Cancel</button>
				</div>
				<?php echo form_close(); ?>
				<?php echo $this->session->flashdata('msg'); ?>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"</script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script><script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-1.10.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>