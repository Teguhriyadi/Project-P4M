@extends('pengunjung/layouts/main')

@section('title', 'Data Jenis Kelamin')

@section('page_content')

<div id="printableArea">

    <div class="single_page_area" style="margin-bottom:10px;">
        <h2 class="post_title" style="font-family: Oswald; margin-bottom: 5rem;">@yield('title')</h2>
        @if ($jk->count())
        <center><div id="piechart"></div></center>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Jenis Kelamin</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jk as $j)
                    <tr>
                        <td class="text-center">{!! $loop->iteration !!}</td>
                        <td>{!! $j->nama !!}</td>
                        <td class="text-center">{!! $j->getCountPenduduk->count() !!} Orang</td>
                        <td class="text-center">
                            @if ($j->getCountPenduduk->count() == 0)
                            0
                            @else
                            {!! round($j->getCountPenduduk->count() / $penduduk * 100, 2) !!}
                            @endif
                            %
                        </td>
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
        @else
        <div class="alert alert-danger" role="alert">
            <strong>Maaf, </strong> Data Jenis Kelamin Belum Tersedia
        </div>
        @endif
    </div>
</div>

@endsection

@section('page_scripts')
<script>
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'piechart',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: 0,
        plotOptions: {
            index: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels:
                {
                    enabled: true
                },
                showInLegend: true
            }
        },
        legend: {
            layout: 'vertical',
            backgroundColor: '#FFFFFF',
            align: 'right',
            verticalAlign: 'top',
            x: -30,
            y: 0,
            floating: true,
            shadow: true,
            enabled:true
        },
        series: [{
            type: 'pie',
            name: 'Populasi',
            data: [
            @foreach ($jk as $data)
            ["{{ $data->nama }}", {{ $data->getCountPenduduk->count() }}],
            @endforeach
            ]
        }]
    });

</script>
@endsection
