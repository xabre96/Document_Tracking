<!DOCTYPE html>
<html>
<head>
	<title>Compliance Form</title>
</head>
<body ng-app="myApp" ng-controller="myController">
	<form method="POST" action="<?php echo base_url('Users/addDocument'); ?>">
		<input type="text" name="subject" placeholder="Subject" required=""/>
		<br/>
		<input type="text" name="sender" placeholder="Sender" required="">
		<br/>
		<input type="text" name="instructions" placeholder="Instructions" required="">
		<br/>
		<input type="text" name="others" placeholder="Others" required="">
		<br/>

		<?php foreach ($data as $key => $value) {?>
			<input type="checkbox" name="office[]" value="<?php echo $value->office_id;?>"/><?php echo $value->office; ?>
		<?php }	?>
		<br/>

		<select name="compliance" ng-change="due()" ng-model="date">
		<?php foreach ($data2 as $key => $value) { ?>
			<option value="<?php echo $value->compliance_type_id; ?>"><?php echo $value->compliance_type; ?></option>
		<?php }?>
		</select>
		<br/>

		<label>Due Date:</label>
		<input type="text" name="due" disabled="" ng-model="date" hidden=""/>
		<input type="text" name="due_date" ng-model="slow" hidden=""/>
		<input type="text" name="dummy" disabled="" ng-model="slow"/>
		<br/>

		<input type="submit" value="Start Monitoring"/>
		<a href="<?php echo base_url('Users/adminDashboard'); ?>">Cancel</a>
	</form>

	<p><?php echo validation_errors(); ?></p>

	<script type="text/javascript" src="<?php echo base_url();?>assets/angular.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/app.js"></script>
</body>
</html>