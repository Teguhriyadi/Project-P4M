
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="encoding" content="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='viewport' content='width=device-width, initial-scale=1' />
	<title>Website Resmi Desa Arahan Lor Kecamatan Arut Selatan Kabupaten Kotawaringin Barat</title>
	@include('pengunjung/layouts/partials/css/style_css')
	@include('pengunjung/layouts/partials/js/style_js')
</head>
<body>
	<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
	<div class="container" style="background-color: #f6f6f6;">
		
		@include('pengunjung.layouts.head')
		@include('pengunjung.layouts.menu')
		
		<div class="row">
			<section>
				<div class="content_middle"></div>
				<div class="content_bottom">
					<div class="col-lg-9 col-md-9">
						<div class="content_bottom_left" style="margin-bottom:10px;">
							<div class="archive_style_1">
								<div style="margin-top:10px;">
									<marquee onmouseover="this.stop()" onmouseout="this.start()">
										<span class="teks" style="font-family: Oswald; padding-right: 50px;">
											Ini contoh teks berjalan. Isi dengan tulisan yang menampilkan suatu ciri atau kegiatan penting di desa anda.
											<a href="artikel/" rel="noopener noreferrer" title="Baca Selengkapnya"></a>
										</span>
									</marquee>
								</div>
								
								<style type="text/css">
									.slick_slider img {
										width: 100%;
									}
									.slick_slider, .cycle-slideshow {
										max-height: 350px;
										border: 5px solid #e5e5e500;
										display: block;
										position: relative;
										/*margin: 0px auto;*/
										overflow: hidden;
									}
									.textgambar{
										position: absolute;
										left: 20px;
										top: 280px;
										color: black;
										font-weight: bold;
										font-family: Oswald;
										
										background-color: #ffffff;
										border: 1px solid black;
										border-radius: 3px;
										padding: 5px;
										opacity: 0.6;
										filter: alpha(opacity=60); /* For IE8 and earlier */
									}
								</style>
								<div class="slick_slider" style="margin-bottom:5px;">
								</div>
							</div>
							@yield('page_content')
						</div>
					</div>
					<div class="col-lg-3 col-md-3">
						<div class="content_bottom_right">
							<div id="jam" align="center" style="margin:5px 0 5px 0; background:#61ba6d;border:3px double #ffffff;padding:3px;width:auto; color:#fff;"></div>
							
							<style type="text/css">
								.highcharts-xaxis-labels tspan {font-size: 8px;}
							</style>
							
							@include('pengunjung/widget/widget_berita_terbaru')
							
							@include('pengunjung/widget/widget_wilayah_desa')
							
							@include('pengunjung/widget/widget_lokasi_kantor')
							
						</div>
						
					</div>
				</div>
			</section>
		</div>
	</div>
	
	@include('pengunjung.layouts.foot')
	
</body>
</html>