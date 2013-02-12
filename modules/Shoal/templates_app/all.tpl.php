<html>
<body>
	<hr>
	<div class="container-fluid">
		<?php
			if($shoals){
				foreach($shoals as $shoal):
					?>
					<div class="span9">
						<p class="muted"><?=$shoal->id()?></p>
						<div class="span8">
							<h4><?=$shoal->name()?></h4>
							<div class="pull-right">
								<p>Owner: <?=$shoal->owner()?></p>
							</div>
							<p><?=$shoal->text()?></p>
						</div>
					</div>
					<?php
				endforeach;
			}
		?>
	</div>
</body>
</html>