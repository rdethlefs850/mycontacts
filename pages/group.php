<?php 
//Fetch the name of the group with the id that is not the the QS
extract($_GET);

//Connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$sql = "SELECT group_name FROM groups WHERE group_id=$id";
$results = $conn->query($sql);
$group = $results->fetch_assoc();

?>

<h2><?php echo $group['group_name'] ?></h2>
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
		

		//Query DB
		$sql = "SELECT * FROM contacts WHERE group_id=$id ORDER BY contact_lastname, contact_firstname";
		$results = $conn->query($sql);

		//Loop over result set, displaying contacts
		while(($contact = $results->fetch_assoc()) != null) {
			extract($contact);
			?>
			<tr>
				<td><?php echo $contact_firstname ?> <?php echo $contact_lastname?></td>
				<td><a href="mailto"><?php echo $contact_email ?></a></td>
				<td><?php echo format_phone($contact_phone) ?></td>
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
