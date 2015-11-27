<!DOCTYPE html>
<html>
<head>
	<title>Compliance Form</title>
</head>
<body>
	<form>
		<input type="text" name="subject" placeholder="Subject" required=""/>
		<br/>
		<input type="text" name="sender" placeholder="Sender" required="">
		<br/>
		<input type="text" name="instructions" placeholder="Instructions" required="">
		<br/>
		<?php foreach ($data as $key => $value) { ?>
		<input type="checkbox" name="office[]" value="<?php echo $value->office_id;?>"><?php echo $value->office;?><br/>
		<?php }?>
		<select name="compliance">
		<option>Document Mode...</option>
		<?php foreach ($data2 as $key => $value) { ?>
			<option value="<?php echo $value->compliance_type_id; ?>"><?php echo $value->compliance_type; ?></option>
		<?php }?>
		</select>
		<br/>
		<label>Due Date:</label>
		<input type="text" name="due_date" disabled="" />
		<br/>
		<input type="submit" value="Start Monitoring"/>
		<a href="<?php echo base_url('Users/adminDashboard'); ?>">Cancel</a>
	</form>
	<p><?php echo validation_errors(); ?></p>
</body>
</html>