<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 3.0 License

Name       : Accumen
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120712

Modified by VitalySwipe
-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>ОЛОЛОША TEAM</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
		<script type="text/javascript">
		// return a random integer between 0 and number
		function random(number) {
			
			return Math.floor( Math.random()*(number+1) );
		};
		
		// show random quote
		$(document).ready(function() { 

			var quotes = $('.quote');
			quotes.hide();
			
			var qlen = quotes.length; //document.write( random(qlen-1) );
			$( '.quote:eq(' + random(qlen-1) + ')' ).show(); //tag:eq(1)
		});
		</script>
	</head>
	<body>
		<div id="wrapper">

			<div id="header">

                <div id="menu">

                    <?php
                        $user_id = ( isset( $_SESSION['user_id'] ) && $_SESSION['user_id'] > 0 )
                            ? $_SESSION['user_id']
                            : 0;
                    ?>

                    <?php if( $user_id > 0 ) : ?>

                        <span class="user-hello"><?php echo 'Hello, Admin!'?></span>

                    <?php else : ?>

                    <form class="login-form" action="/login" method="POST">

                        <input type="text"     name="user"      placeholder="User Name" />
                        <input type="password" name="password"  placeholder="User Password" />

                        <input type="submit"   value="Login" />

                    </form>

                    <?php endif; ?>

                    <ul>
                        <li class="first active"><a href="/">Tasks</a></li>
                    </ul>

                </div>

			</div>

			<div id="page">

				<div id="content">

					<div class="box">

						<?php include 'application/views/' . $content_view; ?>

					</div>

					<br class="clearfix" />

				</div>

				<br class="clearfix" />

			</div>

			<div id="page-bottom">

			</div>

		</div>

		<div id="footer">
			<a href="/">Koval</a> &copy; 2019</a>
		</div>
	</body>
</html>