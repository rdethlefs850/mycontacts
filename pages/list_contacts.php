<h2>Contacts</h2>
<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		//Connect to DB
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

		//Query DB
		$sql = 'SELECT * FROM contacts LEFT JOIN groups ON contacts.group_id=groups.group_id ORDER BY contact_lastname,contact_firstname';
		$results = $conn->query($sql);

		//Loop over result set, displaying contacts
		while(($contact = $results->fetch_assoc()) != null) {
			extract($contact);
			?>
			<tr>
				<td><?php echo $contact_firstname ?> <?php echo $contact_lastname?></td>
				<td><a href="mailto"><?php echo $contact_email ?></a></td>
				<td><?php echo format_phone($contact_phone) ?></td>
				<td><span class="label label-info"><?php echo $group_name ?></span></td>
				<td>
					<a class="btn btn-warning" href="./?p=form_edit_contact&id=<?php echo $contact_id?>"><i class="icon-edit icon-white"></i></a>
					<form class="form-inline" action="actions/delete_contact.php" method="post">
						<input type="hidden" name="contact_id" value="<?php echo $contact_id?>" />
						<button class="btn btn-danger" type="submit"><i class="icon-trash icon-white"></i></button>
					</form>
				</td>
			</tr>
			
		<?php }

		//Close DB connection
		$conn->close();
		 
?>
	</tbody>
</table>
