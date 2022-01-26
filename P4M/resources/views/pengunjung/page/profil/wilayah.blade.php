@extends('pengunjung/layouts/main')

@section('title', 'Profil Wilayah Desa')

@section('page_content')

<div id="printableArea">
    <h4 class="catg_titile" style="font-family: Oswald"><font color="#FFFFFF">@yield('title')</font></h4>
    <div class="post_commentbox">
        <span class="meta_date">
            <i class="fa fa-user"></i>Administrator&nbsp;
        </span>
    </div>
    <div class="single_page_content" style="margin-bottom:10px;">
        @foreach ($data_geografis as $geografis)
        {!! $geografis->deskripsi !!}
        @endforeach

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Batas</th>
                        <th>Desa/Kelurahan</th>
                        <th>Kecamatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_wgeografis as $wilayah)
                    <tr>
                        <td>{{ $wilayah->batas }}</td>
                        <td>{{ $wilayah->desa }}</td>
                        <td>{{ $wilayah->kecamatan }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            <i>
                                <b>Data Saat Ini Masih Kosong</b>
                            </i>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if (!empty($peta))
        <style>
            #mapWilDesa iframe {
                width: 100%;
                height: 400px;
            }
        </style>
        <div id="mapWilDesa">
            {!! $peta->wilayah_desa !!}
        </div>
        @endif

    </div>
</div>

@endsection
