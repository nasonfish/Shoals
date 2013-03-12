<?php if(isset($data)): ?>
	<html>
<body>
	<hr>
	<div class="container-fluid">
		<?php
			if($shoals):
				foreach($shoals as $shoal):
					?>
					<div class="span9">
						<p class="muted"><?=$shoal['id']?></p>
						<div class="span8">
							<h4><a href="/shoal/view/<?=$shoal['id']?>"><?=$shoal['name']?></a></h4>
							<div class="pull-right">
								<p>Owner: <?=$shoal['owner']?></p>
							</div>
							<p><?=$shoal['description']?></p>
						</div>
					</div>
					<?php
				endforeach;
			endif;
		?>
	</div>
</body>
</html>
<?php else: ?>
	<p>No data to display. Join a shoal <a href="/shoal/view/">here</a>!</p>
<?php endif; ?>

