<div class="alert alert-warning centerbox">
	<div class="container-fluid">
		<?php print sml()->printMessage(); ?>
		<?php if($shoals): foreach($shoals as $shoal):?>
			<p class="muted pull-left"><?=$shoal['id']?></p>
			<h4 class="shoal-title"><a href="/shoal/view/<?=$shoal['id'] ?>"><?=$shoal['name']?></a></h4>
			<p><?=$shoal['description']?></p>
        <?php endforeach; endif; ?>
	</div>
</div>