@extends('admin.layouts.main')

@section('title', 'Edit Data Jabatan')

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
        <li>
            <a href="{{ url('/page/admin/pemerintahan/jabatan') }}">
                Data Jabatan
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-edit"></i> @yield('title')
                    </h3>
                </div>
                <form id="editJabatan" action="{{ url('/page/admin/pemerintahan/jabatan/'.$edit->id) }}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama_jabatan"> Nama Jabatan </label>
                            <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" placeholder="Masukkan Nama Jabatan" value="{{ $edit->nama_jabatan }}">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-social btn-success btn-flat btn-sm" title="Simpan Data">
                            <i class="fa fa-edit"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                        <div class="pull-right">
                            <a href="{{ url('/page/admin/pemerintahan/jabatan') }}" class="btn btn-social btn-info btn-flat btn-sm" title="Kembali">
                                <i class="fa fa-arrow-circle-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-gavel"></i> Jabatan
                    </h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Jabatan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_jabatan as $jabatan)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $jabatan->nama_jabatan }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/pemerintahan/jabatan/'.$jabatan->id) }}/edit" class="btn btn-warning btn-sm" title="Edit Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('/page/admin/pemerintahan/jabatan/'.$jabatan->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus Data">
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

@endsection

@section('page_scripts')
<script>
    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#editJabatan").validate({
                    ignore: "",
                    rules: {
                        nama_jabatan: {
                            required: true
                        }
                    },

                    messages: {
                        nama_jabatan: {
                            required: "Nama jabatan harap di isi!"
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
</script>
@endsection
