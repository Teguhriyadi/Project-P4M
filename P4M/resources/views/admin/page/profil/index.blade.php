@extends('admin.layouts.main')

@section('page_content')

<section class="content-header">
    <h1>
        Info Profil Desa
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
        @if($data_profil->count())
        @foreach ($data_profil as $profil)
        <form action="{{ url('/page/admin/profil') }}/{{ $profil->id }}" method="POST" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <input type="hidden" name="oldImage" value="{{ $profil->gambar }}">
        @endforeach
        @else
        <form action="{{ url('/page/admin/profil') }}" method="POST" enctype="multipart/form-data">
            @csrf
        @endif
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            @if ($data_profil->count())
                            <i class="fa fa-edit"></i> Edit Profil Desa
                            @else
                            <i class="fa fa-plus"></i> Tambah Profil Desa
                            @endif
                        </h3>
                    </div>
                    <div class="box-body">
                        @if ($data_profil->count())
                            @foreach ($data_profil as $profil)
                            <textarea name="deskripsi" id="deskripsi" cols="80" rows="10">
                                {{ $profil->deskripsi }}
                            </textarea>
                            @endforeach
                        @else
                        <textarea name="deskripsi" id="deskripsi" cols="80" rows="10">
                            Silahkan Isi Profil Desa
                        </textarea>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            Upload Gambar
                        </h3>
                    </div>
                    <div class="box-body">
                        @if ($data_profil->count())
                            @foreach ($data_profil as $profil)
                                @if ($profil->gambar)
                                <img src="{{ url('/storage/'.$profil->gambar) }}" class="gambar-preview img-fluid d-block" style="width: 300px; margin-bottom: 5px;">
                                @else
                                <img class="gambar-preview img-fluid" style="width: 100px; margin-bottom: 5px">
                                @endif
                                <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                            @endforeach
                        @else
                        <img class="gambar-preview" style="width: 100px; margin-bottom: 5px">
                        <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                        @endif
                    </div>
                    <div class="box-footer">
                        @if ($data_profil->count())
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
        CKEDITOR.replace('deskripsi')
    })

</script>

<script type="text/javascript">

function previewImage()
    {
        const gambar = document.querySelector("#gambar");
        const gambarPreview = document.querySelector(".gambar-preview");

        gambarPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent) {
            gambarPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
