@extends('admin.layouts.main')

@section('page_content')

<section class="content-header">
    <h1>
        Berita
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">Data Berita</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <form action="{{ url('/page/admin/berita/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-plus"></i> Form Tambah Berita
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="judul"> Judul </label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label for="slug"> Slug </label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="kategori_id"> Nama Kategori </label>
                            <select name="kategori_id" class="form-control select2" id="kategori_id" style="width: 100%">
                                <option selected="selected">- Pilih -</option>
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
                        <div class="form-group">
                            <label for="body"> Body </label>
                            <textarea name="body" class="form-control" placeholder="Masukkan Body" cols="50"></textarea>
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
                </form>
            </div>
        </div>
    </div>
</section>


<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/page/admin/blog/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

</script>

@endsection
