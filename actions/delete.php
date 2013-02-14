<?php
session_start(); 
//Read file into array
$lines = file('../data/contacts.csv',FILE_IGNORE_NEW_LINES);

//Delete the line
unset($lines($_GET['linenum']));

//Create the string to write the file
$data_string = implode("\n",$lines);

$_SESSION['message'] = array(
		'text' => 'Your contact has been deleted.',
		'type' => 'success');

header('Location:../?p=list_contacts');
?>
