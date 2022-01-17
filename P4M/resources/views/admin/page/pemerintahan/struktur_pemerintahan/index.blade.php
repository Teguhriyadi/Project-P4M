@extends('admin.layouts.main')

@section('title', 'Data Struktur Pemerintahan')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-plus"></i> Tambah Struktur Pemerintahan
                    </h3>
                </div>
                <form id="tambahStruktur" action="{{ url('/page/admin/pemerintahan/struktur_pemerintahan') }}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="jabatan_id"> Jabatan </label>
                            <select name="jabatan_id" id="jabatan_id" class="form-control select2" style="width: 100%">
                                <option value="" selected>- Pilih -</option>
                                @foreach ($data_jabatan as $data)
                                @php
                                $cek_jabatan = App\Models\Model\StrukturPemerintahan::where('jabatan_id', $data->id)->first();
                                @endphp
                                @if (!$cek_jabatan)
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
                                @php
                                $cek_pegawai = App\Models\Model\StrukturPemerintahan::where('pegawai_id', $pegawai->id)->first();
                                @endphp
                                @if (!$cek_pegawai)
                                <option value="{{ $pegawai->id }}">
                                    {{ $pegawai->nama }}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="staf_id"> Sejajar </label>
                            <select name="staf_id" id="staf_id" class="form-control select2" style="width: 100%">
                                <option value="" selected>- Pilih -</option>
                                @foreach ($data_jabatan as $data)
                                <option value="{{ $data->id }}">
                                    {{ $data->nama_jabatan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-refresh"></i> Batal
                        </button>
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
                    <div class="pull-right">
                        <a href="{{ url('/page/admin/pemerintahan/struktur_pemerintahan/show') }}">
                            <i class="fa fa-search"></i> Lihat Struktur Pemerintahan
                        </a>
                    </div>
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
                                        <a href="{{ url('/page/admin/pemerintahan/struktur_pemerintahan/'.$data->id) }}/edit" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('/page/admin/pemerintahan/struktur_pemerintahan/'.$data->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
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
