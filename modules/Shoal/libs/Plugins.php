<?php

class Plugins{
	
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
	 * 'name' => 'Enter your name'
	 * 
	 * This will be passed into your plugin file as $data['name'].
	 * 
	 * @return array(int, array(str, str)) plugins
	 */
	public function getPlugins(){
		return array(
			array(
				'name' => 'minecraft',
				'info' => 'Shows Data on a minecraft server, including how many people are on. You must set enable-query=true and enable-rcon=true in your server.properties for this to work.',
				'ip' => 'Minecraft Server IP'
				)
		);
	}
	
}
?>
