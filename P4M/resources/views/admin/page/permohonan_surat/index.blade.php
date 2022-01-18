@extends('admin.layouts.main')

@section('title', 'Permohonan Surat')

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
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Jenis Surat</th>
                                    <th class="text-center">Telepon</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemohon as $p)
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->nik }}</td>
                                    <td>{{ $p->id_surat }}</td>
                                    <td>{{ $p->telepon }}</td>
                                    <td>{{ $p->telepon }}</td>
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
