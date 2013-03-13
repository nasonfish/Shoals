<html>
<body>
	<div class="container-fluid">
		<?php
			$hasShoals = false;
			if(isset($shoals)):
				foreach($shoals as $shoal):
					$hasShoals = true;
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
			if (!$hasShoals){
				print '<p>No data to display. Join a shoal <a href="/shoal/all/">here</a>!</p>';
			}
		?>
	</div>
</body>
</html>
	