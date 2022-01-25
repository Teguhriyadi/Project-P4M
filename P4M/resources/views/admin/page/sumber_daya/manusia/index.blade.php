@extends('admin.layouts.main')

@section('title', 'Data Sumber Daya Manusia')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-bars"></i> Sumber Daya Manusia
                    </h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Presentasi (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelamin as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->getCountPenduduk->count() }}</td>
                                    <td>{!! round($data->getCountPenduduk->count() / $penduduk * 100, 2) !!}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-body">
                    <div id="piechart"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('page_scripts')

<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Month'],
        <?php foreach ($kelamin as $data): ?>
        ["{{ $data->nama }}", {{ $data->getCountPenduduk->count() }}],
        <?php endforeach; ?>
        ]);

        var options = {'title' : "@yield('title')", 'width':550, 'height':400};

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>

@endsection
