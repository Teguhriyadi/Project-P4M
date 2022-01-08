@extends('pengunjung/layouts/main')

@section('title', 'Data Desa')

@section('page_content')

<div id="printableArea">
    
    <div class="single_page_area" style="margin-bottom:10px;">
        <h2 class="post_title" style="font-family: Oswald">Visi Misi Desa Arahan Lor</h2>
        
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
                        <tr>
                            <td>{!! $data->dusun !!}</td>
                            <td>{!! $data->laki_laki !!}</td>
                            <td>{!! $data->perempuan !!}</td>
                            <td>{!! $data->jumlah !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>      
        
    </div>
</div>

@endsection
