@extends('admin.layouts.main')

@section('title', 'Artikel')

@section('page_content')

<section class="content-header">
    <h1>
        Tambah @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li>
            <a href="{{ url('/page/admin/web/artikel') }}">
                Data @yield('title')
            </a>
        </li>
        <li class="active">Tambah Artikel</li>
    </ol>
</section>

@if ($data_kategori->count())
<div class="content">
    <form id="tambahArtikel" action="{{ url('/page/admin/web/artikel/') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header">
                        <a href="{{ url('page/admin/web/artikel') }}" class="btn btn-social btn-info btn-flat btn-sm" title="Kembali">
                            <i class="fa fa-arrow-circle-left"></i> Kembali
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul"> Judul </label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
                            <input type="hidden" readonly class="form-control" name="slug" id="slug" placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="body"> Isi Konten </label>
                            <textarea name="body" class="form-control" placeholder="Masukkan Body" rows="10" cols="80">
                                Silahkan Isi Konten disini...
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="kategori_id"> Nama Kategori </label>
                            <select name="kategori_id" class="form-control select2" id="kategori_id" style="width: 100%">
                                <option value="" selected="selected">- Pilih -</option>
                                @foreach ($data_kategori as $kategori)
                                <option value="{{ $kategori->id }}">
                                    {{ $kategori->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image"> Gambar </label>
                            <img class="gambar-preview" style="width: 300px;">
                            <input onchange="previewImage()" type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm" title="Tambah Data">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                        <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
	    	                <i class="fa fa-refresh"></i> Reset
                	    </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@else
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-bullhorn"></i>
                    <h3 class="box-title">Perhatian</h3>
                </div>
                <div class="box-body">
                    <div class="callout callout-danger">
                        <h4>Tidak Bisa Menginputkan Data</h4>

                        <p>
                            Karena <b> Data Kategori </b> Masih Kosong. <a href="{{ url('/page/admin/web/kategori') }}">Silahkan Inputkan Data Kategori Terlebih Dahulu</a>
                        </p>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<script>
    const title = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/page/admin/web/artikel/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    })

</script>

@endsection

@section('page_scripts')

<script src="{{ url('/backend/template') }}/bower_components/ckeditor/ckeditor.js"></script>

<script type="text/javascript">

    $(function() {
        CKEDITOR.replace('body')
    })

</script>

<script type="text/javascript">

    function previewImage()
    {
        const gambar = document.querySelector("#image");
        const gambarPreview = document.querySelector(".gambar-preview");

        gambarPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent) {
            gambarPreview.src = oFREvent.target.result;
        }
    }

    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#tambahArtikel").validate({
                    ignore: "",
                    rules: {
                        judul: {
                            required: true
                        },
                        kategori_id: {
                            required: true
                        },
                        image: {
                            required: true,
                            accept: "image/*"
                        },
                        body: {
                            required: true
                        },
                    },

                    messages: {
                        judul: {
                            required: "Judul harap di isi!"
                        },
                        kategori_id: {
                            required: "Kategori harap di isi!"
                        },
                        image: {
                            required: "Gambar harap di isi!",
                            accept: "Tipe file harus gambar (jpg, png, jpeg)"
                        },
                        body: {
                            required: "Konten harap di isi!"
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
