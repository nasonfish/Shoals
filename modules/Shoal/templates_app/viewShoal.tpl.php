<div class="row-fluid">
    <div class="span3 alert alert-info">
        <?php foreach($lPlugins as $plugin){
            $plugin->run($pluginData);
        }
        ?>
    </div>
    <div class="span5 alert alert-success">
        hi.
    </div>
    <div class="span3 alert alert-info">
        <?php foreach($rPlugins as $plugin){
            $plugin->run($pluginData);
        }
        ?>
    </div>
</div>