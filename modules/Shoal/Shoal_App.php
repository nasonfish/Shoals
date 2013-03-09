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
	public function view($id = false){
		if($id){
			$this->viewShoal($id);
		} else {
		if(user()->isLoggedIn()){
			$data = array();
			$model = model()->open('users');
			$model->select('shoals');
			$model->whereLike('username', session()->getUsername('username'));
			$model->orderBy('id', 'DESC');
			$data['shoals'] = $model->results();
			template()->display($data);
		} else {
			router()->redirect("index/view");
		}
	}
	}
	
	public function viewShoal($id){
		template()->setPage("viewShoal");
		// Stuff
		template()->display($data);
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