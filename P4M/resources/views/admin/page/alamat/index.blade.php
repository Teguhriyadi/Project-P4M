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
        @if ($data_alamat->count())
            @foreach ($data_alamat as $alamat)
                <form action="{{ url('/page/admin/alamat/'.$alamat->id) }}" method="POST">
                @method("PUT")
            @endforeach
        @else
        <form action="{{ url('/page/admin/alamat') }}" method="POST">
        @endif
            @csrf
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            @if ($data_alamat->count())
                            <i class="fa fa-edit"></i> Edit Data Alamat
                            @else
                            <i class="fa fa-plus"></i> Tambah Data Alamat
                            @endif
                        </h3>
                    </div>
                    <div class="box-body">
                        @if ($data_alamat->count())
                            @foreach ($data_alamat as $alamat)
                            <div class="form-group">
                                <label for="website"> Website </label>
                                <input type="text" class="form-control" name="website" id="website" placeholder="Masukkan Nama Website" value="{{ $alamat->website }}">
                            </div>
                            <div class="form-group">
                                <label for="no_telepon"> No. Telepon </label>
                                <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="0" value="{{ $alamat->no_telepon }}">
                            </div>
                            @endforeach
                        @else
                        <div class="form-group">
                            <label for="website"> Website </label>
                            <input type="text" class="form-control" name="website" id="website" placeholder="Masukkan Nama Website">
                        </div>
                        <div class="form-group">
                            <label for="no_telepon"> No. Telepon </label>
                            <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="0">
                        </div>
                        @endif
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
                        @if ($data_alamat->count())
                            @foreach ($data_alamat as $alamat)
                            <textarea name="alamat" id="alamat" cols="80" rows="10">
                                {{ $alamat->alamat }}
                            </textarea>
                            @endforeach
                        @else
                        <textarea name="alamat" id="alamat" cols="80" rows="10">
                            Alamat ...
                        </textarea>
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
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-refresh"></i> Batal
                        </button>
                    </div>
                </div>
            </div>
        </form>
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
