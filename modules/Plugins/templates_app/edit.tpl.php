<div class="alert alert-warning fullbox row-fluid">
    <div class="plugin-list span3 tall">
        <ul id="current-plugins">
            <!-- TODO -->
        </ul>
        <ul class="plugins">
            <?php foreach($plugins as $id => $plugin): ?>
                <li class="plugin" onclick="load_plugin_form('plugin-<?=$id?>-edit');"><a><?=$plugin['name']?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="plugin-edit span8 tall">
        <div id="plugin-add-status"></div>
        <?php foreach($plugins as $id => $plugin): ?>
            <div class="plugin-form-add" id="plugin-<?=$id?>-edit">
                <form class="ajax-plugin-add-<?=$id?>">
                    <legend>Add Plugin "<?=$plugin['name']?>"</legend>
                    <pre class="plugin-description"><?=$plugin['info']?></pre>
                    <br/>
                    <label for="plugin-<?=$id?>-priority">How high would you like this to be on the page? (0 means top)</label>
                    <input type="number" name="priority" id="plugin-<?=$id?>-priority"/>
                    <br/><br/>
                    <label for="plugin-<?=$id?>-side-select">Which side of the shoal should the plugin be on?</label>
                    <input type="radio" name="side-select" value="0" id="plugin-<?=$id?>-side-select" checked/>Left&nbsp;&nbsp;
                    <input type="radio" name="side-select" value="1" id="plugin-<?=$id?>-side-select"/>Right
                    <div class="extra-fields">
                        <?php foreach($plugin['extra'] as $name => $field): ?>
                            <br/><br/>
                            <label for="plugin-<?=$id.'-'.$name?>"><?=$field?></label>
                            <input type="text" name="<?=$name?>" id="plugin-<?=$id.'-'.$name?>"/>
                        <?php endforeach; ?>
                    </div>
                    <label for="plugin-<?=$id?>-submit">Add this plugin!</label>
                    <button type="button" id="plugin-<?=$id?>-submit" onclick="submit_add_form('ajax-plugin-add-<?=$id?>', '<?=$id?>'); return false;">Add!</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>