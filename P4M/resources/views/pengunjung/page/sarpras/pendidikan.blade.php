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
                        <th class="text-center">No.</th>
                        <th>Jenis</th>
                        <th class="text-center">Jumlah</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pendidikan as $p)
                    <tr>
                        <td class="text-center">{!! $loop->iteration !!}</td>
                        <td>{!! $p->jenis !!}</td>
                        <td class="text-center">{!! $p->jumlah !!}</td>
                        <td>{!! $p->lokasi !!}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            <i>
                                <b>Data Saat Ini Masih Kosong</b>
                            </i>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
