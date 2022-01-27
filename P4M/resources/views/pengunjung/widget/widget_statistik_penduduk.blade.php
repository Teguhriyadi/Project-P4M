@php
use App\Models\Model\Artikel;
use App\Models\Model\Penduduk;
use App\Models\Model\PendudukSex;

$kelamin = PendudukSex::all();
$penduduk = Penduduk::all();

setlocale(LC_ALL, 'id_ID', 'id', 'ID');
$artikel = Artikel::latest()->paginate(6);
@endphp

<script src="{{ url('/frontend/highcharts/highcharts.js') }}"></script>
<script src="{{ url('/frontend/highcharts/highcharts-3d.js') }}"></script>
<script src="{{ url('/frontend/highcharts/exporting.js') }}"></script>
<script src="{{ url('/frontend/highcharts/highcharts-more.js') }}"></script>
<script src="{{ url('/frontend/highcharts/sankey.js') }}"></script>
<script src="{{ url('/frontend/highcharts/organization.js') }}"></script>
<script src="{{ url('/frontend/highcharts/accessibility.js') }}"></script>

<div class="single_bottom_rightbar">
    <h2><i class="fa fa-bar-chart"></i> Statistik Penduduk</h2>
    <div class="tab-content" style="padding-top: 0;">
        <script type="text/javascript">
            $(function () {
                var chart_widget;
                $(document).ready(function () {
                    chart_widget = new Highcharts.Chart({
                        chart: {
                            renderTo: 'container_widget',
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false
                        },
                        title: {
                            text: 'Jumlah Penduduk'
                        },
                        yAxis: {
                            title: {
                                text: 'Jumlah'
                            }
                        },
                        xAxis: {
                            categories:
                            [
                            @foreach ($kelamin as $k)
                            ['{{ $k->getCountPenduduk->count() }} <br> {{ $k->nama }}'],
                            @endforeach
                            ['{{ $penduduk->count() }} <br> {{ "Total" }}'],
                            ]
                        },
                        legend: {
                            enabled:false
                        },
                        plotOptions: {
                            series: {
                                colorByPoint: true
                            },
                            column: {
                                pointPadding: 0,
                                borderWidth: 0
                            }
                        },
                        series: [{
                            type: 'column',
                            name: 'Populasi',
                            data: [
                            @foreach ($kelamin as $k)
                            ['{{ $k->nama }}', {{ $k->getCountPenduduk->count() }}],
                            @endforeach
                            ['{{ "Total" }}',{{ $penduduk->count() }}],
                            ]
                        }]
                    });
                });

            });
        </script>
        <div id="container_widget" style="width: 100%; height: 300px; margin: 0 auto"></div>
    </div>
</div>
