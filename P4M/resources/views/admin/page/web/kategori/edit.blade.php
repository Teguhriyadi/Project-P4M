@extends('admin.layouts.main')

@section('title', 'Kategori')

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
        <li>
            <a href="{{ url('/page/admin/kategori') }}">
                @yield('title')
            </a>
        </li>
        <li class="active">Edit @yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <form action="{{ url('/page/admin/kategori') }}/{{ $edit->slug }}" method="POST" id="editKategori">
                    @method('PUT')
                    @csrf
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-pencil"></i> Form Edit Kategori
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama"> Nama Kategori </label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Kategori" value="{{ $edit->nama }}" required>
                            <label class="error hidden" for="judul">Judul harap di isi!</label>
                            <input type="hidden" class="form-control" readonly name="slug" id="slug" placeholder="Masukkan Slug" value="{{ $edit->slug }}">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success btn-social btn-flat btn-sm" id="simpan" title="Simpan Data">
                            <i class="fa fa-save"></i> Simpan
                        </button>
		                <button type="reset" class="btn btn-warning btn-social btn-flat btn-sm" title="Reset">
	    	                <i class="fa fa-refresh"></i> Reset
                	    </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Data Kategori
                    </h3>
                    <div class="pull-right">
                        <a href="{{ url('/page/admin/web/kategori') }}" class="btn btn-info btn-sm" title="Kembali">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama Kategori</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_kategori as $kategori)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $kategori->nama }}</td>
                                <td class="text-center">
                                    <a href="{{ url('/page/admin/kategori') }}/{{ $kategori->slug }}/edit" class="btn btn-warning btn-sm" title="Ubah Data">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('/page/admin/kategori') }}/{{ $kategori->slug }}" method="POST" style="display: inline;">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit" title="Hapus Data">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
