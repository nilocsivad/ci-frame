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

<title>[ New User ] - I Am VIP</title>

<link href="<?php echo base_url() . "static/self/html.global.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/html.frame.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/style/user/html.user.new_.css" ?>" rel="stylesheet" />

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
			<h1 class="title">New User<a class="back-link" title="Back to web site list" href="<?php echo site_url( "user/index" )?>">&lt;&lt;&lt;</a></h1>
			
			<div id="body">
				<?php $msg = $this->session->flashdata( "msg" ) ?>
				<p class="<?php echo ( !empty( $msg ) ? "error-line" : "" )?>"><?php echo ( !empty( $msg ) ? $msg : "" )?></p>
			
				<?php $data = $this->session->flashdata( "data" ) ?>
				<form id="form-search" method="post" action="<?php echo site_url( "user/create" ) ?>">
					<table>
						<tr>
							<td align="right"><label for="input-title">Login Name:&nbsp;</label></td>
							<td><input class="search-input" id="input-title" type="text" name="title" placeholder="Login Name" value="<?php echo ( empty( $data ) ? "" : $data[ "lname" ] )?>" /></td>
						</tr>
						<tr>
							<td align="right"><label for="input-url">Password:&nbsp;</label></td>
							<td><input class="search-input" id="input-url" type="text" name="url" placeholder="Password" value="<?php echo ( empty( $data ) ? "" : $data[ "lpwd" ] )?>" /></td>
						</tr>
						<tr>
							<td align="right"><label for="input-url">Password Again:&nbsp;</label></td>
							<td><input class="search-input" id="input-url" type="text" name="url" placeholder="Password Again" value="<?php echo ( empty( $data ) ? "" : $data[ "lpwd" ] )?>" /></td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input class="search-btn" type="submit" value="Register" />
							</td>
						</tr>
					</table>
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
