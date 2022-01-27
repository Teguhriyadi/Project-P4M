@extends('pengunjung/layouts/main')

@section('title', 'Visi Misi Desa')

@section('page_content')

<div id="printableArea">
    <h4 class="catg_titile" style="font-family: Oswald"><font color="#FFFFFF">@yield('title')</font></h4>
    <div class="post_commentbox">
        <span class="meta_date">
            <i class="fa fa-user"></i>Administrator&nbsp;
        </span>
    </div>
    <div class="single_page_content" style="margin-bottom:10px;">

        @if ($data_visimisi->count())
        @foreach ($data_visimisi as $vm)
        {!! $vm->visi !!}
        <br>
        {!! $vm->misi !!}
        @endforeach
        @else
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <strong>Maaf,</strong> Data Visi Misi Belum Tersedia
        </div>
        @endif

    </div>
</div>


@endsection
