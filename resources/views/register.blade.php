<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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

	<title>Parfarome</title>
</head>
<body>
	<div class="bg">
		<div class="page">
			<div class="header">
				<a href="javascript:avoid()"><img src="{!!asset(env('PATH_FRONTEND').'/images/logo.png')!!}" class="img-responsive logo" alt="LOGO Parfarome"></a>
			</div>

			<div class="line"></div>

			<div class="wrap-content">
				<div class="content">
					<div class="container container-full">
						<div class="row row-full">
							<div class="col-md-7 col-sm-12 col-full">
								<div class="wrap-left">
									<div class="table-cell">
										<div class="wrap-content-left">
											<h2 class="title">Hello fragrance lovers !!! </h2>
											<p class="content-left">Saat ini Taylor's Perfume dari Taylor Swift menduduki peringkat teratas dan menjadi produk Parfarome yang paling diminati. Parfum ini memiliki aroma yang manis dan segar, cocok digunakan sebagai parfum harian kamu yang memiliki jiwa muda, feminim, dan penuh semangat. Daftar sekarang dan dapatkan segera Taylor's Perfume dari koleksi Parfarome di toko parfum isi ulang terdekat!</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-5 col-sm-12 col-full">
								<div class="wrap-right">
									<div class="wrap-form">
										@if($errors->all())
										<ul class="alert alert-info list-error">
											@foreach($errors->all() as $er)
												<li>{!!$er!!}</li>
											@endforeach
										</ul>
										@endif
										{!!Form::open(array('route'=>'postRegisterTaylor','class'=>'form-register','id'=>'formRegister'))!!}
											<div class="form-group">
												<input type="text" name="fullname" class="form-control" placeholder="Name..." value="{!!old('fullname')!!}">
											</div>
											<div class="form-group">
												<input type="email" name="email" class="form-control" placeholder="Email..." value="{!!old('email')!!}">
											</div>
											<div class="form-group">
												<input type="text" name="address" class="form-control" placeholder="Address..." value="{!!old('address')!!}">
											</div>

											<div class="form-group">
												<input type="text" name="phone" class="form-control" placeholder="Phone..." value="{!!old('phone')!!}">
											</div>
											<div class="form-group">
												<textarea name="feedback" rows="3" class="form-control" placeholder="Feedback..." value="{!!old('feedback')!!}"></textarea>
											</div>
											<div class="form-group clearfix">
												<div class="left col">
													<img src="{!!asset(env('PATH_FRONTEND'))!!}/images/refresh.png" alt="Refresh" class="btn-refresh" >
													<div class="refreshcaptcha">
														{!!captcha_img()!!}
													</div>
												</div>
												<div class="right col">
													{!!Form::text('captcha','',array('class'=>'form-control'))!!}
												</div>
											</div>
											<div class="form-group text-center">
												<input type="submit" name="submit" value="Register">
												<i class="waiting"></i>
											</div>
										{!!Form::close()!!}
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="test">asdas</div> -->
				</div>

				<!-- <div class="footer">
					<div class="inner-footer clearfix">
						<div class="wrap-logo-footer col-footer">
							<a href="javascript:avoid()"><img src="{!!asset(env('PATH_FRONTEND').'/images/ic-footer.png')!!} " class="img-responsive" alt="Parfarome"></a>
						</div>
						<div class="wrap-nav-footer col-footer clearfix">
							<div class="nav1 common-nav">
								<ul class="nav-footer">
									<li><a href="javascript:avoid()">Order</a>
										<ul class="subnav-footer">
											<li><a href="javascript:avoid()">How to Order</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="nav2 common-nav">
								<ul class="nav-footer">
									<li><a href="javascript:avoid()">Our Company</a>
										<ul class="subnav-footer">
											<li><a href="javascript:avoid()">About Us</a></li>
											<li><a href="javascript:avoid()">Contact Us</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
						<div class="wrap-social col-footer">
							<div class="box-social">
								<a href="javascript:avoid()"><img src="{!!asset(env('PATH_FRONTEND').'/images/ic-fa.png')!!}" height="31" width="31" alt="Facebook" title="Facebook"></a>
							</div>
							<div class="box-social">
								<a href="javascript:avoid()"><img src="{!!asset(env('PATH_FRONTEND').'/images/ic-twitter.png')!!}" height="31" width="31" alt="Twitter" title="Twitter"></a>
							</div>
							<div class="box-social">
								<a href="javascript:avoid()"><img src="{!!asset(env('PATH_FRONTEND').'/images/ic-ins.png')!!}" height="31" width="31" alt="Instagram" title="Instagram"></a>
							</div>
							<div class="box-social">
								<a href="javascript:avoid()"><img src="{!!asset(env('PATH_FRONTEND').'/images/ic-in.png')!!}" height="31" width="31" alt="LikedIn" title="LikedIn"></a>
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
				</div> -->
			</div>

		</div>
	</div>
	<script>
	    $(document).ready(function(){
	    // 	 function setHeight() {
			  //   windowHeight = $(window).innerHeight();
			  //   headerHiehgt = $('.header').outerHeight();
			  //   lineHeight = $('.line').outerHeight();
			  //   console.log(headerHiehgt);
			  //   $('.content, .wrap-left, .wrap-right').css('min-height', windowHeight-(headerHiehgt + lineHeight));
			  //   // $('.test').css({'height':'100%'})
			  // };
			  // setHeight();

			  // $(window).resize(function(){
			  // 	setHeight();
			  // })

			 var form = $('#formRegister').validate({
			  	rules:{
			  		fullname: {
			  			"required": true,
			  			'maxlength': 25
			  		},
			  		email : {
			  			required: true,
			  			email: true
			  		},
			  		address:{
			  			'required': true,
			  			'maxlength': 40
			  		},
			  		// profile: "required",
			  		phone: {
			  			'required': true,
			  			'minlength': 7,
			  			'maxlength': 20,
			  		},
			  		// province: 'required',
			  		feedback: {
			  			'maxlength':100
			  		}
			  	},
			  });

			 $('.btn-refresh').click(function(){
			 	$.ajax({
			 		url:'{!!route("refresh-captcha")!!}',
			 		type:'POST',
			 		data: {_token:$("[name='csrf-token']").attr('content') },
			 		beforeSend:function(){

			 		},
			 		success:function(data){
			 			$('.refreshcaptcha').html(data);
			 		}
			 	})
			 })
	    })
    </script>

</body>
</html>