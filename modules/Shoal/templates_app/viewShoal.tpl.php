<div class="row-fluid">
	<div class="span3 alert alert-info">
		<?php foreach($plugins as $id => $name){ 
				if($id % 2 == 0){
					require(APPLICATION_PATH . DS . 'app' . DS . 'webroot' . DS . 'libs' . DS . 'plugins' . DS . $name);
					run($pluginData);
				}
			} 
		?>
	</div>
	<div class="span5 alert alert-success">
		hi.
	</div>
	<div class="span3 alert alert-info">
		<?php foreach($plugins as $id => $name){
				if($id % 2 != 0){
					require(APPLICATION_PATH . DS . 'app' . DS . 'webroot' . DS . 'libs' . DS . 'plugins' . DS . $name);
					run($pluginData);
				}
			} 
		?>
	</div>
</div>