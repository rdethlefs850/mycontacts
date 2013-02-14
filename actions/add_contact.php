<?php session_start(); ?>
<pre><?php print_r($_POST) ?></pre>
<?php 
require('../config/db.php');
$required = array(
	'contact_firstname',	
	'contact_lastname',
	'contact_email',
	'contact_phone'
);

//Extract form data
extract($_POST);

//Validate form data
foreach($required as $r) {
	//If invalid, redirect with message
	if(!isset($_POST[$r]) || $_POST[$r] == '') {
		//set message into session
		$_SESSION['message'] = array(
			'type' => 'danger',
			'text' => 'Please fill out all required information'		
		);
		
		//store form dat into session data
		$_SESSION['POST'] = $_POST;
		
		//set location header
		header('Location:../?p=form_add_contact');
		
		//Kill script
		die();
	}
}

//Add to DB


//Connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//Query DB
$sql = "INSERT INTO contacts (contact_firstname,contact_lastname,contact_email,contact_phone) VALUES ('$contact_firstname','$contact_lastname','$contact_email',$contact_phone)";
$conn->query($sql);

if($conn-> errno > 0) {
	echo $conn->error;
	die();
}

//Close connection
$conn->close();

// Set message for successful insertion of contact

foreach($required as $r) {
	//If invalid, redirect with message
	if(!isset($_POST[$r]) || $_POST[$r] != '') {
		//set message into session
		$_SESSION['message'] = array(
				'type' => 'success',
				'text' => 'Your contact has been added.'
		);

		//store form dat into session data
		$_SESSION['POST'] = $_POST;

		//set location header
		header('Location:../?p=list_contacts');

		//Kill script
		die();
	}
}

//Redirect header
header('Location:../?p=list_contacts');



