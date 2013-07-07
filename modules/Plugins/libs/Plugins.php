<?php

	/**
	 * Get all the plugins
	 * 
	 * So, to add a new plugin:
	 * Add a new id for it. Just use the number after the previous one.
	 * Set the id to an array.
	 * This array must contain:
	 * 'name' => "your plugin name for the list"
	 * 'info' => "a quick description of the plugin when it is clicked"
	 * 
	 * Optionally, you may add more array keys for variables that the user has to enter.
	 * for example:
	 * 'key' => 'Enter your key'
	 * 
	 * This will be passed into your plugin file as $key.
	 * 
	 * @return array(int, array()) plugins
	 */
    function getPlugins(){
        spl_autoload_register(function ($className){
            include MODULES_PATH . DS . 'Plugins' . DS . 'libs' . DS . 'plugins' . DS . $className . '.plg.php';
        });
        return array(
            0 => array(
                'name' => 'Minecraft',
                'info' => 'Shows Data on a Minecraft server, including how many people are on. You must set enable-query=true and enable-rcon=true in your server.properties for this to work.',
                'class' => new minecraft,
                'extra' => array(
                    'ip' => 'Minecraft Server IP'
                )
            ),
            1 => array(
                'name' => "Header",
                'info' => "Display a header message on your shoal.",
                'class' => new header,
                'extra' => array(
                    'title' => 'The title of the header',
                    'text' => 'The text content of the header'
                )
            )
        );
    }
?>
