<!DOCTYPE html>

<!--
This will be the page that is shown for a user that goes to http://pufferfi.sh/ and is logged in.
-->
<div class="span6 offset3">
	<h2><?= text('index:view:page-title'); ?></h2>
	<?= sml()->printMessage(); ?>
	<p><em><?= text('index:view:intro'); ?></em></p>
</div>