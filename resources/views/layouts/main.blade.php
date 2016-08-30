<!DOCTYPE HTML>
<html>
<head>
<title>在线点餐</title>
<link href="{{asset('/resources/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
<link href="{{asset('/resources/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <link rel="stylesheet" href="{{asset('/resources/css/flexslider.css')}}" type="text/css" media="screen" />
 <script src="{{asset('/resources/js/jquery-1.11.1.min.js')}}"></script>
  <script src="{{asset('/resources/js/bootstrap.js')}}"> </script>
  <!---- start-smoth-scrolling---->
<script type="text/javascript" src="{{asset('/resources/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('/resources/js/easing.js')}}"></script>
<meta name="_token" content="{{ csrf_token() }}"/>
 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<!---End-smoth-scrolling---->
<!-- cart -->   
		<script src="{{asset('/resources/js/simpleCart.min.js')}}"> </script>
	<!-- cart -->

</head>
<body>
		<!-- start-header section-->
			<div class="header">
				<div class="container">
				     <div class="top-header">
						<div class="phone">
							<ul>
								<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></li>
								<li><p>座号:{{$seat_id}}</p></li>

							</ul>
						</div>
						<div class="logo">
							<h1><a href="#">在线点餐系统</a></h1>
						</div>
						<div class="header-right">
						<!-- <div class="login">
						<a href="login.html">login</a>
						</div> -->
						<div class="cart box_1">
							<a href="/checkout/{{$seat_id}}">
								<!-- <h3> <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span> items)<img src="{{asset('/resources/images/bag.png')}}" alt=""></h3> -->
								<img src="{{asset('/resources/images/bag.png')}}" alt="">
							</a>	
							<!-- <p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
							<div class="clearfix"> </div> -->
						</div>
				</div>
		
						<div class="clearfix"></div>
					</div>	
				</div>
			</div>
		<!-- end-header section-->
		<!--start-banner-->
			<div class="banner ban1">
				<div class="container">
					<div class="top-menu">
					<span class="menu"><img src="{{asset('resources/images/nav.png')}}" alt=""/> </span>
						<ul>
							<li><a  href="/welcome/{{$seat_id}}">主页</a></li>
							<li><a  href="/menu/{{$seat_id}}">菜单</a></li>
							<li><a  href="#">关于</a></li>
						</ul>
						<!-- <a  href="/welcome/{{$seat_id}}">主页</a> &nbsp;
						<a  href="/menu/{{$seat_id}}">菜单</a> &nbsp;
						<a  href="#">关于</a> -->
						<!-- script for menu -->
									
							 <script>
							 $("span.menu").click(function(){
							 $(".top-menu ul").slideToggle("slow" , function(){
							 });
							 });
							 </script>
						<!-- //script for menu -->
					</div>
					</div>	
			</div>
		
			@yield('content')
			<div class="specials-section">
				<div class="container">
					<div class="col-md-3 specials">
					<h3>about</h3>
					<p>Morbi pretium gravida justo nec ultrices. Ut et facilisis justo. Fusce ac turpis eros, vel molestie lectus.feugiat velit velit non turpis</p>
				</div>
				<div class="col-md-3 specials1">
				<h3>specials</h3>
				<ul>
					<li><a href="#">New Listing Sign-Up</a></li>
					<li><a href="#">Consectetur adipiscing</a></li>
					<li><a href="#">Integer molestie lorem</a></li>
					<li><a href="#">Facilisis in pretium nisl</a></li>
				</ul>
				</div>
			<div class="col-md-3 specials1">
			<h3>recipes</h3>
			<ul>
				<li><a href="#">Integer molestie lorem</a></li>
				<li><a href="#">Integer molestie lorem</a></li>
				<li><a href="#">Consectetur adipiscing</a></li>
				<li><a href="#">Lorem ipsum dolor sit</a></li>
			</ul>
			</div>
			<div class="col-md-3 specials1">
			<h3>social</h3>
			<ul>
				<li><a href="#">facebook</a></li>
				<li><a href="#">twitter</a></li>
				<li><a href="#">google</a></li>
				<li><a href="#">viemo</a></li>
			</ul>
			</div>
			<div class="clearfix"></div>
			</div>
			</div>
	</div>
	<div class="footer-section">
					<div class="container">
						<div class="footer-top">
						<p>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
					</div>
					<script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


					</div>
					</div>


	
</body>

</html>
	