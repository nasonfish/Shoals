<!DOCTYPE html>
<html lang="en">
	<?php error_reporting(E_ALL); 
	ini_set('display_errors', true); ?>
  <head>
	<title><?= $this->page_title(); ?></title>
	<?php // Here is an example on how to either print resources directly, or append them to the header ?>
	<?php $this->add_resource( new Aspen_Javascript('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js') ); ?>
	<?php $this->loadModuleHeader(); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php require_once(APPLICATION_PATH . DS . 'app' . DS . 'webroot' . DS . 'libs' . DS . 'gradient.php'); ?>
	<style>
	body<?= Background::getBackground("#2076E0", "#8BADE0", "#FC5BC9", Direction::Top_Left); ?>
	</style>
	
    <!-- Le styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/ico/favicon.png">
  </head>

  <body>
	  <div class="row-fluid">
	  
    <div class="container-narrow alert alert-success">
      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li><a href="/">Home</a></li>
		  <?php if (!user()->isLoggedIn()):?>
			<li><a href="/users/login/">Log in</a></li>
			<li><a href="/users/signup/">Sign up!</a></li>
		  <?php else: ?>
			<li><a href="/shoal/">View my shoals</a></li>
			<li><a href="/shoal/create/">Create a shoal</a></li>
			<li>
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= session()->getUsername('username') ?>  <i class="caret"></i></a>
				<ul class="dropdown-menu">
					<li><a href="/users/logout/"><i class="icon-off"></i> Log Out</a></li>
					<li><a href="/users/settings/"><i class="icon-wrench"></i> Your Settings</a></li>
<!--				<li><a href="#"><i class="icon-trash"></i> Delete</a></li>
					<li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
					<li class="divider"></li>
					<li><a href="#"><i class="i"></i> Make admin</a></li> -->
				</ul>
			</li>
			
		  <?php endif; ?>
        </ul>
        <h2 class="muted">pufferfi.sh</h2>
	  </div>
      </div>
	  </div>
	  <div class="row-fluid" style="padding-top:10px">
		<div class="alert alert-info span8 offset2" style="padding-top:10px"> 
		
		  <?php $this->page(); ?>
	</div>
	  </div>
		 
	  <div class="row-fluid">
		  <div class="footer span6 offset3">
		<div class="alert alert-success" style="padding-top:10px;">
			<?= $this->htmlHide(VERSION_COMPLETE); ?>
			<p><?= text('copyright', VERSION); ?></p>
			<?php $this->loadModuleFooter(); ?>
			<p style="font-size:14px; ">Created by nasonfish <!--and puffrfish -->using Aspen Framework.</p>
			<p><a href="http://github.com/botskonet/aspen-framework/"><img src="/img/aspen.png" alt="Aspen Framework"  width=128 height=32></a></p>
		</div>
	</div>
	</div>
		  
	
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap-transition.js"></script>
    <script src="/js/bootstrap-alert.js"></script>
    <script src="/js/bootstrap-modal.js"></script>
    <script src="/js/bootstrap-dropdown.js"></script>
    <script src="/js/bootstrap-scrollspy.js"></script>
    <script src="/js/bootstrap-tab.js"></script>
    <script src="/js/bootstrap-tooltip.js"></script>
    <script src="/js/bootstrap-popover.js"></script>
    <script src="/js/bootstrap-button.js"></script>
    <script src="/js/bootstrap-collapse.js"></script>
    <script src="/js/bootstrap-carousel.js"></script>
    <script src="/js/bootstrap-typeahead.js"></script>

  </body>

</html>
