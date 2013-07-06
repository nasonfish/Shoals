<?php

/**
 * @uses Module
 */
class Plugins_App extends Module {


	/**
	 * Loads our default dashboard screen
	 * @access public
	 */
	public function view(){
	    template()->display();
	}


    /**
     * Edit the plugins for a certain
     * shoal.
     * @param bool $id
     */
    public function edit($id = false){
        if(!$id){
            router()->redirect('shoal/view');
        }
        $data = array();
        include(MODULES_PATH . DS . 'Plugins' . DS . 'libs' . DS . 'Plugins.php');
        $data['plugins'] = getPlugins();
        $data['id'] = $id;
        template()->addJsVar('SHOAL_ID', $id);
        template()->add_resource(new Aspen_Javascript('/js/plugins/edit.js'));
        $model = model()->open('shoal_plugins');
        $model->leftJoin('shoal_data as data', 'shoal = shoal_plugins.shoal AND data.priority', 'priority');
        // TODO get current plugins ^
        template()->display($data);
    }


    /**
     * Submit a plugin to be saved to the database,
     * from inside of the edit() function/page.
     */
    public function ajax_submit(){
        $form = new Form('shoal_plugins');
        if($form->isSubmitted()){
            if($form->save()):
                print '<div class="alert alert-success">
                <p>Plugin saved successfully</p>
                </div>';
            return;
            endif;
            $form->printErrors();
        }
        print '<div class="alert alert-error">
            <p>Plugin form not submitted</p>
        </div>';
    }

    /**
     * Get the form for a plugin.
     * We will be grabbing all the data from the getPlugins()
     * function and be printing it out, so then jQuery can turn
     * it into a form.
     * @param bool $id
     */
//    public function ajax_get_plugin($id = false){
    private function ajax_get_plugin($id = false){
        if($id !== false){
            include(MODULES_PATH . DS . 'Plugins' . DS . 'libs' . DS . 'Plugins.php');
            $plugins = getPlugins();
            $plugin = $plugins[$id];
            $data = array();
            foreach($plugin as $key => $val){  // Boy, my code is messy. I need to fix this.
                if($key === 'name'){           //             array(
                    $data['name'] = $val;      //                 'name' => "Your name"
                } elseif($key === 'info'){     //                 'info' => "Description and other info."
                    $data['info'] = $val;      //                 'data'=> array(
                } elseif($key !== 'class'){    //                      'extraField' => "Your extra field's description."
                    $data['data'][$key] = $val;//                 )
                }                              //             )
            }
            print json_encode($data);
        }
    }

}
?>