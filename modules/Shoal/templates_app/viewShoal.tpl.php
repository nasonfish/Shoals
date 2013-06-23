<div class="row-fluid">
    <div class="span3 alert alert-info">
        <?php foreach($plugins['left'] as $plugin){
            print "<div class='plugin left'>";
            $plugin->run($pluginData);
            print "</div>";
        }
        ?>
    </div>
    <div class="span6 alert midshoalbox">

    </div>
    <div class="span3 alert alert-info">
        <?php foreach($plugins['right'] as $plugin){
            print "<div class='plugin right'>";
            $plugin->run($pluginData);
            print "</div>";
        }
        ?>
    </div>
</div>