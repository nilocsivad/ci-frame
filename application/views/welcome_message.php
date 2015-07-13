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

<title>[ Index ] - CodeIgniter Frame</title>

<link href="<?php echo base_url() . "static/self/html.global.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/html.frame.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/style/html.welcome.index.css" ?>" rel="stylesheet" />

<!-- jquery -->
<script src="<?php echo base_url() . "static/script/jquery/1.11.2/jquery.min.js" ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "static/self/html.script.js" ?>"></script>
<script type="text/javascript">
</script>
</head>
<body>

	<header class="header">
		<h1 class="site-name"><a href="#">CodeIgniter Frame</a></h1>
	</header>
	
	<div id="wrapper">
		<p class="empty">&nbsp;</p>
		
		<div class="container box-shadow">
		
			<p class="line">
				If you are exploring CodeIgniter for the very first time, you should
				start by reading the <a href="<?php echo base_url() . "user_guide" ?>">User Guide</a>.
			</p>
				
			<div class="line">
				<a class="link-btn" href="<?php echo site_url( "user" ) ?>">User</a>
				<a class="link-btn" href="<?php echo site_url( "doublecolorball" ) ?>">Double Color Ball</a>
				<a class="link-btn" href="<?php echo site_url( "site" ) ?>">Site</a>
			</div>
			
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
		
		<div class="container" style="">
			<p class="declare">
				Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
			</p>
		</div>
		
	</div>
	
	<footer class="footer">
		<p class="declare">
			当前站点所有内容均为个人学习行为,如有侵权,请及时联系 <a href="mailto:nilocsivad@163.com">nilocsivad@163.com</a> 更改, 谢谢!
		</p>
	</footer>

</body>
</html>
