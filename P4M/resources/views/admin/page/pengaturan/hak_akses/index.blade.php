@extends('admin.layouts.main')

@section('title', 'Tambah Data Hak Akses')

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
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-plus"></i> Tambah Data
                    </h3>
                </div>
                <form action="{{ url('/page/admin/pengaturan/hak_akses') }}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama_hak_akses"> Nama Hak Akses </label>
                            <input type="text" class="form-control" name="nama_hak_akses" id="nama_hak_akses" placeholder="Masukkan @yield('title')">
                            <label class="error hidden" for="nama_hak_akses">@yield('title') harap di isi!</label>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm" id="tambah" title="Tambah Data">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                        <button type="reset" class="btn btn-social btn-warning btn-flat pull-left btn-sm" title="Reset">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-key"></i> Hak Akses
                    </h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" width="100%" id="example1">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Hak Akses</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_hak_akses as $hak_akses)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td class="text-center">{{ $hak_akses->nama_hak_akses }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/page/admin/pengaturan/hak_akses/'.$hak_akses->id.'/edit') }}" class="btn btn-warning btn-sm" title="Ubah Data">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ url('/page/admin/pengaturan/hak_akses/'.$hak_akses->id) }}" method="POST" style="display: inline;">
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
