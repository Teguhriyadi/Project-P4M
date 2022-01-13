@extends('pengunjung/layouts/main')

@section('title', 'Data Jenis Kelamin')

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
                        <th>Jenis Kelamin</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jk as $j)
                    <tr>
                        <th>{!! $loop->iteration !!}</th>
                        <td>{!! $j->nama !!}</td>
                        <td>
                            @if ($j->getCountPenduduk->count() == 0)
                            0
                            @else
                            {!! ($j->getCountPenduduk->count() / $penduduk) * 100 !!}
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
        <?php foreach($jk as $j) : ?>
        ['{{ $j->nama }}', {{ $j->getCountPenduduk->count() }}],
        <?php endforeach; ?>
        ]);

        var options = {'width':550, 'height':400};

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
@endsection
