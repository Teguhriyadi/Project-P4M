@extends('admin.layouts.main')

@section('title', 'Data Permohonan Surat')

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

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
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
                                    <th class="">Nama</th>
                                    <th class="">NIK</th>
                                    <th class="text-center">Jenis Surat</th>
                                    <th class="text-center">Telepon</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemohon as $p)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $p->getPenduduk->nama }}</td>
                                    <td>{{ $p->getPenduduk->nik }}</td>
                                    <td>{{ $p->getSurat->nama }}</td>
                                    <td class="text-center">{{ $p->telepon }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('page/admin/cetak_surat/form/'.$p->getSurat->url_surat.'/'.$p->nik) }}" class="btn bg-purple" title="Cetak Surat">
                                            <i class="fa fa-file-word-o"></i>
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
    </div>
</section>

@endsection
