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

<title>[ New Web Site ] - CodeIgniter Frame</title>

<link href="<?php echo base_url() . "static/self/html.global.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/html.frame.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/style/site/html.site.new_ws.css" ?>" rel="stylesheet" />

<!-- jquery -->
<script src="<?php echo base_url() . "static/script/jquery/1.11.2/jquery.min.js" ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "static/self/html.script.js" ?>"></script>

<script type="text/javascript">
	function jump2( go2 ) {
		document.getElementById( "input-page" ).value = go2;
		document.getElementById( "form-search" ).submit();
	}
	var vHide = true;
	function toggle2(dom) {
		if ( vHide ) {
			vHide = false;
			$(".holder-hide").show(500);
			$("#toggle-s").text("↑");
		} else {
			vHide = true;
			$(".holder-hide").hide(500);
			$("#toggle-s").text("↓");
		}
	}
</script>
</head>
<body>

	<header class="header">
		<h1 class="site-name"><a href="<?php echo base_url() ?>">CodeIgniter Frame</a></h1>
	</header>
	
	<div id="wrapper">
		<p class="empty">&nbsp;</p>
		
		<div class="container box-shadow">
			<h1 class="title">New Web Site<a class="back-link" title="Back to web site list" href="<?php echo site_url( "site/index" )?>">&lt;&lt;&lt;</a></h1>
			
			<div id="body">
				
				<p class="<?php echo ( isset( $msg ) ? "error-line" : "" )?>"><?php echo ( isset( $msg ) ? $msg : "" )?></p>
			
				<form id="form-search" method="post" action="<?php echo site_url( "site/create" ) ?>">
					<table>
						<tr>
							<td align="right"><label for="input-title">Title:&nbsp;</label></td>
							<td><input class="search-input" id="input-title" type="text" name="title" value="<?php echo ( isset( $title ) ? $title : "" )?>" /></td>
						</tr>
						<tr>
							<td align="right"><label for="input-url">URL:&nbsp;</label></td>
							<td><input class="search-input" id="input-url" type="text" name="url" value="<?php echo ( isset( $url ) ? $url : "" )?>" /></td>
						</tr>
						<tr>
							<td align="right"><label for="input-comment">Comment:&nbsp;</label></td>
							<td><textarea cols="48" rows="4" class="search-txtarea" id="input-comment" name="comment"><?php echo ( isset( $comment ) ? $comment : "" )?></textarea></td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input class="search-btn" type="submit" value="Push And Commit" />
							</td>
						</tr>
					</table>
				</form>
				
				<p class="empty">&nbsp;</p>
				
				<p class="time-line"><?php echo date("l Y-m-d H:i:s")?>
			
			</div>
		
		</div>
		
		<p class="empty">&nbsp;</p>
		
		<div class="container">
			<p class="declare">
				<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
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
