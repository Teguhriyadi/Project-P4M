@extends('admin.layouts.main')

@section('title', 'Wilayah Geografis')

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
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-map-marker"></i> @yield('title')
                    </h3>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Batas</th>
                                    <th>Desa</th>
                                    <th>Kecamatan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_wilayah as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">{{ $data->batas }}</td>
                                    <td>{{ $data->desa }}</td>
                                    <td>{{ $data->kecamatan }}</td>
                                    <td class="text-center">
                                        <button onclick="editDataWilayah({{$data->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <form action="{{ url('/page/admin/info/wilayah_geografis/'.$data->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
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
            <form action="{{ url('/page/admin/info/wilayah_geografis') }}" method="POST" id="formTambahWilayah">
                @csrf
                @if (empty($data_geografis))
                <input type="hidden" name="geografis_id" value="1">
                @else
                <input type="hidden" name="geografis_id" value="{{ $data_geografis->id }}">
                @endif
                <div class="modal-body">
                    <div class="form-group">
                        <label for="batas"> Batas </label>
                        <input type="text" class="form-control input-sm" name="batas" id="batas" placeholder="Masukkan Batas">
                    </div>
                    <div class="form-group">
                        <label for="desa"> Desa </label>
                        <input type="text" class="form-control input-sm" name="desa" id="desa" placeholder="Masukkan Nama Desa">
                    </div>
                    <div class="form-group">
                        <label for="kecamatan"> Kecamatan </label>
                        <input type="text" class="form-control input-sm" name="kecamatan" id="kecamatan" placeholder="Masukkan Nama Kecamatan">
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
            <form action="{{ url('/page/admin/info/wilayah_geografis/simpan') }}" method="POST" id="formEditWilayah">
                @method("PUT")
                @csrf
                @if (empty($data_geografis))
                <input type="hidden" name="geografis_id" value="1">
                @else
                <input type="hidden" name="geografis_id" value="{{ $data_geografis->id }}">
                @endif
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
    
    (function($,W,D){var JQUERY4U={};JQUERY4U.UTIL={setupFormValidation:function(){$("#formTambahWilayah").validate({ignore:"",rules:{batas:{required:!0},desa:{required:!0},kecamatan:{required:!0},},messages:{batas:{required:"Batas harap di isi!"},desa:{required:"Desa harap di isi!"},kecamatan:{required:"Kecamatan harap di isi!"},},submitHandler:function(form){form.submit()}});$("#formEditWilayah").validate({ignore:"",rules:{batas:{required:!0},desa:{required:!0},kecamatan:{required:!0},},messages:{batas:{required:"Batas harap di isi!"},desa:{required:"Desa harap di isi!"},kecamatan:{required:"Kecamatan harap di isi!"},},submitHandler:function(form){form.submit()}})}}
    $(D).ready(function($){JQUERY4U.UTIL.setupFormValidation()})})(jQuery,window,document)
    
    function editDataWilayah(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/info/wilayah_geografis/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        })
    }
    
</script>

@endsection
