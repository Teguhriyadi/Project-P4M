@extends('admin.layouts.main')

@section('title', 'Data Sumber Daya Alam')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin') }}">
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
                        <i class="fa fa-users"></i> @yield('title')
                    </h3>
                    <div class="pull-right">
                        <a href="{{ url('/profil/wilayah-desa') }}" target="_blank" class="btn btn-social btn-info btn-sm pull-right" style="margin-left: 5px" title="Lihat">
                            <i class="fa fa-eye"></i> Preview
                        </a>
                        <button type="button" class="btn btn-social btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modalTambahSDA" title="Tambah Data">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Jenis</th>
                                    <th class="text-center">Luas</th>
                                    <th>Lokasi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daya_alam as $da)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $da->jenis }}</td>
                                    <td class="text-center">{{ $da->luas }}</td>
                                    <td>{{ $da->lokasi }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning" onclick="editDataSDA({{ $da->id }})" data-toggle="modal" data-target="#modalEditSDA" title="Ubah Data">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <form action="{{ url('page/admin/sumber/alam/'.$da->id) }}" method="post" style="display: inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger btn-delete" title="Hapus Data">
                                                <i class="fa fa-trash"></i>
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

<div class="modal fade" id="modalTambahSDA">
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
            <form action="{{ url('page/admin/sumber/alam') }}" method="POST" id="formTambahSDA">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="jenis"> Jenis </label>
                        <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Masukkan Jenis">
                    </div>
                    <div class="form-group">
                        <label for="luas"> Luas </label>
                        <input type="text" class="form-control" name="luas" id="luas" placeholder="Masukkan Luas">
                    </div>
                    <div class="form-group">
                        <label for="lokasi"> Lokasi </label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-social btn-warning btn-flat pull-left btn-sm" title="Reset">
                        <i class="fa fa-refresh"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm" title="Tambah Data">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditSDA">
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
            <form action="{{ url('page/admin/sumber/alam') }}" method="POST" id="formEditSDA">
                @csrf
                @method('patch')
                <div class="modal-body" id="modal-content-edit">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-social btn-warning btn-flat pull-left btn-sm" title="Reset">
                        <i class="fa fa-refresh"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-social btn-success btn-flat btn-sm" title="Simpan Data">
                        <i class="fa fa-edit"></i> Simpan
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
            url : "/page/admin/sumber/alam/edit",
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
                $("#formTambahSDA").validate({
                    ignore: "",
                    rules: {
                        jenis: {
                            required: true
                        },
                        luas: {
                            required: true
                        },
                        lokasi: {
                            required: true
                        },
                    },

                    messages: {
                        jenis: {
                            required: "Jenis harap di isi!"
                        },
                        luas: {
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
                $("#formEditSDA").validate({
                    ignore: "",
                    rules: {
                        jenis: {
                            required: true
                        },
                        luas: {
                            required: true
                        },
                        lokasi: {
                            required: true
                        },
                    },

                    messages: {
                        jenis: {
                            required: "Jenis harap di isi!"
                        },
                        luas: {
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
