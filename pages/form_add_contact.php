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
		<label class="control-label" for="group_id">Group</label>
		<div class="controls">
		<?php 
		$options = get_options('group',0,'Select a group-');
		
		echo dropdown('group_id',$options);
		?>
		</div>
	</div>

	<div class="form-actions">
		<button type="submit" class="btn btn-success">Add Contact</button>
		<button type="button" class="btn">Cancel</button>
	</div>
</form>

