@extends('pengunjung/layouts/main')

@section('title', 'Sarana Prasarana Pendidikan')

@section('page_content')

<div id="printableArea">

    <div class="single_page_area" style="margin-bottom:10px;">
        <h2 class="post_title" style="font-family: Oswald; margin-bottom: 5rem;">@yield('title')</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendidikan as $p)
                    <tr>
                        <th>{!! $loop->iteration !!}</th>
                        <td>{!! $p->jenis !!}</td>
                        <td>{!! $p->jumlah !!}</td>
                        <td>{!! $p->lokasi !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
