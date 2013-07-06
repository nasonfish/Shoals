<div class="alert alert-warning fullbox">
    <div class="plugin-list span3">
        <ul id="current-plugins">

        </ul>
        <ul class="plugins">
            <?php foreach($plugins as $id => $plugin): ?>
                <li class="plugin" onclick="load_plugin_form(<?=$id?>);"><?=$plugin['name']?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="separator span1" style="height: 100%;">&nbsp;</div>
    <div id="plugin-edit span8">
        <div id="plugin-add-status"></div>
        <?php foreach($plugins as $id => $plugin): ?>
            <form method="post">
                <div class="plugin" id="plugin-<?=$id?>-edit">
                    <h3>Add Plugin <?=$plugin['name']?></h3>
                    <pre class="plugin-description"><?=$plugin['info']?></pre>
                    <br/>
                    <label for="priority">How high would you like this to be on the page? (0 means top)</label>
                    <input type="number" name="priority"/>
                    <br/>
                    <br/>
                    <label for="side-select">Which side of the shoal should the plugin be on?</label>
                    <input type="radio" name="side-select" value="0" checked>Left&nbsp;&nbsp;
                    <input type="radio" name="side-select" value="1">Right
                    <?php foreach($plugin['extra'] as $name => $field): ?>
                        <br/><br/>
                        <label for="plugin-<?=$name?>"><?=$field?></label>
                        <input type="text" name="plugin-<?=$name?>"/>
                    <?php endforeach; ?>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>