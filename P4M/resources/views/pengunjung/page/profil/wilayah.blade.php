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

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15861.119451467082!2d108.26136122408106!3d-6.357809876387517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb9bba6edf671%3A0x51a5177a20cb6fea!2sArahan%20Lor%2C%20Arahan%2C%20Kabupaten%20Indramayu%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1641038805549!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                </div>
            </div>
        </div>
        <hr/>
    </div>

    @include('pengunjung/page/profil/submenu')
</div>

@endsection
