<div class="row-fluid">
    <div class="span3 alert alert-info">
        <?php foreach($plugins['left'] as $id => $plugin){
            print "<div class='plugin left'>";
            $plugin->run($pluginData[$id]);
            print "</div>";
        }
        ?>
    </div>
    <div class="span6 alert midshoalbox">

    </div>
    <div class="span3 alert alert-info">
        <?php if($shoalData['allow_join'] && !$inShoal): ?>
            <button class="btn btn-success" href="<?=Url::path('shoals/join', $id);?>">Join Shoal!</button>
        <?php endif; ?>
        <?php foreach($plugins['right'] as $id => $plugin){
            print "<div class='plugin right'>";
            $plugin->run($pluginData[$id]);
            print "</div>";
        }
        ?>
    </div>
</div>