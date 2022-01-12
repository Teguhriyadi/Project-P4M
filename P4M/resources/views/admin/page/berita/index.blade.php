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
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Data Berita
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
                                <th class="text-center">No.</th>
                                <th class="text-center">Judul Berita</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_berita as $berita)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $berita->judul }}</td>
                                    <td class="text-center">{{ $berita->getCategory->nama }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/berita/'.$berita->slug) }}/edit" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('/page/admin/berita/') }}/{{ $berita->slug }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                        <a href="{{ url('/berita/'.$berita->slug) }}" class="btn btn-info btn-sm" target="_blank">
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
