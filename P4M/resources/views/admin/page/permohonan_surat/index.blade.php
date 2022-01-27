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
                                    <th class="">No.</th>
                                    <th class="">Nama</th>
                                    <th class="">NIK</th>
                                    <th class="">Jenis Surat</th>
                                    <th class="">Telepon</th>
                                    <th class="">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemohon as $p)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $p->getPenduduk->nama }}</td>
                                    <td>{{ $p->getPenduduk->nik }}</td>
                                    <td>{{ $p->getSurat->nama }}</td>
                                    <td>{{ $p->telepon }}</td>
                                    <td>
                                        <a href="{{ url('page/admin/cetak_surat/form/'.$p->getSurat->url_surat.'/'.$p->nik) }}" class="btn bg-purple"><i class="fa fa-file-word-o"></i></a>
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
