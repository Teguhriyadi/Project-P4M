@extends('admin.layouts.main')

@section('title', 'Data Sumber Daya Kelembagaan')

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
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-users"></i> Sumber Daya Kelembagaan
                    </h3>
                    <div class="pull-right">
                        <button type="button" class="btn btn-social btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modalTambahSDK" title="Tambah Data">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Jenis Organisasi</th>
                                    <th>Jumlah Anggota</th>
                                    <th>Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daya_kelembagaan as $k)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $k->jenis_organisasi }}</td>
                                    <td>{{ $k->jumlah_anggota }}</td>
                                    <td>{{ $k->lokasi == NULL ? '-' : $k->lokasi }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" onclick="editDataSDA({{ $k->id }})" data-toggle="modal" data-target="#modalEditSDK"><i class="fa fa-edit"></i></button>
                                        <form action="{{ url('page/admin/sumber/kelembagaan/'.$k->id) }}" method="post" style="display: inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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

<div class="modal fade" id="modalTambahSDK">
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
            <form action="{{ url('page/admin/sumber/kelembagaan') }}" method="POST" id="formTambahSDK">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="jenis_organisasi"> Jenis Organisasi </label>
                        <input type="text" class="form-control" name="jenis_organisasi" id="jenis_organisasi" placeholder="Jenis Organisasi">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_anggota"> Jumlah Anggota </label>
                        <input type="text" class="form-control" name="jumlah_anggota" id="jumlah_anggota"  placeholder="Jumlah Anggota">
                    </div>
                    <div class="form-group">
                        <label for="lokasi_sdk"> Lokasi </label>
                        <input type="text" class="form-control" name="lokasi_sdk" id="lokasi_sdk" placeholder="Lokasi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm pull-left" title="Reset">
	    	                <i class="fa fa-refresh"></i> Reset
                	    </button>
                    <button type="submit" class="btn btn-primary" title="Simpan Data" title="Tambah Data">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditSDK">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-plus"></i> Edit Data
                </h4>
            </div>
            <form action="{{ url('page/admin/sumber/kelembagaan') }}" method="POST" id="formEditSDK">
                @csrf
                @method('patch')
                <div class="modal-body" id="modal-content-edit">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm pull-left" title="Reset"  data-dismiss="modal">
                        <i class="fa fa-refresh"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary" title="Simpan Data">
                        <i class="fa fa-plus"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('page_scripts')
<script>
    function editDataSDA(id)
    {
        $.ajax({
            url : "/page/admin/sumber/kelembagaan/edit",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        })
    }

    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#formTambahSDK").validate({
                    ignore: "",
                    rules: {
                        jenis_organisasi: {
                            required: true
                        },
                        jumlah_anggota: {
                            required: true
                        },
                        lokasi: {
                            required: true
                        },
                    },

                    messages: {
                        jenis_organisasi: {
                            required: "Jenis harap di isi!"
                        },
                        jumlah_anggota: {
                            required: "Luas harap di isi!"
                        },
                        lokasi: {
                            required: "Lokasi harap di isi!"
                        },
                    },

                    submitHandler: function(form) {
                        form.submit();
                    }
                });
                $("#formEditSDK").validate({
                    ignore: "",
                    rules: {
                        jenis_organisasi: {
                            required: true
                        },
                        jumlah_anggota: {
                            required: true
                        },
                        lokasi: {
                            required: true
                        },
                    },

                    messages: {
                        jenis_organisasi: {
                            required: "Jenis harap di isi!"
                        },
                        jumlah_anggota: {
                            required: "Luas harap di isi!"
                        },
                        lokasi: {
                            required: "Lokasi harap di isi!"
                        },
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
</script>
@endsection
