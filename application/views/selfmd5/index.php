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

<title>[ Self MD5 ] - I Am VIP</title>

<link href="<?php echo base_url() . "static/self/html.global.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/html.frame.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/style/selfmd5/html.selfmd5.index.css" ?>" rel="stylesheet" />

<!-- jquery -->
<script src="<?php echo base_url() . "static/script/jquery/1.11.2/jquery.min.js" ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "static/self/html.script.js" ?>"></script>
</head>
<body>

	<header class="header">
		<div class="header-box">
			<h1 class="site-name"><a href="<?php echo base_url() ?>">I Am VIP</a></h1>
		</div>
	</header>
	
	<div class="top-empty">&nbsp;</div>
	
	<div id="wrapper">
		<p class="empty">&nbsp;</p>
		
		<div class="container box-shadow">
			<h1 class="title">Self MD5</h1>
			
			<div id="body">
			
				<form id="form-search" method="get" action="<?php echo site_url( "selfmd5/index" ) ?>">
					<p>
						<label for="input-txt">Text:</label>
						<input id="input-txt" class="search-input" name="txt" value="<?php echo $txt ?>" />
						<input class="search-btn" type="submit" value="Calc" />
					</p>
					<p>&nbsp;</p>
					<p class="md5-line">MD5: <b><?php echo ( isset( $md5 ) ? $md5 : "" ) ?></b></p>
					<p class="md5-line">Self MD5: <b><?php echo ( isset( $out ) ? $out : "" ) ?></b></p>
				</form>
				
				<p class="empty">&nbsp;</p>
				
				<p class="time-line"><?php echo date("l Y-m-d H:i:s")?>
			
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
