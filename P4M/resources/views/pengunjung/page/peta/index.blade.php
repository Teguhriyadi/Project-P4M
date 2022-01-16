@extends('pengunjung/layouts/main')

@section('title', 'Peta Desa')

@section('page_content')

<style>
    #petaDesa iframe {
        width: 100%;
        height: 400px;
    }
</style>

<div id="printableArea">
    <h4 class="catg_titile" style="font-family: Oswald"><font color="#FFFFFF">@yield('title')</font></h4>
    <div class="post_commentbox">
        <span class="meta_date">
            <i class="fa fa-user"></i>Administrator&nbsp;
            <i class="fa fa-eye"></i>0 Kali Dibaca&nbsp;
        </span>
    </div>
    <div class="single_page_content" style="margin-bottom:10px;">
        <div class="form-group">
            <h2><i class="fa fa-map-marker"></i> Wilayah Desa</h2>
            <div id="petaDesa">
                @if (!empty($peta))
                {!! $peta->wilayah_desa !!}
                @else
                <h5>Peta belum diupload</h5>
                @endif
            </div>
        </div>
        <div class="form-group">
            <h2><i class="fa fa-map-marker"></i> Lokasi Kantor Desa</h2>
            <div id="petaDesa">
                @if (!empty($peta))
                {!! $peta->lokasi_kantor !!}
                @else
                <h5>Peta belum diupload</h5>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
