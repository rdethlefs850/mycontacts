<?php 
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
		//header('Location:./?p=form_add_contact');
		
		//Kill script
		die();
	}
}

//Add to DB


//Connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//Query DB
$sql = "INSERT INTO contacts (contact_firstname,contact_lastname,contact_email,contact_phone) VALUES ('$contact_firstname','$contact_lastname','$contact_email',$contact_phone)";
$conn-query($sql);

//Close connection
$conn->close();

//Redirect header
header('Location:../?p=list_contacts');

