@extends('pengunjung/layouts/main')

@section('title', 'Galeri')

@section('page_content')

<style>
    .pp_social {
        display: none;
    }
</style>

<div class="single_category wow fadeInDown" style="margin-bottom: 20px">
    <h2>
        <span class="bold_line">
            <span></span>
        </span>
        <span class="solid_line"></span>
        <span class="title_text">@yield('title')</span>
    </h2>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="main">
            <div class="main">
                <div class="main_body">
                    <div class="academy-blog-posts">
                        @if ($data_galeri->count())
                        <div class="row">
                            @foreach ($data_galeri as $galeri)
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="single-blog-post wow fadeInUp" data-wow-delay="300ms">
                                    <div class="blog-post-thumb mb-15">
                                        <a href="{{ url('/storage/'.$galeri->gambar) }}" rel="prettyPhoto[gallery1]">
                                            <img src="{{ url('/storage/'.$galeri->gambar) }}" alt="" style="width: 100%; margin: 0 auto; height: 180px" onerror="this.onerror=null; this.src='/frontend/img/no-images.png'">
                                        </a>
                                    </div>
                                    <div style="height:100px">
                                        <h4 style="font-size: 18px">{{ $galeri->judul }}</h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div style="display: flex; justify-content: end;">
                            {{ $data_galeri->links() }}
                        </div>
                        @else
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Maaf, </strong> Belum Ada Galeri yang Tersedia
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </div>
</div>

@endsection

@section('page_scripts')

<link rel="stylesheet" href="{{ url('/frontend/prettyphoto/css/prettyPhoto.css') }}" type="text/css" media="screen" />
<script src="{{ url('/frontend/prettyphoto/js/jquery.prettyPhoto.js') }}"></script>

<script>
    $(document).ready(function(){
        $("area[rel^='prettyPhoto']").prettyPhoto();
        $("#main:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_rounded',slideshow:5000, autoplay_slideshow: true});
        $("#main:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',slideshow:10000, hideflash: true});
    });
</script>

@endsection
