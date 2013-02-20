<?php session_start() ?>
<?php 
// Import
require_once('../config/db.php');
require_once('../lib/functions.php');

// Connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Execute DELETE 
$sql = "DELETE FROM contacts WHERE contact_id={$_POST['contact_id']}";
$conn->query($sql);

// Check for any errors
if($conn->errno > 0) {
	echo "<h4>SQL Error #{$conn->errno}:</h4>";
	echo "<p>{$conn->error}</p>";
	echo "<p><strong>SQL Executed: </strong>$sql</p>";
	die();
}

// Close the DB connection
$conn->close();

// Redirect with a message
$_SESSION['message'] = array(
	'type' => 'warning',
	'text' => 'Your contact was deleted'
);
header('Location:../?p=list_contacts');