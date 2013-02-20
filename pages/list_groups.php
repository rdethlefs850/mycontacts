<h2>Groups</h2>
<?php

//Connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//Query DB
$sql = 'SELECT * FROM contacts ORDER BY contact_lastname, contact_firstname';
$results = $conn->query($sql);

while(($groups = $results->fetch_assoc()) != null) {
	extract($group);
	?>
	<li><a href="./?pgroup&id=<?php echo $group_id ?>"><?php echo $group_name ?></a></li>
	<?php 
}
$conn->close();
