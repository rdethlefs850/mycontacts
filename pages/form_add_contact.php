<h2>Add a Contact</h2>
<form class="form-horizontal" action="actions/add_contact.php" method="post">
	<div class="control-group">
		<label class="control-label" for="inputFirstName">First Name</label>
		<div class="controls">
		<?php echo input('contact_firstname','required')?>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="inputLastName">Last Name</label>
		<div class="controls">
		<?php echo input('contact_lastname','required')?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="inputEmail">Email</label>
		<div class="controls">
		<?php echo input('contact_email','required')?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="inputPhone">Phone #</label>
		<div class="controls">
		<?php echo input('contact_phone','required')?>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="contact_id">Group</label>
		<div class="controls">
		<?php 
		//Connect to DB
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		
		//Query groups table
		$sql = 'SELECT * FROM groups ORDER BY group_name';
		$results = $conn->query($sql);
		
		//Loop over result set
		$options[0] = 'Select a group';
		while(($group = $results->fetch_assoc()) != null) {
			extract($group);
			$options[$group_id] = $group_name;
		}
		
		//Close DB connection
		$conn->close();
		
		echo dropdown('group_id',$options);
		?>
		</div>
	</div>

	<div class="form-actions">
		<button type="submit" class="btn btn-success">Add Contact</button>
		<button type="button" class="btn">Cancel</button>
	</div>
</form>









<!-- FORM SUBMISSION METHODS
Get: use when something won't result in a change to the server state
Post: use when submitting WILL result in a change in server state -->