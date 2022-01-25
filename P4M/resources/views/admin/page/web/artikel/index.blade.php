@extends('admin.layouts.main')

@section('title', 'Data Artikel')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

@if ($data_kategori->count())
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-book"></i> Artikel
                    </h3>
                    <div class="pull-right">
                        <a href="{{ url('/page/admin/web/artikel/create') }}" class="btn btn-social btn-primary btn-flat btn-sm" title="Tambah Data">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <table id="beritaTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="">Judul Artikel</th>
                                <th class="text-center">Pengunjung</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_artikel as $artikel)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="">{{ $artikel->judul }}</td>
                                    <td class="text-center">
                                        <div class="badge btn-info">{{ $artikel->getCount->count() }} Orang</div>
                                    </td>
                                    <td class="text-center">{{ $artikel->getCategory->nama }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/web/artikel/'.$artikel->slug) }}/edit" class="btn btn-warning btn-sm" title="Edit Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/page/admin/web/artikel/'.$artikel->slug) }}/komentar" class="btn bg-info btn-sm" title="Komentar">
                                            <i class="fa fa-comment-o"></i>
                                        </a>
                                        <form action="{{ url('/page/admin/web/artikel/') }}/{{ $artikel->id }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <input type="hidden" name="image" value="{{ $artikel->image }}">
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus Data">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                        <a href="{{ url('/artikel/'.$artikel->slug) }}" class="btn btn-info btn-sm" target="_blank" title="Lihat">
                                            <i class="fa fa-eye"></i>
                                        </a>
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
    $(function (){
        $('#beritaTable').DataTable({
            columnDefs: [
                { orderable: false, targets: [0,3] }
            ],
        })
    })
</script>

@endsection
