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
				$shoalIds = array();
				$model = model()->open('users');
				$model->where('username', session()->getUsername('username'));
				$i = 0;
				$results = $model->results();
				foreach(explode(',', $results[1]['shoals']) as $result){
					$shoalIds[$i] = $result;
					$i++;
				}
				$model = model()->open('shoals');
				foreach($shoalIds as $id){
					$model->where('id', $id, 'OR');
				}
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
		if(false == $shoal->results()){
			sml()->say('This shoal does not exist.', false);
			router()->redirect('shoal/all/');
		} else {
			$data['shoaldata'] = $shoal->results();
		}
		require(MODULES_PATH . DS . 'Shoal' . DS . 'libs' . DS . 'Plugins.php');
		$plugins = new Plugins();
		$plugins = $plugins->getPlugins();
		$usedPlugins = array();
		$i = 0;
		$pluginIds = model()->open('shoal_plugins');
		$pluginIds->where('shoal', $id);
		$pluginIds->orderBy('priority', 'ASC');
		
		foreach($pluginIds->results() as $pluginId){
			$usedPlugins[$i] = $plugins[$pluginId['plugin']] . ".plg.php";
			$i++;
		}
		$data['plugins'] = $usedPlugins;
		
		$pluginData = model()->open('shoal_data');
		$pluginData->where('shoal', $id);
		$passedPluginData = array();
		foreach($pluginData->results() as $aData){
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