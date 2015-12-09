<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
</head>
<body>
	<h4>Courier Credentials: </h4>
	<form method="POST" action="<?php echo base_url('Users/editCourier/'.$id); ?>">
	<?php foreach ($data as $key => $value) { ?>
		<input type="text" name="lname" value="<?php echo $value->last_name;?>" placeholder="Last Name" required=""/><br/>
		<input type="text" name="fname" value="<?php echo $value->first_name;?>" placeholder="First Name" required=""/><br/>
		<input type="text" name="mname" value="<?php echo $value->middle_name;?>" placeholder="Middle Name" required=""/><br/>
		<input type="text" name="uname" value="<?php echo $value->user_name;?>" placeholder="User Name" required=""/><br/>
		<input type="text" name="contact" value="<?php echo $value->contact_number;?>" placeholder="Contact Number" required=""/><br/>
		<input type="text" name="address" value="<?php echo $value->address;?>" placeholder="Address" required=""/><br/>
		<input type="email" name="email" value="<?php echo $value->email;?>" placeholder="Email" required=""/><br/>
	<?php } ?>
	<br/>
		<input type="submit" value="Edit"/>
		<a href="<?php echo base_url('Users/adminDashboard'); ?>">Cancel</a>
	</form>
	<p><?php echo validation_errors(); ?></p>
</body>
</html>