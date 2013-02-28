<div class="navbar">
	<div class="navbar-inner">
		<a class="brand" href="./">MyContacts</a>	
		<ul class="nav">
			<?php foreach($pages as $file => $text) : ?>
				<?php if(is_array($text)):?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $file ?></a>
						<ul class="dropdown-menu">
						<?php foreach($text as $page => $name):?>
							<li><a href="./?p=<?php echo $page ?>"><?php echo $name ?></a></li>
						<?php endforeach ?>
						</ul>
				<?php else:?>
					<li><a href="./?p=<?php echo $file ?>"><?php echo $text ?></a></li>
				<?php endif ?>
			<?php endforeach ?>
		</ul>
		<form method="get" class="form-inline pull-right">
		<input type="hidden" name="p" value="list_contacts" />
			<div class="input-append">
				<input type="text" name="q" />
				<button type="submit"><i class="icon-search"></I></button>
			</div>
		</form>
	</div>
</div>