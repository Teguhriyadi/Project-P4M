@extends('admin.layouts.main')

@section('title', 'Sejarah Desa')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    @if ($sejarah)
    <form action="{{ url('page/admin/info/sejarah-desa/'.$sejarah->id) }}" method="post" enctype="multipart/form-data">
        @method('patch')
        @else
        <form action="{{ url('page/admin/info/sejarah-desa') }}" method="post" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="box">
                        <div class="box-header">
                            <a href="/profil/sejarah-desa" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Preview</a>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="sejarah">Sejarah</label>
                                @if ($sejarah)
                                <textarea name="sejarah" id="sejarah" rows="10" class="form-control">{{ $sejarah->sejarah }}</textarea>
                                @else
                                <textarea name="sejarah" id="sejarah" rows="10" class="form-control"></textarea>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-body">
                            <label for="gambar" style="width: 100%"> Gambar </label>
                            @if ($sejarah)
                            <center><img src="/storage/{{ $sejarah->gambar }}" class="gambar-preview" style="width: 200px; margin-bottom: 20px;"></center>
                            <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                            @else
                            <center><img src="{{ url('/gambar/upload.png') }}" class="gambar-preview" style="width: 200px; margin-bottom: 20px;"></center>
                            <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                            @endif
                        </div>
                        <div class="box-footer">
                            @if ($sejarah)
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
            </div>
        </form>
    </section>

    @endsection

    @section('page_scripts')

    <script src="{{ url('/backend/template') }}/bower_components/ckeditor/ckeditor.js"></script>

    <script type="text/javascript">

        $(function() {
            CKEDITOR.replace('sejarah')
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
