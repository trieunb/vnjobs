<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title', isset($title) ?: 'Nhà tuyển dụng' ) - VnJobs</title>
		{{ HTML::style('assets/ntd/css/bootstrap.min.css') }}
		{{ HTML::style('assets/ntd/css/style.css') }}
		@yield('style')
	</head>
	<body>
		<div class="wrapper">
			<div class="head-main">
				<div class="page">
					<header>
						<div class="row">
							<div class="col-xs-4">
								<a href="{{ URL::route('employers.home') }}">
									{{ HTML::image('assets/ntd/images/logo.png') }}
								</a>
							</div>
							<div class="col-xs-8">
								<div class="row">
									<div class="col-xs-12">
										<ul class="pull-right nav-menu">
											<li><a href="#">SẢN PHẨM & DỊCH VỤ</a></li>
											<li><a href="#">LIÊN HỆ NGAY</a></li>
											<li><a href="#">GIỚI THIỆU</a></li>
											<li class="active"><a href="{{ URL::route('jobseekers.home') }}">NGƯỜI TÌM VIỆC</a></li>
										</ul>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<ul class="pull-right language">
											<li><a href="#">Tiếng Việt</a></li>
											<li><a href="#">English</a></li>
											<li><a href="#">日本語</a></li>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
					</header>
					<div class="row">
					
					@yield('content')

					</div>
				</div>
			</div>
			<footer>
				<div id="above">
					<div class="footer-page">
						<div class="row">
							<div class="col-xs-12">
								<ul class="pull-right bottom-navigation">
									<li><a href="#">Giới Thiệu</a></li>
									<li><a href="#">Bảo Mật Thông Tin</a></li>
									<li><a href="#">Góc Báo Chí</a></li>
									<li><a href="#">Hỏi Đáp</a></li>
									<li><a href="#">Quy Định Sử Dụng</a></li>
									<li><a href="#">Tư Vấn Tuyển Dụng</a></li>
								</ul>
							</div>
							<div class="clearfix"></div>
							<div class="col-xs-12">
								<div class="text-center">
									<span>Kết nối với vnjobs.vn:</span>
								</div>
								<div class="clearfix"></div>
								<ul class="socials">
									<li><a href="#">{{ HTML::image('assets/ntd/images/social-rss.png') }}</a></li>
									<li><a href="#">{{ HTML::image('assets/ntd/images/social-facebook.png') }}</a></li>
									<li><a href="#">{{ HTML::image('assets/ntd/images/social-twitter.png') }}</a></li>
									<li><a href="#">{{ HTML::image('assets/ntd/images/social-dribbble.png') }}</a></li>
									<li><a href="#">{{ HTML::image('assets/ntd/images/social-pinterest.png') }}</a></li>
									<li><a href="#">{{ HTML::image('assets/ntd/images/social-linkedin.png') }}</a></li>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
				<div class="clearfix"></div>
				<div id="below">
					<div class="">
						<div class="center">
							<span class="copyright">Copyright 2015 Công ty TNHH Minh Phuc (MP Telecom)</span>
						</div>
					</div>
				</div>
			</footer>
		</div> <!-- end #wrapper -->
	</body>
	{{ HTML::script('assets/js/jquery.1.11.1.min.js') }}
	{{ HTML::script('assets/ntd/js/bootstrap.min.js') }}
	@yield('script')
</html>