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

<title>[ Web Site List ] - I Am VIP</title>

<link href="<?php echo base_url() . "static/self/html.global.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/html.frame.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/style/site/html.site.list.css" ?>" rel="stylesheet" />

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
	function remove(dom,rID,idx) {
		var txt = $( "#row-dt-id-" + idx ).text();
			txt = txt.substring( 0, txt.length - 2 ).trim();
		if ( window.confirm( "Remove this item, are you sure?" ) ) {
			$.ajax({
				url: "<?php echo site_url( "site/remove" )?>",
				method: "post",
				data: { "random_id" : rID, "dt_id" : txt },
				success: function() {
					$( "#row-line-id-" + idx ).remove();
				},
				error: function() {
					window.alert( "Error to remove this item, please try again!" );
				}
			});
		}
	}
</script>
</head>
<body>

	<header class="header">
		<h1 class="site-name"><a href="<?php echo base_url() ?>">I Am VIP</a></h1>
	</header>
	
	<div id="wrapper">
		<p class="empty">&nbsp;</p>
		
		<div class="container box-shadow">
			<h1 class="title">Web Site List</h1>
			
			<div id="body">
			
				<form id="form-search" method="get" action="<?php echo site_url( "site/index" ) ?>">
					<p class="row-line">
						<span>Page&nbsp;</span>
						<input id="input-page" name="page" type="text" value="<?php echo $page?>" />
						<span> and </span>
						<input id="input-size" name="size" type="text" value="<?php echo $size?>" />
						<span>&nbsp;rows.&nbsp;&nbsp;</span>
						<input class="search-btn" type="submit" value="Go" />
						<a class="search-btn" href="<?php echo site_url( "site/new_ws" ) ?>">New</a>
						<a class="search-btn" id="toggle-s" href="javascript:toggle2(this)">↓</a>
					</p>
					<p class="row-line holder-hide">
						<label for="input-title">Title:</label>
						<input class="search-input" id="input-title" type="text" name="title" value="<?php echo $title?>" />
					</p>
					<p class="row-line holder-hide">
						<label for="input-url">URL:</label>
						<input class="search-input" id="input-url" type="text" name="url" value="<?php echo $url?>" />
					</p>
					<p class="row-line holder-hide">
						<label for="input-comment">Comment:</label>
						<textarea cols="36" rows="4" class="search-txtarea" id="input-comment" name="comment"><?php echo $comment?></textarea>
						<input class="search-btn" type="submit" value="Search" />
					</p>
				</form>
			
				<table class="list-table">
					<thead>
						<tr>
							<td colspan="3">
								<a class="link-btn" href="javascript:jump2(1)">First</a>
								<a class="link-btn" href="javascript:jump2(<?php echo $page - 1?>)">Previous</a>
								<span>Current is <b><?php echo $page?>/<?php echo $sum?>.</b></span>
								<a class="link-btn" href="javascript:jump2(<?php echo $page + 1?>)">Next</a>
								<a class="link-btn" href="javascript:jump2(<?php echo $sum?>)">Last</a>
							</td>
						</tr>
						<tr class="row-title" align="left">
							<th>Title</th>
							<th>Store Time</th>
							<th>URL</th>
						</tr>
					</thead>
					<tbody>
						<?php $index = 1;?>
						<?php foreach ( $list as $item ) : ?>
						<tr class="row-line" id="<?php echo ( "row-line-id-" . $index )?>">
							<td colspan="3">
								<div class="row-item">
									<p class="item-line" title="<?php echo $item->title . " " . $item->dt_id?>">
										<span><?php echo $item->title?></span>
										<span>&nbsp;</span>
										<span class="dt-span" id="<?php echo ( "row-dt-id-" . $index )?>"><?php echo $item->dt_id?>&nbsp;<a title="Remove this item" class="item-del" href="javascript:remove(this,<?php echo $item->random_id?>,<?php echo ( $index++ )?>)">&times;</a></span>
									</p>
									<p class="item-line" title="<?php echo $item->url?>">
										<a target="_blank" href="<?php echo $item->url?>"><?php echo $item->url?></a>
									</p>
								</div>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="3">
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
