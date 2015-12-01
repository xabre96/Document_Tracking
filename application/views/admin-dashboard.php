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
	<h3>Couriers</h3>
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
	<h3>Documents</h3>
	<table border="2px">
		<tr>
			<th>Document I.D.</th>
			<th>Subject</th>
			<th>Sender</th>
			<th>Instructions</th>
			<th>Time Received</th>
			<th>Date Received</th>
			<th>Due Date</th>
			<th>Released Date</th>
			<th>Compliance Type</th>
			<th>Offices</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($documents as $key => $value) { ?>
		<tr>
			<td><?php echo $value->document_id; ?></td>
			<td><?php echo $value->subject; ?></td>
			<td><?php echo $value->sender; ?></td>
			<td><?php echo $value->instructions; ?></td>
			<td><?php echo $value->time_received; ?></td>
			<td><?php echo $value->date_received; ?></td>
			<td><?php echo $value->due_date; ?></td>
			<td><?php echo $value->released_date; ?></td>
			<td>
				<?php 
					$x = 0;
					$y=0;
					$z=0;
					foreach ($details as $key => $val) {
						if($value->document_id==$val->document_id){
							if($x==0){
								if ($val->compliance_type_id==1) {
									echo "Rush";
								}else if ($val->compliance_type_id==2) {
									echo "Priority";
								}else if ($val->compliance_type_id==3) {
									echo "Routinary";
								}else{
									echo "Cases";
								}
								$x = 1;
							}
						}
					}
				?>
			</td>
			<td>
				<?php 
					foreach ($office as $key => $valu) {
						if ($value->document_id==$valu->document_id) {
							echo $valu->office."<br/>";		
						}
					}
				?>
			</td>
			<td>
				<?php if($value->status==1){ ?>
						<a href="<?php echo base_url('Users/updateStatus/'.$value->document_id);?>"> Pending </a>
					<?php }else{ ?>
						<p> Released </p>
					<?php } ?>
			</td>
			<td>
				<a href="<?php echo base_url('Users/updateComplianceForm/'.$value->document_id);?>">Update</a>
				<a href="<?php echo base_url('Users/deleteComplianceForm/'.$value->document_id);?>">Delete</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<p><?php echo @$message; ?></p>
</body>
</html>