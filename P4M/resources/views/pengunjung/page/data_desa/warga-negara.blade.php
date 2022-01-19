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
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wargaNegara as $wn)
                    <tr>
                        <th>{!! $loop->iteration !!}</th>
                        <td>{!! $wn->nama !!}</td>
                        <td>
                            @if ($wn->getCountPenduduk->count() == 0)
                            0
                            @else
                            {!! ($wn->getCountPenduduk->count() / $penduduk) * 100 !!}
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
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Month'],
        <?php foreach($wargaNegara as $wn) : ?>
        ['{{ $wn->nama }}', {{ $wn->getCountPenduduk->count() }}],
        <?php endforeach; ?>
        ]);

        var options = {'width':550, 'height':400};

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
@endsection
