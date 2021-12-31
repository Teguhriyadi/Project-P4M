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
        <form action="{{ url('/page/admin/alamat') }}" method="POST" >
            @csrf
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-plus"></i> Tambah Data Alamat
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="website"> Website </label>
                            <input type="text" class="form-control" name="website" id="website" placeholder="Masukkan Nama Website">
                        </div>
                        <div class="form-group">
                            <label for="no_telepon"> No. Telepon </label>
                            <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            Info Alamat
                        </h3>
                    </div>
                    <div class="box-body">
                        <textarea name="alamat" id="alamat" cols="80" rows="10">
                            Alamat ...
                        </textarea>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-refresh"></i> Batal
                        </button>
                    </div>
                </div>
            </div>
        </form>
        {{-- <div class="col-md-12">
            <div class="box">
                @if ($data_alamat->count())
                    @foreach ($data_alamat as $alamat)
                    <form action="{{ url('/page/admin/alamat') }}/{{ $alamat->id }}" method="POST" id="formAlamat">
                        @method("PUT")
                        @csrf
                    @endforeach

                    @else

                    <form action="{{ url('/page/admin/alamat') }}" method="POST" id="formAlamat">
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
        </div> --}}
    </div>
</section>

@endsection

@section('page_scripts')

<script src="{{ url('/backend/template') }}/bower_components/ckeditor/ckeditor.js"></script>

<script type="text/javascript">

    $(function() {
        CKEDITOR.replace('alamat')
    })

</script>

@endsection
