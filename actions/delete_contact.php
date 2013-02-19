<?php session_start() ?>
<?php 
// Import
require_once('../config/db.php');
require_once('../lib/functions.php');

// Connect to the DB
$conn = connect();

// Execute DELETE 
$sql = "DELETE FROM contacts WHERE contact_id={$_POST['contact_id']}";
$conn->query($sql);


// Close the DB connection
$conn->close();

// Redirect with a message
$_SESSION['message'] = array(
	'type' => 'warning',
	'text' => 'Your contact was deleted.'
);
header('Location:../?p=list_contacts');