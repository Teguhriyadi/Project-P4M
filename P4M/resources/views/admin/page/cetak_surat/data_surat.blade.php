@extends('admin.layouts.main')

@section('title', 'Data Cetak Layanan Surat')

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
                    <a href="" class="btn btn-primary btn-flat btn-sm" title="Contoh">
                        Contoh
                    </a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Aksi</th>
                                    <th>Layanan Administrasi Surat</th>
                                    <th class="text-center">Kode Surat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_surat as $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td class="text-center">
                                            <a href="{{ url('/page/admin/cetak_surat/form/'.$data->url_surat) }}" class="btn btn-social bg-purple btn-flat btn-sm" title="Buat Surat">
                                                <i class="fa fa-file-word-o"></i> Buat Surat
                                            </a>
                                        </td>
                                        <td>{{ $data->nama }}</td>
                                        <td class="text-center">{{ $data->kode_surat }}</td>
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
