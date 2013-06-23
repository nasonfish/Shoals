<?php
// This will be the page that is shown for a user that goes to http://pufferfi.sh/ and is not logged in.
?>
		<div class="container">
			<div class="home-jumbotron">
				<h2><?=text('index:welcome:tagline'); ?></h2>
				<p class="lead"><?=text('index:welcome:subtagline'); ?></p>
				<a class="btn btn-large btn-success" href="/users/signup/">Sign up!</a>
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
	</body>
</html>