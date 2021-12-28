@extends('admin.layouts.main')

@section('page_content')

<section class="content-header">
    <h1>
        Kategori
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">Data Kategori</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <form action="{{ url('/page/admin/kategori/') }}" method="POST">
                    @csrf
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-plus"></i> Form Tambah Berita
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="kategori_id"> Nama Kategori </label>
                            <select name="kategori_id" class="form-control select2" id="kategori_id" style="width: 100%">
                                <option selected="selected">- Pilih -</option>
                                @foreach ($data_kategori as $kategori)
                                    <option value="">
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug"> Slug </label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Masukkan Slug">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function() {
        fetch('/page/admin/kategori/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

</script>

@endsection
