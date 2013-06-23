<div class="alert alert-warning centerbox">

<h2><?php print text('shoalform:'.ADD_OR_EDIT.'title'); ?></h2>

<?php $form->printErrors(); ?>
<?php print sml()->printMessage(); ?>

<?php if(IS_EDIT_PAGE){ ?>
    <p><a href="<?php print Url::path()->action(); ?>" onclick="return confirm('<?php print text('shoalform:delete_warn'); ?>')"><?php print text('shoalform:delete_link'); ?></a></p>
<?php } ?>
<form method="post" action="<?= Url::path()->action(); ?>">
    <fieldset>
        <legend><?php print text('shoalform:'.ADD_OR_EDIT.'subtitle'); ?></legend>
        <ol>
            <li>
                <label for="name"><?php print text('shoalform:'.ADD_OR_EDIT.'name'); ?>:</label>
                <input type="text" id="name" name="name" value="<?php print $form->cv('name') ?>" />
            </li>
            <li>
                <label for="description"><?php print text('shoalform:'.ADD_OR_EDIT.'description'); ?>:</label>
                <textarea id="description" name="description"><?php print $form->cv('description') ?></textarea>
            </li>
            <li>
                <label for="public"><?php print text('shoalform:'.ADD_OR_EDIT.'public'); ?></label>
                <input id="public" name="public" <?php print $form->checked('public'); ?> type="checkbox" value="1" />
            </li>
            <li>
                <label for="forum"><?php print text('shoalform:'.ADD_OR_EDIT.'forum'); ?></label>
                <input id="forum" name="forum" <?php print $form->checked('forum'); ?> type="checkbox" value="1" />
            </li>
        </ol>
    </fieldset>
    <fieldset>
        <input type="submit" name="submit" value="<?php print text('shoalform:'.ADD_OR_EDIT.'button'); ?>" />
    </fieldset>
</form>
</div>