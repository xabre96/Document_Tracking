<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
</head>
<body>
	<h1>Admin Dashboard</h1>
	<br>
	<a href="<?php echo base_url('Users/addCourierForm'); ?>">Add Courier</a>
	<a href="<?php echo base_url('Users/complianceForm'); ?>">Document Compliance Form</a>
	<a href="<?php echo base_url('Users/logout'); ?>">Logout</a>
	<br/><br/>
	<table border="2px">
		<tr>
			<th>Couriers</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($couriers as $key => $value) {
			if($value->user_type_id == 1){
			
			}else{
		?>
		<tr>
			<td><?php echo $value->user_name; ?></td>
			<td><a href="<?php echo base_url('Users/editCourierForm/'.$value->user_id); ?>">Edit</a> <a href="<?php echo base_url('Users/deleteCourier/'.$value->user_id); ?>">Delete</a></td>
		</tr>
		<?php		
			}
		}
		?>
	</table>
	<p><?php echo @$message; ?></p>
</body>
</html>