@extends('pengunjung/layouts/main')

@section('title', 'Data Pendidikan')

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
                        <th>Pendidikan</th>
                        <th>Jumlah</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendidikan as $p)
                    <tr>
                        <th>{!! $loop->iteration !!}</th>
                        <td>{!! $p->nama !!}</td>
                        <td>{!! $p->getCountPenduduk->count() !!} Orang</td>
                        <td>
                            @if ($p->getCountPenduduk->count() == 0)
                            0
                            @else
                            {!! round($p->getCountPenduduk->count() / $penduduk * 100, 2) !!}
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
            @foreach ($pendidikan as $data)
            ["{{ $data->nama }}", {{ $data->getCountPenduduk->count() }}],
            @endforeach
            ]
        }]
    });

</script>
@endsection
