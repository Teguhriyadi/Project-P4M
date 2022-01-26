@extends('admin.layouts.main')

@section('title', 'Data Format Surat')

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

@if ($data_klasifikasi->count())
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                <h4>Surat yang udah bisa</h4>
                <ul>
                    <li>Surat Jalan</li>
                    <li>Surat Keterangan Domisili</li>
                    <li>Surat Keterangan Kehilangan</li>
                    <li>Surat Keterangan Usaha</li>
                </ul>
            </div>
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-envelope-o"></i> Format Surat
                    </h3>
                    <div class="pull-right">
                        <a href="{{ url('/page/admin/surat/format/create') }}" class="btn btn-social btn-primary btn-flat btn-sm" title="Tambah Data">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Aksi</th>
                                    <th>Nama Surat</th>
                                    <th class="text-center">Akronim Surat</th>
                                    <th class="text-center">Url Surat</th>
                                    <th class="text-center">Kode/Klasifikasi</th>
                                    <th class="text-center">Template Surat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_surat_format as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/surat/format/'.$data->id) }}/edit" class="btn btn-flat btn-warning btn-sm" title="Ubah Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('/page/admin/surat/format/'.$data->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn-delete btn-flat btn btn-danger btn-sm" title="Hapus Data">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->akronim }}</td>
                                    <td class="text-center">{{ $data->url_surat }}</td>
                                    <td class="text-center">{{ $data->getKlasifikasi->kode }}</td>
                                    <td>
                                        <a href="{{ url('template/surat/'.$data->url_surat.'.docx') }}" class="btn btn-sm btn-flat bg-purple" title="Download Template"><i class="fa fa-download"></i></a>
                                        <a href="{{ url('template/surat/'.$data->url_surat.'.docx') }}" class="btn btn-sm btn-flat btn-warning" title="Upload Template Baru"><i class="fa fa-upload"></i></a>
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
                            Karena <b> Data Klasifikasi Surat </b> Masih Kosong.
                            <a href="{{ url('/page/admin/surat/klasifikasi') }}">Silahkan Inputkan Data Klasifikasi Surat Terlebih Dahulu</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection
