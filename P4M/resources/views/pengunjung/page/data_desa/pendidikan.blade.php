@extends('pengunjung/layouts/main')

@section('title', 'Data Pendidikan')

@section('page_content')

<div id="printableArea">
    
    <div class="single_page_area" style="margin-bottom:10px;">
        <h2 class="post_title" style="font-family: Oswald; margin-bottom: 5rem;">@yield('title')</h2>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pendidikan</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendidikan as $p)
                        <tr>
                            <th>{!! $loop->iteration !!}</th>
                            <td>{!! $p->nama !!}</td>
                            <td>{!! '0.00%' !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Rumus jangan dihapus
    // let jumlah = (538 / 1994);
    // let hasil = jumlah * 100;
    // console.log(hasil.toFixed(2));
</script>

@endsection
