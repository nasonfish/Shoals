<?php

/**
 * @package 	Aspen_Framework
 * @subpackage 	Modules.Base
 * @author 		Michael Botsko
 * @copyright 	2009 Trellis Development, LLC
 * @since 		1.0
 */

/**
 * Displays the default dashboard/welcome screens
 * @package Aspen_Framework
 * @uses Module
 */
class Shoal_App extends Module {


	/**
	 * Loads our default dashboard screen
	 * @access public
	 */
	public function view(){
		template()->display();
	}
	
	/**
	 * They're creating a shoal.
	 * @access public
	 */
	public function create(){
		template()->display();
	}
	
	/**
	 * List the shoals.
	 */
	public function all(){
		$data = array();
		$model = model()->open('shoals');
		$model->where('public', 1);
		$model->orderBy('id', 'DESC');
		$data['shoals'] = $model->results();
		template()->display($data);
	}
}
?>