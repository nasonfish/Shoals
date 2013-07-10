<!DOCTYPE html>
<html lang="en">
<?php error_reporting(E_ALL);
ini_set('display_errors', true); ?>
<head>
    <title><?= $this->page_title(); ?></title>
    <?php $this->add_resource( new Aspen_Css('/css/bootstrap.css') ); ?>
    <?php $this->add_resource( new Aspen_Css('/css/styles.css') ); ?>
    <?php $this->add_resource( new Aspen_Css('/css/bootstrap-responsive.css') ); ?>
    <?php $this->add_resource( new Aspen_Javascript('/js/bootstrap.js') ); ?>
    <?php $this->loadModuleHeader(); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/ico/favicon.png">
</head>
<body>
<div class="top">
    <div class="pull-left" id="title">
        <h2><?=config()->get('application_name');?></h2>
    </div>
    <ul class="nav nav-pills pull-right" id="menu-top-dropdown" style="padding-right:30px;">
        <li><a href="/">Home</a></li>
        <?php if (!user()->isLoggedIn()):?>
            <li><a href="/users/login/">Log in</a></li>
            <li><a href="/users/signup/">Sign up!</a></li>
        <?php else: ?>
            <li><a href="/shoal/">View my shoals</a></li>
            <li><a href="/shoal/add/">Create a shoal</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" id="dropdown-user" role="button" data-toggle="dropdown" href="#"><?= session()->getUsername('username') ?>  <b class="caret"></b></a>
                <ul class="dropdown-menu" id="user-menu" role="menu">
                    <li><a href="<?=Url::path('users/logout');?>"><i class="icon-off"></i> Log Out</a></li>
                    <li><a href="<?=Url::path('users/my_account');?>"><i class="icon-wrench"></i> Settings</a></li>
<!--				<li><a href="#"><i class="icon-trash"></i> Delete</a></li>
                    <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="i"></i> Make admin</a></li> -->
                </ul>
            </li>
        <?php endif; ?>
    </ul>

</div>
<div id="top-separator">&nbsp;</div>
<div class="mid" style="padding-top:10px">
    <?php $this->page(); ?>
</div>
<div class="footer">
    <div class="bottom" style="padding-top:10px;">

        <span><?= text('copyright', VERSION); ?></span>
        <span style="font-size:14px; ">&nbsp;&mdash;&nbsp;Created by nasonfish and puffrfish using Aspen Framework.&nbsp;&mdash;&nbsp;</span>
        <span><a href="http://github.com/botskonet/aspen-framework/"><img src="/img/aspen.png" alt="Aspen Framework"  width=128 height=32></a></span>
    </div>
</div>
</body>
<footer>
    <?= new Aspen_Javascript('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'); // some things depend on jQuery.?>
    <?php $this->loadModuleFooter(); ?>
    <?= $this->htmlHide(VERSION_COMPLETE); ?>
</footer>
</html>
