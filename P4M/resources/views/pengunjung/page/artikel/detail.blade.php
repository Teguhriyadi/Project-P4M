@extends('pengunjung/layouts/main')

@section('title', $artikel->judul)

@section('page_content')

<div id="printableArea">
    <h4 class="catg_titile" style="font-family: Oswald"><font color="#FFFFFF">@yield('title')</font></h4>
    <div class="post_commentbox">
        <span class="meta_date">{!! $artikel->updated_at->formatLocalized("%d %B %Y %H:%M:%S") !!}&nbsp;
            <i class="fa fa-user"></i>Administrator&nbsp;
            <i class="fa fa-eye"></i>0 Kali&nbsp;
            <i class="fa fa-comments"></i>0&nbsp;
        </span>
    </div>
    <div class="single_category wow fadeInDown" style="margin-bottom:10px;">
        <div class="archive_style_1">
            <div class="business_category_left wow fadeInDown">
                <ul class="fashion_catgnav">
                    <li style="border-bottom: none">
                        <div class="catgimg2_container2">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="/storage/{{ $artikel->image }}" width="300" class="img-fluid img-thumbnail" style="float:left; margin:5px 20px 20px 0;" />
                                    <div style="text-align: justify; margin-bottom: 2rem;">
                                        {!! $artikel->body !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>         
</div>

@endsection
