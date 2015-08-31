<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<title>[ Index ] - I Am VIP</title>

<link href="<?php echo base_url() . "static/self/html.global.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/html.frame.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/style/html.welcome.index.css" ?>" rel="stylesheet" />

<!-- jquery -->
<script src="<?php echo base_url() . "static/script/jquery/1.11.2/jquery.min.js" ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "static/self/html.script.js" ?>"></script>
</head>
<body>

	<header class="header">
		<div class="header-box">
			<h1 class="site-name">
				<a href="<?php echo base_url()?>">I Am VIP</a>
			</h1>
			<ol class="header-menu">
				<?php $online = $this->session->userdata( "MY_Controller.ONLINE_KEY" ); ?>
				<?php if ( !empty( $online ) && $online == true ) : ?>
				<li><a href="<?php echo site_url( "user/out" ) ?>?link=<?php echo current_url() ?>">[logout]</a></li>
				<?php else : ?>
				<li><a href="<?php echo site_url( "user/enter" ) ?>?link=<?php echo current_url() ?>">[login]</a></li>
				<?php endif;?>
			</ol>
			<div style="clear: both;"></div>
		</div>
	</header>
	<div class="top-empty"></div>

	<div id="wrapper">

		<div class="full-w">
			<div class="container">

				<p class="time-line">
					<span>Today is </span><span><?php echo date("m/d/Y l")?></span>
				</p>

			</div>
		</div>

		<div class="full-w" style="height:240px;background-image:url('<?php echo base_url() . "static/images/page/bicolor.jpg" ?>');">
			<div class="container">

				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="bic-ball">
					<span class="bic-date"><?php echo $ball->dcb_dt ?></span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span class="bic-no"><?php echo $ball->dcb_num ?></span>
				</p>
				<p class="empty">&nbsp;</p>
				<p class="bic-ball">
					<span class="bic-item"><?php echo $ball->rb1 ?></span> <span class="bic-item"><?php echo $ball->rb2 ?></span> <span class="bic-item"><?php echo $ball->rb3 ?></span> <span class="bic-item"><?php echo $ball->rb4 ?></span> <span class="bic-item"><?php echo $ball->rb5 ?></span> <span class="bic-item"><?php echo $ball->rb6 ?></span> <span class="bic-item bic-red"><?php echo $ball->blueb ?></span>
				</p>
				<p class="empty">&nbsp;</p>
				<p class="bic-ball">
					<a class="bic-link" href="<?php echo site_url( "bicolorball" ) ?>">More...</a>
				</p>

			</div>
		</div>
		
		<div class="full-w">
			<div class="container">

				<p class="time-line">
					<span>Encrypt by MD5 and defined type</span>
				</p>

			</div>
		</div>

		<div class="full-w" style="height:240px;background-image:url('<?php echo base_url() . "static/images/page/md5.jpg" ?>');">
			<div class="container">
		
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="md5-line">
					<a class="md5-link" href="<?php echo site_url( "selfmd5" ) ?>">Try it...</a>
				</p>

			</div>
		</div>

		<div class="full-w">
			<div class="container">

				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
				<p class="empty">&nbsp;</p>
			</div>
		</div>

		<p class="empty">&nbsp;</p>

	</div>

	<footer class="footer">
		<p class="declare">
			This site is just for study, if something wrong, please contact <a href="mailto:nilocsivad@hotmail.com">nilocsivad@hotmail.com</a>, thanks!
		</p>
	</footer>

</body>
</html>
