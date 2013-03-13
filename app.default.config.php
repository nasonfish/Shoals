<?php

/**
 * This configuration file holds application-specific configuration
 * options. These override and extend the default system configurations.
 *
 * Database and server-specific configurations should go into the config.php file.
 *
 * For more information, visit:
 * http://docs.aspen-framework.org/wiki/Aspen:Config
 */


class AppConfig implements AppConfigurable {

	public static function load( $config ) {
		
		// application name
		$config->set('application_name', 'pufferfi.sh');
		
		// the current application master GUID
		$config->set('application_guid', '8266f8e0-204d-11dd-bd0b-0800200c9a66');
		
		// application version
		$config->set('application_version', '2.0');
		
		// application build
		$config->set('application_build', '');
		
		// session message success class
		$config->set('sml_message_class_success', 'alert alert-success');

		// session message error class
		$config->set('sml_message_class_error', 'alert alert-error');
		
		return $config;
		
	}
}