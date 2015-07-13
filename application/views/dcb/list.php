<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>[ Double Color Ball ] - ci-frame</title>

<style type="text/css">
::selection {
	background-color: #E13300;
	color: white;
}

::-moz-selection {
	background-color: #E13300;
	color: white;
}

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#body {
	margin: 0 15px 0 15px;
}

p.footer {
	text-align: right;
	font-size: 11px;
	border-top: 1px solid #D0D0D0;
	line-height: 32px;
	padding: 0 10px 0 10px;
	margin: 20px 0 0 0;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

a.link-btn {
	border: 1px solid #ccc;
	padding: 4px 10px;
}

a.link-btn:hover,
a.link-btn:active {
	color: red;
	border: 1px solid #6699FF;
}

.search-input {
	outline: none;
	border: 1px solid #ccc;
	width: 160px;
}
.search-select {
	outline: none;
	border: 1px solid #ccc;
	width: 100px;
}
.search-btn {
	cursor: pointer;
	outline: none;
	background: none;
	border: 1px solid #6699FF;
	padding: 1px 20px;
}

.ball span {
	background: red;
	display:block;
	width:24px;
	height:24px;
	line-height:24px;
	margin:0 auto;
	cursor:pointer;
	border-radius:12px;
	text-align:center;
	color:white;
}
.ball-r span {
	background: #c00000;
}
.ball-b span {
	background: #0000c0;
}
.hide-dom {
	display: none;
}
</style>

<script type="text/javascript">
	function jump2( go2 ) {
		document.getElementById( "input-page" ).value = go2;
		document.getElementById( "form-search" ).submit();
	}
</script>
</head>
<body>

	<div id="container">
		<h1>Double Color Ball<a href="<?php echo base_url() ?>" style="float:right;">home</a></h1>
		
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
				<input id="input-page" name="page" type="text" value="<?php echo $page?>" />
				<input id="input-page" name="size" type="text" value="<?php echo $size?>" />
				<input class="search-btn" type="submit" value="Search" />
			</form>
			<div>&nbsp;</div>
			
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
					<tr>
						<th width="70">Date</th>
						<th width="50">No.</th>
						<th width="40">Red A</th>
						<th width="40">Red B</th>
						<th width="40">Red C</th>
						<th width="40">Red D</th>
						<th width="40">Red E</th>
						<th width="40">Red F</th>
						<th width="40">Blue</th>
						<th width="40">--</th>
						<th width="40">--</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $list as $item ) : ?>
					<tr>
						<td><?php echo $item->dcb_dt?></td>
						<td><?php echo $item->dcb_num?></td>
						<td align="center" class="ball ball-r"><span><?php echo $item->rb1?></span></td>
						<td align="center" class="ball ball-r"><span><?php echo $item->rb2?></span></td>
						<td align="center" class="ball ball-r"><span><?php echo $item->rb3?></span></td>
						<td align="center" class="ball ball-r"><span><?php echo $item->rb4?></span></td>
						<td align="center" class="ball ball-r"><span><?php echo $item->rb5?></span></td>
						<td align="center" class="ball ball-r"><span><?php echo $item->rb6?></span></td>
						<td align="center" class="ball ball-b"><span><?php echo $item->blueb?></span></td>
						<td><?php echo $item->allrb?></td>
						<td><?php echo $item->allb?></td>
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
			
			<p><?php echo date("l Y-m-d H:i:s")?>
		
		</div>
		

		<p class="footer">
			Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
		</p>
	</div>

</body>
</html>