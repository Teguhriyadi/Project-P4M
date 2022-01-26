@extends('admin.layouts.main')

@section('title', 'Data Rukun Warga')

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

@if ($data_dusun->count())
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-pie-chart"></i> Grafik Data RW
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
                        <i class="fa fa-bars"></i> Rukun Warga
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
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_rw as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>
                                        @if (empty($data->getDusun->dusun))
                                        <i>
                                            <b>NULL</b>
                                        </i>
                                        @else
                                        {{ $data->getDusun->dusun }}
                                        @endif
                                    </td>
                                    <td>{{ $data->rw }}</td>
                                    <td class="text-center">
                                        <button onclick="editRw({{$data->id}})" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit" title="Ubah Data">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <form action="{{ url('/page/admin/data/rw/'.$data->id) }}" method="POST" style="display: inline;">
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
                            Karena <b> Data Dusun </b> Masih Kosong. <a href="{{ url('/page/admin/data/dusun') }}">Silahkan Inputkan Data Dusun Terlebih Dahulu</a>
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
            <form action="{{ url('/page/admin/data/rw') }}" method="POST" id="formTambahRW">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_dusun">Dusun</label>
                        <select name="id_dusun" id="id_dusun" class="form-control input-sm select2" style="width: 100%">
                            <option value="">- Pilih -</option>
                            @foreach ($data_dusun as $dusun)
                            <option value="{{ $dusun->id }}">
                                {{ $dusun->dusun }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rw"> RW </label>
                        <input type="text" class="form-control" name="rw" id="rw" placeholder="Masukkan RW">
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
            <form action="{{ url('/page/admin/data/rw/simpan') }}" method="POST" id="formEditRW">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer">
                <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm pull-left" title="Reset">
                        <i class="fa fa-refresh"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-social btn-success btn-flat btn-sm pull-right" title="Simpan Data">
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
                $("#formTambahRW").validate({
                    ignore: "",
                    rules: {
                        rw: {
                            required: true
                        }
                    },

                    messages: {
                        rw: {
                            required: "RW harap di isi!"
                        }
                    },

                    submitHandler: function(form) {
                        form.submit();
                    }
                });
                $("#formEditRW").validate({
                    ignore: "",
                    rules: {
                        rw: {
                            required: true
                        }
                    },

                    messages: {
                        rw: {
                            required: "RW harap di isi!"
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

    function editRw(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/data/rw/edit') }}",
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
            @foreach ($data_rw as $data)
            ["{{ $data->rw }}", {{ $data->getCountPenduduk->count() }}],
            @endforeach
            ]
        }]
    });

</script>

@endsection
