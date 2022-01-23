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
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-edit"></i> Artikel
                    </h3>
                    <div class="pull-right">
                        <a href="{{ url('/page/admin/web/artikel/create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <table id="beritaTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="">No.</th>
                                <th class="">Judul Artikel</th>
                                <th class="">Pengunjung</th>
                                <th class="">Kategori</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_artikel as $artikel)
                                <tr>
                                    <td class="">{{ $loop->iteration }}</td>
                                    <td class="">{{ $artikel->judul }}</td>
                                    <td class=""><div class="badge btn-info">{{ $artikel->getCount->count() }} Orang</div></td>
                                    <td class="">{{ $artikel->getCategory->nama }}</td>
                                    <td class="">
                                        <a href="{{ url('/page/admin/web/artikel/'.$artikel->slug) }}/edit" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/page/admin/web/artikel/'.$artikel->slug) }}/komentar" class="btn bg-info btn-sm">
                                            <i class="fa fa-comment-o"></i>
                                        </a>
                                        <form action="{{ url('/page/admin/web/artikel/') }}/{{ $artikel->id }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <input type="hidden" name="image" value="{{ $artikel->image }}">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                        <a href="{{ url('/artikel/'.$artikel->slug) }}" class="btn btn-info btn-sm" target="_blank">
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
