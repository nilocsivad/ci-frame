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

<title>[ Index ] - I Am VIP</title>

<link href="<?php echo base_url() . "static/self/html.global.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/html.frame.css" ?>" rel="stylesheet" />
<link href="<?php echo base_url() . "static/self/style/html.welcome.index.css" ?>" rel="stylesheet" />

<!-- jquery -->
<script src="<?php echo base_url() . "static/script/jquery/1.11.2/jquery.min.js" ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . "static/self/html.script.js" ?>"></script>
<script type="text/javascript">
	var body_w = 0;
	var auto_scroll_timer = null;
	var isSetAutoScroll = false;
	var LONG_DELAY_TIME = 3000;
	
	function init() {

		if ( window.getComputedStyle ) {
			var body_w_str = window.getComputedStyle(document.body).width;
				body_w_str = body_w_str.substring(0, body_w_str.length - 2);
			body_w = window.parseInt(body_w_str);
		} else {
			body_w = $(window).width();
		}

		var scroll = document.getElementById("scroll-dom");
		scroll.style.left = "0px";

		var items = scroll.getElementsByTagName("li");
		for (var i = 0, l = items.length; l > i; ++i) {
			var li = items[i];
			li.style.width = body_w + "px";
			li.style.backgroundPosition = "center";
		}

		if (!isSetAutoScroll) {
			auto_scroll_timer = window.setInterval(function() {
				introduce_scroll('scroll-dom', 'right');
			}, LONG_DELAY_TIME);
			isSetAutoScroll = true;
		}
	};
	window.onload = init;
	window.onresize = function() {
		window.setTimeout( init, 100 );
	};
</script>
</head>
<body>

	<header class="header" style="filter:alpha(opacity=75);opacity:0.75;">
		<h1 class="site-name"><a href="<?php echo base_url()?>">I Am VIP</a></h1>
	</header>
	
	<div id="wrapper">
		
		<div id="img-introduce">
			<div class="full-box" onmouseover="auto_scroll( false )" onmouseout="auto_scroll( true )">
				<ol id="scroll-dom">
					<li style="background:url('<?php echo base_url() . "static/images/scroll/1008.jpg" ?>') center center no-repeat;" /><a href="<?php echo site_url( "doublecolorball" ) ?>">&nbsp;</a></li>
					<li style="background:url('<?php echo base_url() . "static/images/scroll/1003.jpg" ?>') center center no-repeat;" /><a href="<?php echo site_url( "site" ) ?>">&nbsp;</a></li>
					<li style="background:url('<?php echo base_url() . "static/images/scroll/1002.jpg" ?>') center center no-repeat;" /><a href="<?php echo site_url( "user" ) ?>">&nbsp;</a></li>
					<li style="background:url('<?php echo base_url() . "static/images/scroll/1001.jpg" ?>') center center no-repeat;" /><a href="#">&nbsp;</a></li>
					<li style="background:url('<?php echo base_url() . "static/images/scroll/1004.jpg" ?>') center center no-repeat;" /><a href="#">&nbsp;</a></li>
					<li style="background:url('<?php echo base_url() . "static/images/scroll/1006.jpg" ?>') center center no-repeat;" /><a href="#">&nbsp;</a></li>
					<li style="background:url('<?php echo base_url() . "static/images/scroll/1007.jpg" ?>') center center no-repeat;" /><a href="#">&nbsp;</a></li>
				</ol>
			</div>
			<a class="cur-intro cur-l" href="javascript:introduce_scroll('scroll-dom','left')" style="filter:alpha(opacity=50);opacity:0.5;"> <img class="i-l" src="<?php echo base_url() . "static/images/cursor/prev.png" ?>" /></a> 
			<a class="cur-intro cur-r" href="javascript:introduce_scroll('scroll-dom','right')" style="filter:alpha(opacity=50);opacity:0.5;"> <img class="i-r" src="<?php echo base_url() . "static/images/cursor/next.png" ?>" /></a>
			<script type="text/javascript">
				function auto_scroll(enable) {
					if (enable) {
						if (!isSetAutoScroll) {
							auto_scroll_timer = window.setInterval(function() {
								introduce_scroll('scroll-dom', 'right');
							}, LONG_DELAY_TIME);
						}
					} else {
						window.clearInterval(auto_scroll_timer);
					}
					isSetAutoScroll = enable;
				}
			</script>
			<script type="text/javascript">
				var isScrolling = false;
				function introduce_scroll(olID, direction) {
	
					if (isScrolling) {
						return;
					}
					isScrolling = true;
	
					var liWidth = body_w;
					var count = 1;
					var num = 50;
	
					var scroll_dom = document.getElementById(olID);
					var str_left = scroll_dom.style.left;
						str_left = str_left.substring(0, str_left.length - 2);
					var left = window.parseInt(str_left);

					var len = scroll_dom.getElementsByTagName("li").length;
					var ol_width = len * liWidth;
	
					var go = 0;
					if (direction == 'left') {
						if (-left <= 0) {
							num = 200;
							go = liWidth * count - ol_width;
						} else {
							go = left + liWidth;
						}
					} else {
						if (-left >= ol_width - liWidth * count) {
							go = 0;
							num = 200;
						} else {
							go = left - liWidth;
						}
					}
	
					if (go > left) {
						var timer = window.setInterval(function() {
							if (left < go) {
								left += num;
								scroll_dom.style.left = left + "px";
							} else {
								window.clearInterval(timer);
								scroll_dom.style.left = go + "px";
								isScrolling = false;
							}
						}, 1);
					} else {
						var timer = window.setInterval(function() {
							if (left > go) {
								left -= num;
								scroll_dom.style.left = left + "px";
							} else {
								window.clearInterval(timer);
								scroll_dom.style.left = go + "px";
								isScrolling = false;
							}
						}, 1);
					}
				}
			</script>
		</div>
		
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
		
	</div>
	
	<footer class="footer">
		<p class="declare">
			当前站点所有内容均为个人学习行为,如有侵权,请及时联系 <a href="mailto:nilocsivad@163.com">nilocsivad@163.com</a> 更改, 谢谢!
		</p>
	</footer>

</body>
</html>
