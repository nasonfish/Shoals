<div class="alert alert-warning centerbox">
<?php print sml()->printMessage(); ?>
	<div class="container-fluid">
		<?php
			if(isset($shoals)):
				foreach($shoals as $shoal):
					?>
					<div class="span9">
						<p class="muted"><?=$shoal['id']?></p>
						<h4><a href="/shoal/view/<?=$shoal['id']?>"><?=$shoal['name']?></a></h4>
						<p><?=$shoal['description']?></p>
                        <span class="muted">Public: <?=$shoal['public'] === 1 ? "yes" : "no"?></span>
                        <span class="muted">Date Created: <?=$shoal['timestamp']; ?></span>
					</div>
					<?php
				endforeach;
			endif;
			if (!$hasShoals){
				print '<p>No data to display. Join a shoal <a href="/shoal/all/">here</a>!</p>';
			}
		?>
	</div>
</div>