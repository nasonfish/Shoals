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
	
	protected function viewShoal($id){
		$data = array();
		template()->setPage("viewShoal");
		$shoal = model()->open('shoals');
		$shoal->where('id', $id);
		$shoal->limit(1);
		
		include(MODULES_PATH . DS . 'Shoal' . DS . 'libs' . DS . 'Plugins.php');
		
		$plugins = new Plugins;
		$plugins = $plugins->getPlugins();
		
		$usedPlugins = array();
		$i = 0;
		$pluginIds = model()->open('shoal_plugins');
		$pluginIds->where('shoal', $id);
		$pluginIds->orderBy('priority', 'ASC');
		
		foreach($pluginIds->results() as $pluginId){
			$usedPlugins[$i] = $plugins[$pluginId] . ".plg.php";
		}
		$data['plugins'] = $usedPlugins;
		
		$pluginData = model()->open('shoal_data');
		$pluginData->where('shoal', $id);
		$pluginData = $pluginData->results();
		$passedPluginData = array();
		foreach($pluginData as $aData){
			$passedPluginData[$aData['key']] = $aData['value'];
		}
		$data['pluginData'] = $passedPluginData;
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