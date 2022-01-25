@extends('pengunjung/layouts/main')

@section('title', 'Data Kewarganegaraan')

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
                        <th>Warga Negara</th>
                        <th>Jumlah</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wargaNegara as $wn)
                    <tr>
                        <th>{!! $loop->iteration !!}</th>
                        <td>{!! $wn->nama !!}</td>
                        <td>{!! $wn->getCountPenduduk->count() !!} Orang</td>
                        <td>
                            @if ($wn->getCountPenduduk->count() == 0)
                            0
                            @else
                            {!! round($wn->getCountPenduduk->count() / $penduduk * 100, 2) !!}
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

<script>
    // Rumus jangan dihapus
    // let jumlah = (538 / 1994);
    // let hasil = jumlah * 100;
    // console.log(hasil.toFixed(2));
</script>

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
            @foreach ($wargaNegara as $data)
            ["{{ $data->nama }}", {{ $data->getCountPenduduk->count() }}],
            @endforeach
            ]
        }]
    });

</script>
@endsection
