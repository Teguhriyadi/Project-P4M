@extends('pengunjung/layouts/main')

@section('title', 'Data Agama')

@section('page_content')

<div id="printableArea">

    <div class="single_page_area" style="margin-bottom:10px;">
        <h2 class="post_title" style="font-family: Oswald; margin-bottom: 5rem;">@yield('title')</h2>
        <center><div id="piechart"></div></center>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Agama</th>
                        <th>Jumlah</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agama as $a)
                    <tr>
                        <th>{!! $loop->iteration !!}</th>
                        <td>{!! $a->nama !!}</td>
                        <td>{!! $a->getCountPenduduk->count() !!} Orang</td>
                        <td>
                            @if ($a->getCountPenduduk->count() == 0)
                            0
                            @else
                            {!! round($a->getCountPenduduk->count() / $penduduk * 100, 2) !!}
                            @endif
                            %
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
            @foreach ($agama as $data)
            ["{{ $data->nama }}", {{ $data->getCountPenduduk->count() }}],
            @endforeach
            ]
        }]
    });

</script>
@endsection
