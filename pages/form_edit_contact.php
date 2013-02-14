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


?>

<form action="create.php" method="post">
	<label>First Name</label>
	<input type="text" name="contact_firstname" value="<?php echo $contact_firstname ?>"/>
	<br/>
	
	<label>Last Name</label>
	<input type="text" name="contact_lastname" value="<?php echo $contact_lastname ?>"/>
	<br/>
	
	<label>Email</label>
	<input type="text" name="contact_email" value="<?php echo $contact_email ?>"/>
	<br/>
	
	<label>Phone</label>
	<input type="text" name="contact_phone" value="<?php echo $contact_phone ?>"/>
	<br/>
	
	<input type="hidden" name="id" value="<?php $_GET['id'] ?>" />
	<input type="submit" value="add"/>
</form> 

















