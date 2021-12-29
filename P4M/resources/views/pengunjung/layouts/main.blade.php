<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="title" content="Sistem Informasi Desa Arahan Lor"./>
	<meta name="description" content="Sistem Informasi Desa Arahan Lor - Sistem Informasi Desa Arahan Lor"./>
	<meta name="keywords" content="Sistem Informasi Desa Arahan Lor"./>
	<meta name="copyright" content="hakim"./>
	<meta name="author" content="hakim"./>

	@include('pengunjung/layouts/partials/css/style_css')

</head>
<body>
	<header class="header-area">
		<div class="top-header">
			<div class="container">
				<div class="header-content align-items-center justify-content-between" >
					<div class="row">
						<div class="col-md-6">
							<a href="" title="Sistem Informasi Desa Arahan Lor">
								<img src="{{ url('/frontend') }}/img/logo-kabupaten.png" alt="Sistem Informasi Desa Arahan Lor" align="left" width="80" style="margin:-5px 10px 0 0"./>
								<b style="font-size:22px;margin-top:20px;font-weight:400;text-transform:uppercase;">Sistem Informasi Desa Arahan Lor</b><br/>
								<span style="font-size:16px;font-weight:400;">Kec. Arahan, Kab. Indramayu, Jawa Barat </span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div><div class="academy-main-menu">
			<div class="classy-nav-container breakpoint-off">
				<div class="container">
					<nav class="classy-navbar justify-content-between" id="academyNav">
						<div class="classy-navbar-toggler">
							<span class="navbarToggler">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</div>
						<div class="classy-menu">
							<div class="classycloseIcon">
								<div class="cross-wrap">
									<span class="top"></span>
									<span class="bottom"></span>
								</div>
							</div>
							<div class="classynav">
								<ul>
									<li>
										<a href="/" title="Beranda">Beranda</a>
									</li>
									<li>
										<a href="/berita" title="Berita">Berita</a>
									</li>
									<li>
										<a href="/galeri" title="Galeri">Galeri</a>
									</li>
									<li>
										<a href="/kontak" title="Kontak">Kontak</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="calling-info">
							<div class="call-center">
								<a href="tel:0000000" ><i class="fa fa-phone-alt"></i></a>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<section class="hero-area">
		<div class="hero-slides owl-carousel">
			<div class="single-hero-slide bg-img" style="background-image: url('{{ url('/frontend') }}/img/kantor-desa.jpeg');">
			</div>
		</div>
	</section>
	<section class="about-us-area section-padding-50">
		<div class="container">
			@yield('page_content')
		</div>
	</section>
	<footer class="footer-area">
		<div class="bottom-footer-area">
			<div class="container">
				<p>Copyright &copy; 2021-{{ date('Y') }} Arahan Lor</p>
			</div>
		</div>
	</footer>

    @include("pengunjung/layouts/partials/js/style_js")

</body>
</html>
