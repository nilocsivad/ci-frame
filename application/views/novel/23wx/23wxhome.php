<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<title>[ 23wx.com / Novel ] - I Am VIP</title>

<link href="<?php echo base_url() . "static/self/html.global.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/html.frame.css" ?>" rel="stylesheet" />

<!-- jquery -->
<script src="<?php echo base_url() . "static/script/jquery/1.11.2/jquery.min.js" ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "static/self/html.script.js" ?>"></script>
</head>
<body>

	<header class="header" style="filter: alpha(opacity = 75); opacity: 0.75;">
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

	<div id="wrapper">

		<p class="empty">&nbsp;</p>

		<div class="container box-shadow">

			<p class="empty">&nbsp;</p>
			<p class="empty">&nbsp;</p>
			<p class="empty">&nbsp;</p>

			<textarea class="hide-dom" rows="" cols="" style="width: 100%; height: 500px;">
				<?php
				// echo ( htmlspecialchars( $data ) )
				?>
			</textarea>

			<textarea rows="" cols="" style="width: 100%; height: 500px;">
				<?php
				echo $list->length?>
				<?php
				// echo ( htmlspecialchars( $data ) )
				?>
			</textarea>

			<div class="hide-dom">
				<div class="line"><?php echo base_url()?></div>
				<div class="line"><?php echo site_url()?></div>
				<div class="line"><?php echo current_url()?></div>
			</div>

			<div>
				<p class="line" id="out-line"></p>
			</div>

		</div>

		<p class="empty">&nbsp;</p>

	</div>

	<footer class="footer">
		<p class="declare">
			当前站点所有内容均为个人学习行为,如有侵权,请及时联系 <a href="mailto:nilocsivad@163.com">nilocsivad@163.com</a> 更改, 谢谢!
		</p>
	</footer>

</body>
</html>
