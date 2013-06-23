<div class="row-fluid">
    <div class="span3 alert alert-info">
        <?php foreach($plugins['left'] as $plugin){
            print "<div class='plugin left'>";
            $plugin->run($pluginData);
            print "</div>";
        }
        ?>
    </div>
    <div class="span5 alert alert-success">

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