@extends('pengunjung/layouts/main')

@section('title', 'Wilayah Desa')

@section('page_content')

<div class="row mt-5">
    <div class="col-md-8">
        <div id="main">
            <div class="main">
                <div class="main_body">
                    @foreach ($data_geografis as $geografis)
                        {!! $geografis->deskripsi !!}
                    @endforeach

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Batas</th>
                                    <th>Desa/Kelurahan</th>
                                    <th>Kecamatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_wgeografis as $wilayah_geografis)
                                    <tr>
                                        <td>{{ $wilayah_geografis->batas }}</td>
                                        <td>{{ $wilayah_geografis->desa }}</td>
                                        <td>{{ $wilayah_geografis->kecamatan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </div>

    @include('pengunjung/page/profil/submenu')
</div>

@endsection
