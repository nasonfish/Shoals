<html>
<body>
	<hr>
	<div class="container-fluid">
		<?php print sml()->printMessage(); ?>
		<?php
			if($shoals):
				foreach($shoals as $shoal):
					?>
					<div class="span9">
						<p class="muted"><?=$shoal['id']?></p>
						<div class="span8">
							<h4><a href="/shoal/view/<?=$shoal['id'] ?>"><?=$shoal['name']?></a></h4>
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