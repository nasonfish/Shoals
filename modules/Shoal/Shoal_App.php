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
				$model = model()->open('user_shoals');
                $model->leftJoin('shoals', 'shoal', 'id');
				$model->where('user', session()->getInt('user_id'));
                //$model->where('shoals.public', 1); // It's the shoals they're already in.
                $model->select(array('user_shoals.rank', 'shoals.id', 'shoals.name', 'shoals.description', 'shoals.public'));
				$data['shoals'] = $model->results();
                $data['hasShoals'] = !empty($data['shoals']);
				template()->display($data);
			} else {
                sml()->say("You can't view your shoals if you don't have an account, silly!", false);
				router()->redirect("users/login");
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
        template()->add_resource( new Aspen_Css('/css/shoal/shoal.css') );
        template()->setPage("viewShoal");
		$shoal = model()->open('shoals');
		$shoal->where('id', $id);
		if(false == $shoal->results()){
			sml()->say('That shoal does not exist.', false);
			router()->redirect('shoal/all');
		} else {
			$data['shoalData'] = $shoal->results();
		}
        $ranks = model()->open('user_shoals');
        $ranks->where('shoal', $id);
        $ranks->where('user', session()->getInt('user_id'));
        $ranks->leftJoin('shoal_ranks', 'rank', 'name');
        $data['rank'] = $ranks->results();
		require(MODULES_PATH . DS . 'Shoal' . DS . 'libs' . DS . 'Plugins.php');
		$pluginList = getPlugins();
        $plugins = array();
		$model = model()->open('shoal_plugins');
        $model->where('shoal', $id);
		$model->orderBy('priority', 'ASC');
		foreach($model->results() as $plugin){
			$plugins[$plugin['left'] === 1 ? 'left' : 'right'][$plugin[$id]] = $pluginList[$plugin['plugin']]['class'];
        }
		$data['plugins'] = $plugins;
		$pluginData = model()->open('shoal_data');
		$pluginData->where('shoal', $id);
		$passedPluginData = array();
		foreach($pluginData->results() as $aData){
			$passedPluginData[$aData['id']][$aData['key']] = $aData['value'];
            # $pluginData = array(id => array('key' => 'value'))
		}
		$data['pluginData'] = $passedPluginData;
		$inShoal = model()->open('user_shoals');
        $inShoal->select('id');
        $inShoal->where('user',  session()->getInt('user_id'));
        $data['inShoal'] = $inShoal->results();
        $data['id'] = $id;
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
			//$form->setCurrentValue('owner', session()->getUsername('username')); TODO add them as owner in the ranks.
            if(!$id){
                $form->setCurrentValue('created', "CURRENT_TIMESTAMP");
            }
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
        template()->add_resource( new Aspen_Css( '/css/shoal/shoal-all.css' ));
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