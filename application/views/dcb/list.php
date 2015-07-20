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

<title>[ Double Color Ball ] - CodeIgniter Frame</title>

<link href="<?php echo base_url() . "static/self/html.global.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/html.frame.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/style/dcb/html.dcb.list.css" ?>" rel="stylesheet" />

<!-- jquery -->
<script src="<?php echo base_url() . "static/script/jquery/1.11.2/jquery.min.js" ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "static/self/html.script.js" ?>"></script>

<script type="text/javascript">
	function jump2( go2 ) {
		document.getElementById( "input-page" ).value = go2;
		document.getElementById( "form-search" ).submit();
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
			<h1 class="title">Double Color Ball</h1>
			
			<div id="body">
			
				<div class="hide-dom">
					<?php 
						$url = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"]; 
					?>
					<div><?php echo $url ?></div>
					<div><?php echo dirname( $url ); ?></div>
					<div><?php print_r( pathinfo( $url ) ) ?></div>
					<div><?php print_r( parse_url( $url ) ) ?></div>
					
					<div>&nbsp;</div>
					
					<div><?php echo current_url()?></div>
					<div><?php echo site_url()?></div>
					<div><?php echo site_url( "/" )?></div>
					<div><?php echo site_url( "Doublecolorball" ) ?></div>
				</div>
			
				<div><a class="link-btn" href="<?php echo site_url( "doublecolorball/increments" ) ?>">Refresh</a></div>
				<div>&nbsp;</div>
			
				<form id="form-search" method="get" action="<?php echo site_url( "doublecolorball/index" ) ?>">
					<span>Page&nbsp;</span><input id="input-page" name="page" type="text" value="<?php echo $page?>" />
					<span> and </span>
					<input id="input-size" name="size" type="text" value="<?php echo $size?>" /><span>&nbsp;rows.&nbsp;&nbsp;</span>
					<input class="search-btn" type="submit" value="Go" />
				</form>
				
				<div class="hide-dom">
					<div>File:<?php echo __FILE__?></div>
					<div>Line:<?php echo __LINE__?></div>
					<div>Class:<?php echo __CLASS__?> -- <?php echo $class?></div>
					<div>Method:<?php echo __METHOD__?> -- <?php echo $method?></div>
				</div>
			
				<table>
					<thead>
						<tr>
							<td colspan="11">
								<a class="link-btn" href="javascript:jump2(1)">First</a>
								<a class="link-btn" href="javascript:jump2(<?php echo $page - 1?>)">Previous</a>
								<span>Current is <b><?php echo $page?>/<?php echo $sum?>.</b></span>
								<a class="link-btn" href="javascript:jump2(<?php echo $page + 1?>)">Next</a>
								<a class="link-btn" href="javascript:jump2(<?php echo $sum?>)">Last</a>
							</td>
						</tr>
						<tr class="row-title">
							<th width="90">Date</th>
							<th width="60">No.</th>
							<th width="50">Red A</th>
							<th width="50">Red B</th>
							<th width="50">Red C</th>
							<th width="50">Red D</th>
							<th width="50">Red E</th>
							<th width="50">Red F</th>
							<th width="50">Blue</th>
							<th width="120">Red balls</th>
							<th width="120">All balls</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $list as $item ) : ?>
						<tr class="row-line">
							<td><?php echo $item->dcb_dt?></td>
							<td><?php echo $item->dcb_num?></td>
							<td align="center" class="ball ball-r"><span><?php echo $item->rb1?></span></td>
							<td align="center" class="ball ball-r"><span><?php echo $item->rb2?></span></td>
							<td align="center" class="ball ball-r"><span><?php echo $item->rb3?></span></td>
							<td align="center" class="ball ball-r"><span><?php echo $item->rb4?></span></td>
							<td align="center" class="ball ball-r"><span><?php echo $item->rb5?></span></td>
							<td align="center" class="ball ball-r"><span><?php echo $item->rb6?></span></td>
							<td align="center" class="ball ball-b"><span><?php echo $item->blueb?></span></td>
							<td align="center"><?php echo $item->allrb?></td>
							<td align="center"><?php echo $item->allb?></td>
						</tr>
						<?php endforeach;?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="11">
								<a class="link-btn" href="javascript:jump2(1)">First</a>
								<a class="link-btn" href="javascript:jump2(<?php echo $page - 1?>)">Previous</a>
								<span>Current is <b><?php echo $page?>/<?php echo $sum?>.</b></span>
								<a class="link-btn" href="javascript:jump2(<?php echo $page + 1?>)">Next</a>
								<a class="link-btn" href="javascript:jump2(<?php echo $sum?>)">Last</a>
							</td>
						</tr>
					</tfoot>
				</table>
				
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
			