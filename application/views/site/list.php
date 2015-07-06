<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>[site/list] - ci-frame</title>

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
.search-txtarea {
	outline: none;
	resize:none;
}
.search-btn {
	cursor: pointer;
	outline: none;
	background: none;
	border: 1px solid #6699FF;
	padding: 1px 20px;
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
		<h1>Welcome to CodeIgniter!</h1>
		
		<div id="body">
		
			<form id="form-search" method="get" action="<?php echo site_url( "site/index" ) ?>">
				<input id="input-page" name="page" type="hidden" value="<?php echo $page?>" />
				<table>
					<tr>
						<td><label for="input-title">Title:</label></td>
						<td><input class="search-input" id="input-title" type="text" name="title" value="<?php echo $title?>" /></td>
						<td><label for="input-url">URL:</label></td>
						<td><input class="search-input" id="input-url" type="text" name="url" value="<?php echo $url?>" /></td>
						<td rowspan="2">
							<input class="search-btn" onclick="jump2(1)" type="submit" value="Search" />
							<a class="search-btn" href="<?php echo site_url( "site/new_ws" ) ?>">New</a>
						</td>
					</tr>
					<tr>
						<td><label for="input-comment">Comment:</label></td>
						<td colspan="3"><textarea cols="43" class="search-txtarea" id="input-comment" name="comment"><?php echo $comment?></textarea></td>
					</tr>
				</table>
			</form>
			
			<div>&nbsp;</div>
		
			<table>
				<thead>
					<tr>
						<td colspan="4">
							<a class="link-btn" href="javascript:jump2(1)">First</a>
							<a class="link-btn" href="javascript:jump2(<?php echo $page - 1?>)">Previous</a>
							<span>Current is <b><?php echo $page?>.</b></span>
							<a class="link-btn" href="javascript:jump2(<?php echo $page + 1?>)">Next</a>
							<a class="link-btn" href="javascript:jump2(<?php echo $sum?>)">Last</a>
						</td>
					</tr>
					<tr>
						<th width="70">No.</th>
						<th>Login Name</th>
						<th>Password</th>
						<th>Status</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="4">
							<a class="link-btn" href="javascript:jump2(1)">First</a>
							<a class="link-btn" href="javascript:jump2(<?php echo $page - 1?>)">Previous</a>
							<span>Current is <b><?php echo $page?>.</b></span>
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