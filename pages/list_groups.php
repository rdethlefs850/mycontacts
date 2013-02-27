<h2>Groups</h2>
<ul class="nav nav-pills nav-stacked">
<?php

//Connect to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//Query DB
$sql = 'SELECT groups.*, COUNT(contact_id) AS num_contacts FROM groups LEFT JOIN contacts ON groups.group_id=contacts.group_id GROUP BY groups.group_id ORDER BY group_name';
$results = $conn->query($sql);

while(($group = $results->fetch_assoc()) != null) {
	extract($group);
	?>
	<li><span class="pull-right badge"><?php echo $num_contacts ?></span><a href="./?p=group&id=<?php echo $group_id ?>"><?php echo $group_name ?></a></li>
	<?php 
	
}
$conn->close();
 ?>
</ul>