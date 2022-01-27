@extends('admin.layouts.main')

@section('title', 'Artikel')

@section('page_content')

<section class="content-header">
  <h1>
    Edit @yield('title')
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ url('/page/admin/dashboard') }}">
        <i class="fa fa-home"></i> Home
      </a>
    </li>
    <li>
      <a href="{{ url('/page/admin/berita') }}">
        Data @yield('title')
      </a>
    </li>
    <li class="active">Edit @yield('title')</li>
  </ol>
</section>

<div class="content">
  <form id="editArtikel" action="{{ url('/page/admin/web/artikel/'.$edit->slug) }}" method="POST" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <input type="hidden" name="oldImage" value="{{ $edit->image }}">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-info">
            <div class="box-header">
                <a href="{{ url('page/admin/web/artikel') }}" class="btn btn-social btn-info btn-flat btn-sm">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
          <div class="box-body">
            <div class="form-group">
              <label for="judul"> Judul </label>
              <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="{{ $edit->judul }}">
              <input type="hidden" readonly class="form-control" name="slug" id="slug" placeholder="Slug" value="{{ $edit->slug }}">
            </div>
            <div class="form-group">
              <label for="body"> Isi Konten </label>
              <textarea name="body" class="form-control" placeholder="Masukkan Body" rows="10" cols="80">
                  {{ $edit->body }}
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
                    @if ($edit->kategori_id == $kategori->id)
                    <option value="{{ $kategori->id }}" selected>
                        {{ $kategori->nama }}
                      </option>
                    @else
                    <option value="{{ $kategori->id }}">
                        {{ $kategori->nama }}
                      </option>
                    @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="image"> Gambar </label>
              @if($edit->image)
              <img class="gambar-preview" src="{{ url('/storage/'.$edit->image) }}" style="width: 100%; margin-bottom: 10px">
              @else
              <img class="gambar-preview" style="width: 100%; margin-bottom: 10px">
              @endif
              <input onchange="previewImage()" type="file" class="form-control" name="image" id="image">
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-social btn-success btn-flat btn-sm" title="Simpan">
              <i class="fa fa-edit"></i> Simpan
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
                $("#editArtikel").validate({
                    ignore: "",
                    rules: {
                        judul: {
                            required: true
                        },
                        kategori_id: {
                            required: true
                        },
                        image: {
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
