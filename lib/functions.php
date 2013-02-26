<?php
function format_phone($phone) {
	return $phone = '('.substr($phone,0,3).')' .substr($phone,3,3).'-'.substr($phone,-4);
}



/**
 * Outputs an input element with the given attribute values
 * This function also examines Session data for previously entered values with same name
 * @param String $name
 * @param String $placeholder
 * @return HTML input element
 */

function input($name, $placeholder, $value=null) {
	if($value == null && isset($_SESSION['POST'][$name])) {
		$value = $_SESSION['POST'][$name];

		//Remove from session data
		unset($_SESSION['POST'][$name]);
		
		if($value == '') {
			$class = 'class="error"';
		} else {
			$class = '';
		}
	}elseif($value != null) {
		$class = ''; //Do not mark as error
	} else {
		$value = '';
		$class = '';
	}
	return "<input $class type=\"text\" name=\"$name\" placeholder=\"$placeholder\" value=\"$value\" />";
}

/**
 * Generates an HTML select element with the fiven name atribute and option elements
 * This function also examines session data for a previously submitted value
 * @param String $name Name attribute
 * @param Array $options Array of options in the form value => text
 * @return HTML select element
 */

function dropdown($name, $options) {
	$select = "<select name=\"$name\">";

	foreach($options as $value => $text) {
		//If there is session form data for $name, AND its value is the same as the current array element, select it
		if(isset($_SESSION['POST'][$name]) && $_SESSION['POST'][$name] == $value) {	
			unset($_SESSION['POST'][$name]);
			$selected = 'selected="selected"';
		}else {	
			$selected = '';	
		} 
		$select .= "<option $selected value=\"$value\">$text</option>";
	}
	$select .= "</select>";
	return $select;
}

function radio($name, $options) {
	$radio = '';
	
	//Loop over options
	foreach($options as $value => $text) {
		if(isset($_SESSION['POST'][$name]) && $_SESSION['POST'][$name]) {
			unset($_SESSION['POST'][$name]);
			$checked = 'checked="checked"';
		}else {
			$checked = '';
		}
		$radio .= "<label><input type=\"radio\"name=\"$name\"$checked value=\"$value\">$text</label>";
	}
}

function get_options($table,$default_value=0,$default_name='Select') {
	$options = array($default_value => $default_name);
	
	//Field names
	$id_field = $table.'_id';
	$name_field = $table.'_name';
	
	//Connect to DB
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	
	//Query table for id's and names
	$sql = "SELECT $id_field, $name_field FROM {$table}s ORDER BY $name_field";
	$results = $conn->query($sql);
	
	//Loop over result set, adding in all rows to $options
	while(($row = $results->fetch_assoc()) !=null) {
		$key = $row[$id_field];
		$value = $row[$name_field];
		$options[$key] = $value;
	}
	
	//Close the DB connections
	$conn->close();
	
	//Return options
	return $options;
	
	
}























