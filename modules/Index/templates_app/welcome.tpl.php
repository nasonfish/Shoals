<?php
// This will be the page that is shown for a user that goes to http://pufferfi.sh/ and is not logged in.
?>
		<div class="container">
			<div class="home-jumbotron">
				<h2><?=text('index:welcome:tagline'); ?></h2>
				<p class="lead"><?=text('index:welcome:subtagline'); ?></p>
				<a class="btn btn-large btn-success" href="<?=Url::path('users/signup');?>">Sign up!</a>
			</div>
            <hr class="divider"/>
			<div class="row-fluid front-boxes">
				<div class="span4">
					<h3>Create</h3>
					<p><?=text('index:welcome:create'); ?></p>
				</div>
                <div class="betweenbox"></div>
				<div class="span4">
					<h3>Join</h3>
					<p><?=text('index:welcome:join'); ?></p>
				</div>
                <div class="betweenbox"></div>
				<div class="span4">
					<h3>Explore</h3>
					<p><?=text('index:welcome:explore'); ?></p>
				</div>
			</div>
		</div>
        <hr/>
        <div id="questions" class="alert alert-info">
            <h3>So what is Shoals?</h3>
            <p><strong>Shoals</strong> is a new web app in development by nasonfish, part of the pufferfi.sh umbrella.</p>
            <p>Shoals, the app, allows you to make your own community forum/page, also called a "Shoal", with just a few simple clicks.</p>
            <p>You can customize your shoal using "plugins" that you can add, which will range from text boxes that you can edit to programs that check if a Minecraft server is up, and more.</p>
            <p>Hopefully, your shoal will allow your community to be more linked together and provide a place for people to be active in to keep your community closer.</p>
            <hr/>
            <h3>What is a 'shoal' anyway?</h3>
            <p>A shoal is like a group of fish that stick together, but do not move together like a school does. Kind of like a fish community. <strong>quote from puffrfish on IRC.</strong></p>
            <p>puffrfish and I really like fish, and in the past, we've created some fish-themed stuff, so naming this project "Shoals" really fits in.</p>
            <hr/>
            <h3>How do I contact you guys?</h3>
            <p>You can find us on the <a href="http://esper.net/">EsperNet Internet Relay Chat network</a> in the channel <strong>#Shoals</strong>. <a href="http://webchat.esper.net/?channels=Shoals">Here's an easy link for accessing the channel.</a></p>
        </div>