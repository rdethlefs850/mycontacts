<?php 
//Connect to the DB
$conn = new mysqli('localhost','mycontacts_user','McXsXmprNpYQmAbh','mycontacts');


//Execute SELECT query
$sql = "SELECT * FROM contacts WHERE contact_id={$_GET['id']}";
$results = $conn->query($sql);

//Store the contact data into variables
$contact = $results->fetch_assoc();
extract($contact);

//Close the connection
$conn->close();

?>

<h2>Edit Contact</h2>
<form class="form-horizontal" action="actions/edit_contact.php" method="post">
	<input type="hidden" name="contact_id" value="<?php echo $_GET['id']?>" />
	<div class="control-group">
		<label class="control-label" for="first_name">Name</label>
		<div class="controls">
			<?php echo input('contact_firstname','first name',$contact_firstname) ?> 
			<?php echo input('contact_lastname','last name',$contact_lastname) ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="contact_email">Email</label>
		<div class="controls">
			<?php echo input('contact_email','you@example.com',$contact_email) ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="contact_phone1">Phone</label>
		<div class="controls">
			<?php echo input('contact_phone','4025555555',$contact_phone,'phone span')?>
		</div>
	</div>	
	<div class="control-group">
		<label class="control-label" for="group_id">Group</label>
		<div class="controls">
		<?php 
		$options = get_options('group',0,'Select a group-');
		
		echo dropdown('group_id',$options);
		?>
		</div>
	</div>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-warning"><i class="icon-edit icon-white"></i> Update</button>
		<button type="button" class="btn" onclick= "window.history.go(-1)">Cancel</button>
	</div>
</form>





