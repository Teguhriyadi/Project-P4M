@extends('pengunjung/layouts/main')

@section('title', 'Wilayah Desa')

@section('page_content')

<div id="printableArea">
    <h4 class="catg_titile" style="font-family: Oswald"><font color="#FFFFFF">Profil Wilayah Desa Arahan Lor</font></h4>
    <div class="post_commentbox">
        <span class="meta_date">
            <i class="fa fa-user"></i>Administrator&nbsp;
            <i class="fa fa-eye"></i>0 Kali Dibaca&nbsp;
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
                    @foreach ($data_wgeografis as $wilayah)
                    <tr>
                        <td>{{ $wilayah->batas }}</td>
                        <td>{{ $wilayah->desa }}</td>
                        <td>{{ $wilayah->kecamatan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if (!empty($peta))
        {!! $peta->wilayah_desa !!}
        @endif

    </div>
</div>

@endsection
