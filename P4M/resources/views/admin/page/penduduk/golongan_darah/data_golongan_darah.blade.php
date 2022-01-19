@extends('admin.layouts.main')

@section('title', 'Data Golongan Darah')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <div id="piechart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-bars"></i> @yield('title')
                    </h3>
                    <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Gol Darah</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_golongan_darah as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td class="text-center">
                                        <button onclick="editDataGolonganDarah({{$data->id}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <form action="{{ url('/page/admin/data/golongan-darah/'.$data->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tambah Data -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-plus"></i> Tambah Data
                </h4>
            </div>
            <form action="{{ url('/page/admin/data/golongan-darah') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama"> Golongan Darah </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Data Golongan Darah">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                        <i class="fa fa-refresh"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- END -->

<!-- Tambah Data -->
<div class="modal fade" id="modal-default-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-pencil"></i> Edit Data
                </h4>
            </div>
            <form action="{{ url('/page/admin/data/golongan-darah/simpan') }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                        <i class="fa fa-refresh"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- END -->

@endsection

@section('page_scripts')

<script type="text/javascript">
    function editDataGolonganDarah(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/data/golongan-darah/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        })
    }
</script>

<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Month'],
        <?php foreach ($data_golongan_darah as $data): ?>
        ["{{ $data->nama }}", {{ $data->getCountPenduduk->count() }}],
        <?php endforeach; ?>
        ]);

        var options = {'title' : "@yield('title')", 'width':550, 'height':400};

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>

@endsection
