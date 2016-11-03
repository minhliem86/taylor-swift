<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic%7CRaleway:300" type="text/css">
    {!!HTML::style(env('PATH_FRONTEND')."/css/bootstrap.min.css")!!}
    {!!HTML::style(env('PATH_FRONTEND')."/css/style.css")!!}
  
	{!!HTML::script(env('PATH_FRONTEND')."/js/jquery-1.11.2.min.js")!!}
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
    <!-- TRACKING -->
		<!-- Google Analytics tracking Code -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-71289883-8', 'auto');
		  ga('send', 'pageview');

		</script>

		<!-- GA2 -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-71289883-4', 'auto');
		  ga('send', 'pageview');

		</script>


		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','https://connect.facebook.net/en_US/fbevents.js');

		fbq('init', '230561477315032');
		fbq('track', "PageView");</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=230561477315032&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
    <!-- END -->
	<title>Parfarome Thank You</title>
</head>
<body>
	<div class="bg">
		<div class="page">
			<div class="header">
				<a href="http://parfarome.vn/"><img src="{!!asset(env('PATH_FRONTEND'))!!}/images/logo.png" class="img-responsive logo" alt="LOGO Parfarome"></a>
			</div>

			<div class="line"></div>

			<div class="content">
				<div class="container container-full">
					<div class="row row-full">
						<div class="content-thanks">
							<h2 class="title">Terima kasih atas pesan Anda</h2>
							<p class="text-thanks">Terima kasih atas kiriman Anda! Kami akan menghubungi Anda sesegera mungkin.</p>
						</div>
					</div>
				</div>
				<!-- <div class="test">asdas</div> -->
			</div>

			<div class="footer">
				<div class="inner-footer clearfix">
					<div class="wrap-logo-footer col-footer">
						<a href="http://parfarome.vn/"><img src="{!!asset(env('PATH_FRONTEND'))!!}/images/ic-footer.png" class="img-responsive" alt="Parfarome"></a>
					</div>
					<div class="wrap-nav-footer col-footer clearfix">
						<div class="nav1 common-nav">
							<ul class="nav-footer">
								<li><a href="javascript:avoid()">Order</a>
									<ul class="subnav-footer">
										<li><a href="http://parfarome.vn/index.php/en/order/how-to-order">How to Order</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="nav2 common-nav">
							<ul class="nav-footer">
								<li><a href="javascript:avoid()">Our Company</a>
									<ul class="subnav-footer">
										<li><a href="http://parfarome.vn/index.php/en/about-us">About Us</a></li>
										<li><a href="http://parfarome.vn/index.php/en/contact">Contact Us</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="wrap-social col-footer">
						<div class="box-social">
							<a href="https://www.facebook.com/parfarome"><img src="{!!asset(env('PATH_FRONTEND'))!!}/images/ic-fa.png" height="31" width="31" alt="Facebook" title="Facebook"></a>
						</div>
						<div class="box-social">
							<a href="https://twitter.com/parfarome"><img src="{!!asset(env('PATH_FRONTEND'))!!}/images/ic-twitter.png" height="31" width="31" alt="Twitter" title="Twitter"></a>
						</div>
						<div class="box-social">
							<a href="https://www.instagram.com/p/62QHbuwQdO/"><img src="{!!asset(env('PATH_FRONTEND'))!!}/images/ic-ins.png" height="31" width="31" alt="Instagram" title="Instagram"></a>
						</div>
						<div class="box-social">
							<a href="https://www.linkedin.com/company/parfarome"><img src="{!!asset(env('PATH_FRONTEND'))!!}/images/ic-in.png" height="31" width="31" alt="LikedIn" title="LikedIn"></a>
						</div>
					</div>
				</div>
			</div>

			<div class="under-footer">
				<div class="inner-under-footer clearfix">
					<div class="left-under">
						<p>© 2015 Parfarome. All Rights Reserved.</p>
					</div>
					<div class="right-under">
						<p>Website Design & Development by PT Doxadigital Indonesia</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>