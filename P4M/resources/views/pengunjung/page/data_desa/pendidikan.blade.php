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
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendidikan as $p)
                    <tr>
                        <th>{!! $loop->iteration !!}</th>
                        <td>{!! $p->nama !!}</td>
                        <td>
                            @if ($p->getCountPenduduk->count() == 0)
                            0
                            @else
                            {!! ($p->getCountPenduduk->count() / $penduduk) * 100 !!}
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
        <?php foreach($pendidikan as $p) : ?>
        ['{{ $p->nama }}', {{ $p->getCountPenduduk->count() }}],
        <?php endforeach; ?>
        ]);
        
        var options = {'width':550, 'height':400};
        
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
@endsection