<?php print sml()->printMessage(); ?>
	<div class="container-fluid">
		<?php
			if(isset($shoals)):
				foreach($shoals as $shoal):
					?>
					<div class="span9">
						<p class="muted"><?=$shoal['id']?></p>
						<h4><a href="/shoal/view/<?=$shoal['id']?>"><?=$shoal['name']?></a></h4>
						<div class="pull-right">
							<p>Owner: <?=$shoal['owner']?></p>
						</div>
						<p><?=$shoal['description']?></p>
                        <span class="muted">Public: <?=$shoal['public'] === 1 ? "yes" : "no"?></span>
					</div>
					<?php
				endforeach;
			endif;
			if (!$hasShoals){
				print '<p>No data to display. Join a shoal <a href="/shoal/all/">here</a>!</p>';
			}
		?>
	</div>
	