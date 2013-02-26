<?php session_start() ?>
<?php 
require_once('../config/db.php');
require_once('../lib/functions.php');

extract($_POST);

// Validate form data
$required = array(
		'contact_firstname',
		'contact_lastname',
		'contact_email',
);
foreach($required as $r) {
	// If invalid, then redirect with a message
	if(!isset($_POST[$r]) || $_POST[$r] == '') {
		// Store message
		$_SESSION['message'] = array(
				'type'	=> 'danger',
				'text'	=> 'Please provide all required information.'
		);

		// Store form data into session data
		$_SESSION['POST'] = $_POST;

		// Set location header
		header("Location:../?p=form_edit_contact&id=$contact_id");

		// Kill
		die();
	}
}

// Connect to the DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// Execute UPDATE
$sql = "UPDATE contacts SET contact_firstname='$contact_firstname',contact_lastname='$contact_lastname',contact_email='$contact_email',contact_phone=$contact_phone,group_id='$group_id' WHERE contact_id=$contact_id";
$conn->query($sql);

if($conn->errno > 0) {
	echo "<h4>SQL Error #{$conn->errno}:</h4>";
	echo "<p>{$conn->error}</p>";
	echo "<p><strong>SQL Executed: </strong>$sql</p>";
	die();
}

	// Close connection
	$conn->close();

	// Redirect with a message
	$_SESSION['message'] = array(
			'type' => 'warning',
			'text' => "$contact_firstname $contact_lastname was updated."
	);
	header('Location:../?p=list_contacts');
	
	

	
	
	
	
	