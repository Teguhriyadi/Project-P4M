@php
    // setlocale(LC_ALL, 'id_ID', 'id', 'ID');
@endphp
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="encoding" content="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='viewport' content='width=device-width, initial-scale=1' />
	<title>Website Resmi Desa Arahan Lor Kecamatan Arut Selatan Kabupaten Kotawaringin Barat</title>
	@include('pengunjung/layouts/partials/css/style_css')

	<style>
		#piechart g {
			cursor: pointer;
		}
	</style>

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
								
								@include('pengunjung.layouts.teks-berjalan')
								
								@if (Request::is('/'))

								@include('pengunjung.layouts.sliders')

								@endif
								
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

	@yield('page_scripts')
	
</body>
</html>