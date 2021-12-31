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
	<style>
		.header-content img {
			margin: -5px 10px 0 0;
			width: 80px;
		}

		.header-content a b {
			font-size:22px;
			font-weight:400;
			text-transform:uppercase;
		}

		.header-content a span {
			font-size:16px;
			font-weight:400;
		}

		@media only screen and (max-width: 378px) {
			.header-area {
				height: 160px;
			}

			.header-content img {
				margin-top: 10px;
				width: 50px
			}

			.header-content .brand {
				margin-top: -15px;
			}

			.header-content a b {
				font-size:18px;
			}
		}
	</style>
</head>
<body>
	@if (session('message'))
	{!! session('message') !!}            
	@endif
	<header class="header-area">
		<div class="top-header">
			<div class="container">
				<div class="header-content align-items-center justify-content-between" >
					<img src="{{ url('/frontend') }}/img/logo-kabupaten.png" alt="Sistem Informasi Desa Arahan Lor" align="left" />
					<div class="row">
						<div class="col-md-7 col-xs-12 col-sm-12 mt-md-2 brand">
							<a href="" title="Sistem Informasi Desa Arahan Lor">
								<b>Sistem Informasi Desa Arahan Lor</b><br/>
								<span>Kec. Arahan, Kab. Indramayu, Jawa Barat </span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="academy-main-menu">
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
										<a href="{{ url('/') }}" title="Beranda">Beranda</a>
									</li>
									<li>
										<a href="{{ url('/') }}" title="Profil">Profil</a>
									</li>
									<li>
										<a href="{{ url('/') }}" title="Visi Dan Misi">Visi Dan Misi</a>
									</li>
									<li>
										<a href="{{ url('/') }}" title="Struktur Organisasi">Struktur Organisasi</a>
									</li>
									<li>
										<a href="{{ url('/berita') }}" title="Data Penduduk">Data Penduduk</a>
									</li>
									<li>
										<a href="{{ url('/berita') }}" title="Berita">Berita</a>
									</li>
									<li>
										<a href="{{ url('/galeri') }}" title="Galeri">Galeri</a>
									</li>
									<li>
										<a href="{{ url('/kontak') }}" title="Kontak">Kontak</a>
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
	
	@include('pengunjung/layouts/breadcumb')

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
