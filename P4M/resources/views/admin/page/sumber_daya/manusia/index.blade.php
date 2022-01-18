@extends('admin.layouts.main')

@section('title', 'Sumber Daya Manusia')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li><a href="/page/admin">Dashboard</a></li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-users"></i> @yield('title')
                    </h3>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahSDA">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Jenis</th>
                                    <th>Luas</th>
                                    <th>Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daya_manusia as $dm)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $dm->jenis }}</td>
                                    <td>{{ $dm->luas }}</td>
                                    <td>{{ $dm->lokasi }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" onclick="editDataSDA({{ $dm->id }})" data-toggle="modal" data-target="#modalEditSDA"><i class="fa fa-edit"></i></button>
                                        <form action="{{ url('page/admin/sumber/alam/'.$dm->id) }}" method="post" style="display: inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
    </div>
</section>

@endsection
