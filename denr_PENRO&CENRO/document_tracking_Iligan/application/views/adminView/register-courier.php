<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<h4>Courier Credentials: </h4>
	<form method="POST" action="<?php echo base_url('Users/addCourier'); ?>">
		<input type="text" name="lname" placeholder="Last Name" required=""/><br/>
		<input type="text" name="fname" placeholder="First Name" required=""/><br/>
		<input type="text" name="mname" placeholder="Middle Name" required=""/><br/>
		<input type="text" name="uname" placeholder="User Name" required=""/><br/>
		<input type="text" name="contact" placeholder="Contact Number" required=""/><br/>
		<input type="text" name="address" placeholder="Address" required=""/><br/>
		<input type="email" name="email" placeholder="Email" required=""/><br/>
		<input type="submit" value="Add"/>
		<a href="<?php echo base_url('Users/adminDashboard'); ?>">Cancel</a>
	</form>
	<p><?php echo validation_errors(); ?></p>
</body>
</html>