@extends('pengunjung/layouts/main')

@section('title', 'Artikel')

@section('page_content')

<div class="single_category wow fadeInDown">
    <h2>
        <span class="bold_line">
            <span></span>
        </span>
        <span class="solid_line"></span>
        <span class="title_text">@yield('title')</span>
    </h2>
</div>
<div class="single_category wow fadeInDown">
    <div class="archive_style_1">
        @foreach ($data_berita as $berita)
        <div class="business_category_left wow fadeInDown">
            <ul class="fashion_catgnav">
                <li>
                    <div class="catgimg2_container2">
                        <h5 class="catg_titile">
                            <a href="/berita/{!! $berita->slug !!}" title="Baca Selengkapnya">{!! $berita->judul !!}</a>
                        </h5>
                        <div class="post_commentbox">
                            <span class="meta_date">26 Agustus 2016&nbsp;
                                <i class="fa fa-user"></i>Administrator&nbsp;
                                <i class="fa fa-eye"></i>0 Kali&nbsp;
                                <i class="fa fa-comments"></i>0&nbsp;
                            </span>
                        </div>
                        <a href="/berita/{!! $berita->slug !!}" title="Baca Selengkapnya" style="font-weight:bold">
                            <img src="/storage/{!! $berita->image !!}" height="200" width="300px" class="img-fluid img-thumbnail hidden-sm hidden-xs" style="float:left; margin:0 8px 4px 0;" alt="{!! $berita->judul !!}" />
                            <img src="/storage/{!! $berita->image !!}" width="100%" class="img-fluid img-thumbnail hidden-lg hidden-md" style="float:left; margin:0 8px 4px 0;" alt="{!! $berita->judul !!}" />
                        </a>
                        <div style="text-align: justify;" class="hidden-sm hidden-xs">
                            {!! $berita->kutipan !!}
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        @endforeach
        <div class="d-flex justify-content-end">
            {{ $data_berita->links() }}
        </div>
    </div>
</div>  

@endsection
