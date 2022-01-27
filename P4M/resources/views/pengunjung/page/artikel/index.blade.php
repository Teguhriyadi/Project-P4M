@extends('pengunjung/layouts/main')

@section('title', $data_title)

@section('page_content')

@php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
@endphp

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
        @if ($data_artikel->count())
        @foreach ($data_artikel as $artikel)
        <div class="business_category_left wow fadeInDown">
            <ul class="fashion_catgnav">
                <li>
                    <div class="">
                        <h5 class="catg_titile">
                            <a href="{{ url('') }}/artikel/{!! $artikel->slug !!}" title="Baca Selengkapnya">{!! $artikel->judul !!}</a>
                        </h5>
                        <div class="post_commentbox">
                            <span class="meta_date">{!! Carbon::createFromFormat('Y-m-d H:i:s', $artikel->created_at)->isoFormat('D MMMM Y') !!}&nbsp;
                                <i class="fa fa-user"></i>Administrator&nbsp;
                                <i class="fa fa-eye"></i>{{ $artikel->getCount->count() }} Kali&nbsp;
                                <i class="fa fa-comments"></i>{{ $artikel->getKomentar->count() }}&nbsp;
                            </span>
                        </div>
                        <a href="{{ url('') }}/artikel/{!! $artikel->slug !!}" title="Baca Selengkapnya" style="font-weight:bold">
                            <img src="{!! $artikel->image ? url('').'/storage/'.$artikel->image : url('').'/frontend/img/no-images.png' !!}" onerror="this.onerror=null; this.src='{{ url('') }}/frontend/img/no-images.png'" class="img-fluid img-thumbnail hidden-sm hidden-xs" style="float:left; margin:0 8px 4px 0; height: 200px; width: 300px" alt="{!! $artikel->judul !!}" />
                            <img src="{!! $artikel->image ? url('').'/storage/'.$artikel->image : url('').'/frontend/img/no-images.png' !!}" onerror="this.onerror=null; this.src='{{ url('') }}/frontend/img/no-images.png'" class="img-fluid img-thumbnail hidden-lg hidden-md" style="float:left; margin:0 8px 4px 0; height: 200px; width: 100%" alt="{!! $artikel->judul !!}" />
                        </a>
                        <div style="text-align: justify;" class="hidden-sm hidden-xs">
                            {!! Str::limit($artikel->body, 525) !!}
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        @endforeach
        <div class="d-flex justify-content-end">
            {{ $data_artikel->links() }}
        </div>
        @else
        <br>
        <div class="alert alert-danger" role="alert">
            <strong>Maaf, </strong> Belum Ada Artikel yang Tersedia
        </div>
        @endif
    </div>
</div>

@endsection
