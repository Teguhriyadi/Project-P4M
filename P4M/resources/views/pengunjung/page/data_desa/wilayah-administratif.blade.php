@extends('pengunjung/layouts/main')

@section('title', 'Data Wilayah Administratif')

@section('page_content')

<div id="printableArea">

    <div class="single_page_area" style="margin-bottom:10px;">
        <h2 class="post_title" style="font-family: Oswald">@yield('title')</h2>

        <div class="table-responsive">
            <table class="table table-bordered" id="tablePenduduk">
                <thead>
                    <tr>
                        <th>Dusun</th>
                        <th>Laki-Laki</th>
                        <th>Perempuan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataDusun as $data)
                        @php
                            $data_sex = DB::table("tb_penduduk_sex")->get();
                        @endphp
                        <tr>
                            <td>{!! $data->dusun !!}</td>
                            <td></td>
                            <td></td>
                            <td>{!! $data->getCountPenduduk->count() !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
