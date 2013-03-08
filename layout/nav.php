<?php 
//Store the 'p' parameter from the QS into a variable
if(isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'list_cars';
}

if($p == 'list_cars') {
	$list_class = 'active';
	$form_add_class = '';
} else {
	$list_class = '';
	$form_add_class = 'active';
}
?>

<div class="navbar">
	<div class="navbar-inner">
		<a class="brand" href="./">My Cars</a>	
		<ul class="nav">
			<li class="<?php echo $list_class ?>"><a href="./?p=list_cars">Teams</a></li>
			<li class="<?php echo $form_add_class ?>"><a href="./?p=form_add_car">Add Car</a></li>
		</ul>
	</div>
</div>