<!DOCTYPE html>

<html>

	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />

		<title>Tasks</title>

		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />

		<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>

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

                    <form class="login-form" action="<?php echo url(); ?>/login" method="POST">

                        <input type="text"     name="user"      placeholder="User Name" />
                        <input type="password" name="password"  placeholder="User Password" />

                        <input type="submit"   value="Login" />

                        <?php echo show_error( $data, 'error_login' ); ?>

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