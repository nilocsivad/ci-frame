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

<title>[ User List ] - I Am VIP</title>

<link href="<?php echo base_url() . "static/self/html.global.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/html.frame.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/style/user/html.user.list.css" ?>" rel="stylesheet" />

<!-- jquery -->
<script src="<?php echo base_url() . "static/script/jquery/1.11.2/jquery.min.js" ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "static/self/html.script.js" ?>"></script>

<script type="text/javascript">
	function jump2( go2 ) {
		document.getElementById( "input-page" ).value = go2;
		document.getElementById( "form-search" ).submit();
	}
	function clear2go() {
		document.getElementById( "input-lname" ).value = "";
		document.getElementById( "select-status" ).options[0].selected = "selected";
		jump2( 1 );
	}
	var vHide = true;
	function toggle2( dom ) {
		if ( vHide ) {
			vHide = false;
			$( ".holder-hide" ).show( 500 );
			$( "#toggle-s" ).text( "↑" );
		} else {
			vHide = true;
			$( ".holder-hide" ).hide( 500 );
			$( "#toggle-s" ).text( "↓" );
		}
	}
</script>

<script type="text/javascript">
	function sel2( val ) {
		var select = document.getElementById( "select-status" );
		for ( var i = 0, l = select.children.length; l > i; ++i ) {
			var opt = select.children[ i ];
			if ( opt.value == val_status) {
				opt.selected = "selected";
				break;
			}
		}
	}
	var val_status = "<?php echo $status?>";
	window.onload = function() {
		sel2( val_status );
	};
</script>
<?php $remove_all = ( isset( $remove_all ) && $remove_all == true ) ?>
<?php $show_new = ( isset( $new_user ) && $new_user == true ) ?>
<?php $show_remove = ( isset( $del_user ) && $del_user == true ) ?>
</head>
<body>

	<header class="header" style="filter:alpha(opacity=75);opacity:0.75;">
		<h1 class="site-name"><a href="<?php echo base_url() ?>">I Am VIP</a></h1>
	</header>
	
	<div class="top-empty">&nbsp;</div>
	
	<div id="wrapper">
		<p class="empty">&nbsp;</p>
		
		<div class="container box-shadow">
			<h1 class="title">User List<a class="back-link" title="Back to home" href="<?php echo base_url()?>">&lt;home</a></h1>
			
			<div id="body">
		
				<form id="form-search" method="get" action="<?php echo site_url( "user/index" ) ?>">
					<p class="row-line">
						<span>Page&nbsp;</span>
						<input id="input-page" name="page" type="text" value="<?php echo $page?>" />
						<span> and </span>
						<input id="input-size" name="size" type="text" value="<?php echo $size?>" />
						<span>&nbsp;rows.&nbsp;&nbsp;</span>
						<input class="search-btn" type="submit" value="Go" />
						<?php if ( $show_new ) : ?>
						<a class="search-btn" href="<?php echo site_url( "site/new_ws" ) ?>">New</a>
						<?php endif;?>
						<a class="search-btn" id="toggle-s" href="javascript:toggle2(this)">↓</a>
					</p>
					<p class="row-line holder-hide">
						<label for="input-lname">Login Name:</label>
						<input class="search-input" id="input-lname" type="text" name="lname" value="<?php echo $lname?>" />
						<label for="select-status">Status:</label>
						<select class="search-select" id="select-status" name="status">
							<option value="">-- Select --</option>
							<option value="0">Normal</option>
							<option value="2">Locked</option>
						</select>
						<input class="search-btn" type="submit" value="Search" />
						<a class="search-btn" href="javascript:clear2go()">Clear</a>
					</p>
				</form>
			
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
					<tbody>
						<?php $idx = ( $page - 1 ) * $size + 1; ?>
						<?php foreach ( $list as $item ) : ?>
						<tr>
							<td align="center"><?php echo $idx++; ?></td>
							<td><a href="?uid=<?php echo $item->uid?>"><?php echo $item->lname?></a></td>
							<td><?php echo $item->lpwd?></td>
							<td><?php echo $item->status?></td>
						</tr>
						<?php endforeach;?>
					</tbody>
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
