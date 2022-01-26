@extends('admin.layouts.main')

@section('title', 'Data Rukun Tetangga')

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

@if ($data_rw->count())
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-pie-chart"></i> Grafik Data RT
                    </h3>
                </div>
                <div class="box-body">
                    <div id="piechart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-bars"></i> Rukun Tangga
                    </h3>
                    <button class="btn btn-social btn-primary btn-flat btn-sm pull-right" data-toggle="modal" data-target="#modal-default" title="Tambah Data">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Dusun</th>
                                    <th>RW</th>
                                    <th>RT</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_rt as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>
                                        @if (empty($data->getRw->getDusun->dusun))
                                        <i>
                                            <b>NULL</b>
                                        </i>
                                        @else
                                        {{ $data->getRw->getDusun->dusun }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (empty($data->getRw->rw))
                                        <i>
                                            <b>NULL</b>
                                        </i>
                                        @else
                                        {{ $data->getRw->rw }}
                                        @endif
                                    </td>
                                    <td>{{ $data->rt }}</td>
                                    <td class="text-center">
                                        <button onclick="editRt({{$data->id}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit" title="Ubah Data">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <form action="{{ url('/page/admin/data/rt/'.$data->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm btn-delete" title="Hapus Data">
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
@else
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-bullhorn"></i>
                    <h3 class="box-title">Perhatian</h3>
                </div>
                <div class="box-body">
                    <div class="callout callout-danger">
                        <h4>Tidak Bisa Menginputkan Data</h4>

                        <p>
                            Karena <b> Data RW </b> Masih Kosong. <a href="{{ url('/page/admin/data/rw') }}">Silahkan Inputkan Data RW Terlebih Dahulu</a>
                        </p>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

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
            <form action="{{ url('/page/admin/data/rt') }}" method="POST" id="formTambahRT">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_rw">RW</label>
                        <select class="form-control select2" name="id_rw" id="id_rw" style="width: 100%">
                            <option value="">- Silahkan cari RW -</option>
                            @foreach ($data_rw as $rw)
                                <option value="{{ $rw->id }}">{{ $rw->rw }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rt"> RT </label>
                        <input type="text" class="form-control" name="rt" id="rt" placeholder="Masukkan RT">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm pull-left" title="Reset">
                        <i class="fa fa-refresh"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm pull-right" title="Tambah Data">
                        <i class="fa fa-edit"></i> Tambah
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
                    <i class="fa fa-edit"></i> Edit Data
                </h4>
            </div>
            <form action="{{ url('/page/admin/data/rt/simpan') }}" method="POST" id="formEditRT">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm pull-left" title="Reset">
                        <i class="fa fa-refresh"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-social btn-success btn-flat btn-sm pull-right" title="Simpan">
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
    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#formTambahRT").validate({
                    ignore: "",
                    rules: {
                        rt: {
                            required: true
                        }
                    },

                    messages: {
                        rt: {
                            required: "RT harap di isi!"
                        }
                    },

                    submitHandler: function(form) {
                        form.submit();
                    }
                });
                $("#formEditRT").validate({
                    ignore: "",
                    rules: {
                        rt: {
                            required: true
                        }
                    },

                    messages: {
                        rt: {
                            required: "RT harap di isi!"
                        }
                    },

                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            }
        }

        $(D).ready(function($) {
            JQUERY4U.UTIL.setupFormValidation();
        });

    })(jQuery, window, document);

    function editRt(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/data/rt/edit') }}",
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
            @foreach ($data_rt as $data)
            ["{{ $data->rt }}", {{ $data->getCountPenduduk->count() }}],
            @endforeach
            ]
        }]
    });

</script>

@endsection
