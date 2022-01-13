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
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agama as $a)
                    <tr>
                        <th>{!! $loop->iteration !!}</th>
                        <td>{!! $a->nama !!}</td>
                        <td>
                            @if ($a->getCountPenduduk->count() == 0)
                            0
                            @else
                            {!! ($a->getCountPenduduk->count() / $penduduk) * 100 !!}
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
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Month'],
        <?php foreach($agama as $a) : ?>
        ['{{ $a->nama }}', {{ $a->getCountPenduduk->count() }}],
        <?php endforeach; ?>
        ]);
        
        var options = {'width':550, 'height':400};
        
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
@endsection