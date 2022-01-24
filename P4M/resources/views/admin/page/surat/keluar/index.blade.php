@extends('admin.layouts.main')

@section('title', 'Data Surat Keluar')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin') }}">
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
                    <a href="{{ url('/page/admin/surat/keluar/create') }}" class="btn btn-social btn-flat btn-primary btn-sm" title="Tambah Surat Keluar Baru">
                        <i class="fa fa-plus"></i> Tambah Surat Keluar Baru
                    </a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">No. Urut</th>
                                    <th class="text-center">Nomor Surat</th>
                                    <th class="text-center">Tanggal Surat</th>
                                    <th>Ditujukan Kepada</th>
                                    <th>Isi Singkat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_surat_keluar as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">{{ $data->no_urut }}</td>
                                    <td class="text-center">{{ $data->nomor_surat }}</td>
                                    <td class="text-center">{{ $data->tanggal_surat }}</td>
                                    <td>{{ $data->tujuan }}</td>
                                    <td>{{ $data->isi_singkat }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/surat/keluar/'.$data->id) }}/edit" class="btn btn-warning btn-sm" title="Ubah Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('/page/admin/surat/keluar/'.$data->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <input type="hidden" name="oldBerkasScan" value="{{ $data->berkas_scan }}">
                                            <button type="submit" class="btn-delete btn btn-danger btn-sm" title="Hapus Data">
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
    </div>
</section>

@endsection
