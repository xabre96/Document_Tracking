<!DOCTYPE html>
<html>
<head>
	<title>Compliance Form</title>
</head>
<body ng-app="myApp" ng-controller="myController">
	<form method="POST" action="<?php echo base_url('Users/editDocument/'.$id); ?>">
	<?php foreach ($data as $key => $value) { ?>
		<input type="text" value="<?php echo $value->subject; ?>" name="subject" placeholder="Subject" required=""/>
		<br/>
		<input type="text" value="<?php echo $value->sender; ?>" name="sender" placeholder="Sender" required="">
		<br/>
		<input type="text" value="<?php echo $value->instructions; ?>" name="instructions" placeholder="Instructions" required="">
		<br/>
		<input type="text" value="<?php echo $value->others; ?>" name="others" placeholder="Others" required="">
		<br/>

		<?php 
		$x = 0;
		$y = 0;
		foreach ($detail as $key => $v) {
				$ids[$x] = $v->office_id;
				$x++;
		}
		$x = 0;
		foreach ($office as $key => $vale) {
			if($y<count($ids)){
			if($vale->office_id==$ids[$y]){
		?>
			<input type="checkbox" checked="checked" name="office[]" value="<?php echo $vale->office_id;?>"/><?php echo $vale->office; ?>
		<?php
			$y++;
			}else{
		?>
			<input type="checkbox" name="office[]" value="<?php echo $vale->office_id;?>"/><?php echo $vale->office; ?>
		<?php 
			}
			}else{ ?>
					<input type="checkbox" name="office[]" value="<?php echo $vale->office_id;?>"/><?php echo $vale->office; ?>		
		<?php	}
		} 
		?>
		<br/>
		<?php foreach ($data2 as $key => $val) { 
			foreach ($detail as $key => $va) {
				$det = $va->compliance_type_id;
			}
			if($val->compliance_type_id==$det){
		?>	
		<input type="text" name="dumm" disabled="" value="<?php echo $val->compliance_type; ?>"/>
		<?php }else{}
			} 
		?>
		<br/>

		<label>Due Date:</label>
		<input type="text" name="dummy" disabled="" value="<?php echo $value->due_date; ?>"/>
		<br/>

		<input type="submit" value="Update"/>
		<a href="<?php echo base_url('Users/adminDashboard'); ?>">Cancel</a>
	<?php } ?>
	</form>

	<p><?php echo validation_errors(); ?></p>
	<script type="text/javascript" src="<?php echo base_url();?>assets/angular.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/app.js"></script>
</body>
</html>