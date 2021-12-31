@extends('admin.layouts.main')

@section('page_content')

<section class="content-header">
  <h1>
    Tambah Berita
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ url('/page/admin/dashboard') }}">
        <i class="fa fa-dashboard"></i> Dashboard
      </a>
    </li>
    <li>
      <a href="{{ url('/page/admin/berita') }}">
        Data Berita
      </a>
    </li>
    <li class="active">Tambah Berita</li>
  </ol>
</section>

<div class="content">
  <form id="tambahBerita" action="{{ url('/page/admin/berita/') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-8">
        <div class="box">
          <div class="box-body">
            <div class="form-group">
              <label for="judul"> Judul </label>
              <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
              <input type="hidden" readonly class="form-control" name="slug" id="slug" placeholder="Slug">
            </div>
            <div class="form-group">
              <label for="body"> Isi Konten </label>
              <textarea name="body" class="form-control" placeholder="Masukkan Body" rows="5"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box">
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
              <input type="file" class="form-control" name="image">
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-success btn-sm">
              <i class="fa fa-plus"></i> Tambah
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
              <i class="fa fa-refresh"></i> Batal
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<script>
  const title = document.querySelector('#judul');
  const slug = document.querySelector('#slug');
  
  title.addEventListener('change', function() {
    fetch('/page/admin/berita/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  })
  
</script>

@endsection
