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
                $data['hasShoals'] = !empty($data['shoals']);
				template()->display($data);
			} else {
				router()->redirect("index/view");
			}
		}
	}
	
	/**
	 * Modify plugins for a shoal.
	 * @param type $id Shoal id.
	 */
	public function plugins($id){
		
	}
	
	/**
	 * View a Shoal. Typically people
	 * are only going to end up here
	 * from /shoals/view/(id), not
	 * /shoals/viewShoal/(id).
	 * @param int $id
	 */
	protected function viewShoal($id){
		$data = array();
		template()->setPage("viewShoal");
		$shoal = model()->open('shoals');
		$shoal->where('id', $id);
		if(false == $shoal->results()){
			sml()->say('That shoal does not exist.', false);
			router()->redirect('shoal/all/');
		} else {
			$data['shoaldata'] = $shoal->results();
		}
		require(MODULES_PATH . DS . 'Shoal' . DS . 'libs' . DS . 'Plugins.php');
		$plugins = new Plugins();
		$plugins = $plugins->getPlugins();
		$leftPlugins = array();
        $rightPlugins = array();
		$pluginIds = model()->open('shoal_plugins');
		$pluginIds->where('shoal', $id);
		$pluginIds->orderBy('priority', 'ASC');

		foreach($pluginIds->results() as $pluginId){
            if($pluginId['left'] === 1){
			    $leftPlugins[] = $plugins[$pluginId['plugin']]['name'];
            } else {
                $rightPlugins[] = $plugins[$pluginId['plugin']]['name'];
            }
        }

        // This kinda sucks. I shouldn't be doing this for both sides.

        foreach($rightPlugins as $id => $name){
            require(APPLICATION_PATH . DS . 'app' . DS . 'webroot' . DS . 'libs' . DS . 'plugins' . DS . $name . ".plg.php");
            $classname = "Plugin_" . $name;
            $plugin = new $classname;
            $rightPlugins[$id] = $plugin;
        }
        foreach($leftPlugins as $id => $name){
            require(APPLICATION_PATH . DS . 'app' . DS . 'webroot' . DS . 'libs' . DS . 'plugins' . DS . $name . ".plg.php");
            $classname = "Plugin_" . $name;
            $plugin = new $classname;
            $leftPlugins[$id] = $plugin;
        }

		$data['rPlugins'] = $rightPlugins;
		$data['lPlugins'] = $leftPlugins;
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
     * They're creating a shoal
     * @access public
     */
    public function add(){
        $this->edit();
    }

    /**
	 * They're editing a shoal.
	 * @access public
	 */
	public function edit($id = false){

		// if the user is not logged in, kick them out
		if(!user()->isLoggedIn()){
			sml()->say('You need to log in or sign up before you can create a shoal.', false);
			router()->redirect('users/login');
		}
		$form = new Form('shoals', $id);
		
		// process the form if submitted
		if($form->isSubmitted()){
			$form->setCurrentValue('owner', session()->getUsername('username'));
			if($form->save()){
                sml()->say("Successfully saved your shoal's data.", true);
                router()->redirect('shoal/view');
            }
		}

		template()->display(array('form'=>$form));

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

    /**
     * Delete a shoal. :(
     * @param bool $id The id of the shoal.
     */
    public function delete($id = false){

    }
}
?>