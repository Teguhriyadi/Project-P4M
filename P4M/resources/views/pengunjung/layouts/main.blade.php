@php
use App\Models\Model\Profil;
$profil = Profil::first();
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="encoding" content="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <title>Desa {{ $profil ? $profil->nama_desa : 'Anonymous' }}</title>
    <link rel="icon" href="{{ $profil ? url('/storage/'.$profil->gambar) : url('/frontend/img/logo-desa.png') }}">
    @include('pengunjung.layouts.partials.css.style_css')

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

                            {{-- @include('pengunjung.widget.widget_program_bantuan') --}}

                            @include('pengunjung.widget.widget_statistik_penduduk')

                            @include('pengunjung.widget.widget_berita_terbaru')

                            @include('pengunjung.widget.widget_komentar_terbaru')

                            {{-- @include('pengunjung.widget.widget_galeri_terbaru') --}}

                            @include('pengunjung.widget.widget_wilayah_desa')

                            @include('pengunjung.widget.widget_lokasi_kantor')

                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

    @include('pengunjung.layouts.foot')

    @yield('page_scripts')
    <script>
        window.setTimeout("renderDate()",1);
        days = new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
        months = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        function renderDate()
        {
            var mydate = new Date();
            var year = mydate.getYear();
            if (year < 2000)
            {
                if (document.all)
                year = "19" + year;
                else
                year += 1900;

            }
            var day = mydate.getDay();
            var month = mydate.getMonth();
            var daym = mydate.getDate();
            if (daym < 10)
            daym = "0" + daym;
            var hours = mydate.getHours();
            var minutes = mydate.getMinutes();
            var seconds = mydate.getSeconds();

            if (hours <= 9)
            hours = "0" + hours;
            if (minutes <= 9)
            minutes = "0" + minutes;
            if (seconds <= 9)
            seconds = "0" + seconds;

            document.getElementById("jam").innerHTML = "<B>"+days[day]+", "+daym+" "+months[month]+" "+year+"</B><br>"+hours+" : "+minutes+" : "+seconds;
            setTimeout("renderDate()",1000)
        }
    </script>
    <link rel="stylesheet" href="{{ url('/backend/template/bower_components/jquery-ui/jquery-ui.css') }}">
    <script src="{{ url('/backend/template/bower_components/jquery-ui/jquery-ui.js') }}"></script>
    <script>
        $( "#cari" ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url:"{{ url('') }}/artikel",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        search: request.term
                    },
                    success: function( data ) {
                        var resp = $.map(data,function(obj){
                            return obj.judul;
                        });

                        response(resp);
                    }
                });
            },
        });
    </script>

</body>
</html>
