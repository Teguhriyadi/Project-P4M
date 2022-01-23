@extends('admin.layouts.main')

@section('title', 'Sarana Pendidikan')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li><a href="/page/admin">Dashboard</a></li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="/sarpras/pendidikan" target="_blank" class="btn btn-info btn-sm" style="margin-left: 5px"><i class="fa fa-eye"></i> Preview</a>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahSaranaPendidikan">
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
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendidikan as $p)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $p->jenis }}</td>
                                    <td>{{ $p->jumlah }}</td>
                                    <td>{{ $p->lokasi }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" onclick="editSaranaPendidikan({{ $p->id }})" data-toggle="modal" data-target="#editSaranaPendidikan"><i class="fa fa-edit"></i></button>
                                        <form action="{{ url('page/admin/sarana/pendidikan/'.$p->id) }}" method="post" style="display: inline">
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

<div class="modal fade" id="tambahSaranaPendidikan">
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
            <form action="{{ url('page/admin/sarana/pendidikan') }}" method="POST" id="formTambahSarana">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="jenis"> Jenis </label>
                        <input type="text" class="form-control" name="jenis" id="jenis">
                    </div>
                    <div class="form-group">
                        <label for="jumlah"> Jumlah </label>
                        <input type="text" class="form-control" name="jumlah" id="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="lokasi"> Lokasi </label>
                        <input type="text" class="form-control" name="lokasi" id="lokasi">
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

<div class="modal fade" id="editSaranaPendidikan">
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
            <form action="{{ url('page/admin/sarana/pendidikan') }}" method="POST" id="formEditSarana">
                @csrf
                @method('patch')
                <div class="modal-body" id="modal-content-edit">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                        <i class="fa fa-refresh"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
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
    function editSaranaPendidikan(id)
    {
        $.ajax({
            url : "/page/admin/sarana/pendidikan/edit",
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
                $("#formTambahSarana").validate({
                    ignore: "",
                    rules: {
                        jenis: {
                            required: true
                        },
                        jumlah: {
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
                        jumlah: {
                            required: "Jumlah harap di isi!"
                        },
                        lokasi: {
                            required: "Lokasi harap di isi!"
                        },
                    },

                    submitHandler: function(form) {
                        form.submit();
                    }
                });
                $("#formEditSarana").validate({
                    ignore: "",
                    rules: {
                        jenis: {
                            required: true
                        },
                        jumlah: {
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
                        jumlah: {
                            required: "Jumlah harap di isi!"
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
