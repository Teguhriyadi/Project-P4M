@extends('admin.layouts.main')

@section('page_title', 'Dashboard')

@section('page_content')

<section class="content-header">
    <h1>
        Data Struktur Pemerintahan
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li>
            <a href="{{ url('/page/admin/pemerintahan/struktur_pemerintahan') }}">
                <i class="fa fa-bars"></i> Struktur Pemerintahan
            </a>
        </li>
        <li class="active">Edit Data Struktur Pemerintahan</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-edit"></i> Edit Struktur Pemerintahan
                    </h3>
                </div>
                <form id="editStruktur" action="{{ url('/page/admin/pemerintahan/struktur_pemerintahan/'.$edit->id) }}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="jabatan_id"> Jabatan </label>
                            <select name="jabatan_id" id="jabatan_id" class="form-control select2" style="width: 100%">
                                <option value="" selected>- Pilih -</option>
                                @foreach ($data_jabatan as $data)
                                    @if ($edit->jabatan_id == $data->id)
                                    <option value="{{ $data->id }}" selected>
                                        {{ $data->nama_jabatan }}
                                    </option>
                                    @else
                                    <option value="{{ $data->id }}">
                                        {{ $data->nama_jabatan }}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pegawai_id"> Pegawai </label>
                            <select name="pegawai_id" id="pegawai_id" class="form-control select2" style="width: 100%;">
                                <option value="" selected>- Pilih -</option>
                                @foreach ($data_pegawai as $pegawai)
                                    @if ($edit->pegawai_id == $pegawai->id)
                                    <option value="{{ $pegawai->id }}" selected>
                                        {{ $pegawai->nama }}
                                    </option>
                                    @else
                                    <option value="{{ $pegawai->id }}">
                                        {{ $pegawai->nama }}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-social btn-success btn-flat btn-sm" title="Simpan Data">
                            <i class="fa fa-edit"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                        <a href="{{ url('/page/admin/pemerintahan/struktur_pemerintahan') }}" class="pull-right btn btn-info btn-social btn-flat btn-sm" title="kembali">
                            <i class="fa fa-sign-out"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-sign-out"></i> Struktur Pemerintahan
                    </h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Jabatan</th>
                                    <th>Pegawai</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_struktur as $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $data->getJabatan->nama_jabatan }}</td>
                                        <td>{{ $data->getPegawai->nama }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/page/admin/struktur_pemerintahan/'.$data->id) }}/edit" class="btn btn-warning btn-sm" title="Ubah Data">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ url('/page/admin/struktur_pemerintahan/'.$data->id) }}" method="POST" style="display: inline;">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Data">
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
