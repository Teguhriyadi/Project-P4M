@extends('admin.layouts.main')

@section('page_title', 'Dashboard')

@section('page_content')

<section class="content-header">
    <h1>
        Data Struktur Pemerintahan
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">Blank page</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-edit"></i> Edit Data Tahun
                    </h3>
                </div>
                <form action="{{ url('/page/admin/tahun/'.$edit->id) }}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="tahun"> Tahun </label>
                            <input type="year" class="form-control" name="tahun" id="tahun" placeholder="0" value="{{ $edit->tahun }}">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success btn-sm" title="Simpan">
                            <i class="fa fa-edit"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-social btn-warning btn-sm" title="Reset">
	    	                <i class="fa fa-refresh"></i> Reset
                	    </button>
                        <a href="{{ url('/page/admin/tahun') }}" class="btn btn-info btn-sm pull-right" title="Kembali">
                            <i class="fa fa-sign-out"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-money"></i> Tahun
                    </h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_tahun as $tahun)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">{{ $tahun->tahun }}</td>
                                    <td class="text-center">
                                        @if ($tahun->status == 0)
                                        <form action="{{ url('/page/admin/tahun/aktifkan') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $tahun->id }}">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fa fa-check"></i> Aktifkan
                                            </button>
                                        </form>
                                        @else
                                        <form action="{{ url('/page/admin/tahun/non-aktifkan') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $tahun->id }}">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-close"></i> Non-Aktifkan
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/tahun/'.$tahun->id) }}/edit" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('/page/admin/tahun/'.$tahun->id) }}" method="POST" style="display: inline;">
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

@endsection
