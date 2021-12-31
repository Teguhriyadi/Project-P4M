@extends('admin.layouts.main')

@section('page_content')

<section class="content-header">
    <h1>
        Info Alamat
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">Data Info Alamat</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                @if ($data_alamat->count())
                    @foreach ($data_alamat as $alamat)
                    <form action="{{ url('/page/admin/alamat') }}/{{ $alamat->id }}" method="POST">
                        @method("PUT")
                        @csrf
                    @endforeach

                    @else

                    <form action="{{ url('/page/admin/alamat') }}" method="POST">
                    @csrf

                @endif
                    <div class="box-header">
                        <h3 class="box-title">
                            Data Info Alamat
                        </h3>
                    </div>
                    <div class="box-body">
                        @if ($data_alamat->count())
                        @foreach ($data_alamat as $alamat)
                        <div class="form-group">
                            <label for="website"> Website </label>
                            <input type="text" class="form-control" name="website" id="website" value="{{ $alamat->website }}">
                        </div>
                        <div class="form-group">
                            <label for="no_telepon"> No. Telepon </label>
                            <input type="text" class="form-control" name="no_telepon" id="no_telepon" value="{{ $alamat->no_telepon }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat"> Alamat </label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10">{{ $alamat->alamat }}</textarea>
                        </div>
                        @endforeach
                        @else
                        <div class="form-group">
                            <label for="website"> Website </label>
                            <input type="text" class="form-control" name="website" id="website">
                        </div>
                        <div class="form-group">
                            <label for="no_telepon"> No. Telepon </label>
                            <input type="text" class="form-control" name="no_telepon" id="no_telepon">
                        </div>
                        <div class="form-group">
                            <label for="alamat"> Alamat </label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        @endif
                    </div>
                    <div class="box-footer">
                        @if ($data_alamat->count())
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i> Simpan
                        </button>
                        @else
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
