@extends('admin.layouts.main')

@section('title', 'Data Pegawai Pemerintahan Desa')

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

@if ($data_penduduk->count())
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-user"></i> Pegawai
                    </h3>
                    <div class="pull-right">
                        <a href="{{ url('/page/admin/pemerintahan/pegawai/create') }}" class="btn btn-primary btn-social btn-flat btn-sm" title="Tambah Data">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">NIK</th>
                                    <th>Nama</th>
                                    <th class="text-center">No. HP</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pegawai as $pegawai)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    @if (empty($pegawai->id_penduduk))
                                    <td class="text-center">{{ $pegawai->nik }}</td>
                                    <td>{{ $pegawai->nama }}</td>
                                    <td class="text-center">{{ $pegawai->no_hp }}</td>
                                    <td class="text-center">
                                        {{ $pegawai->getKelamin->nama }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/pemerintahan/pegawai/'.$pegawai->id) }}/luar" class="btn btn-warning btn-sm" title="Edit Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('/page/admin/pemerintahan/pegawai/'.$pegawai->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <input type="hidden" name="oldImage" value="{{ $pegawai->foto }}">
                                            <button type="submit" class="btn btn-danger btn-sm btn-delete" title="Hapus Data">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                        @if($pegawai->status == 1)
                                        <form action="" method="POST" style="display: none">
                                            @method("PUT")
                                            @csrf
                                            <button type="submit" class="btn btn-navy btn-flat btn-sm">
                                                <i class="fa fa-lock"></i>
                                            </button>
                                        </form>
                                        @elseif($pegawai->status == 0)
                                        <form action="" method="POST" style="display: none">
                                            @method("PUT")
                                            @csrf
                                            <button type="submit" class="btn btn-navy btn-flat btn-sm">
                                                <i class="fa fa-lock"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @else
                                <td class="text-center">{{ $penduduk->nik }}</td>
                                <td>{{ $penduduk->nama }}</td>
                                <td class="text-center">{{ $penduduk->telepon }}</td>
                                <td class="text-center">
                                    {{ $penduduk->getKelamin->nama }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/page/admin/pemerintahan/pegawai/'.$pegawai->id) }}/dalam" class="btn btn-warning btn-sm" title="Edit Data">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ url('/page/admin/pemerintahan/pegawai/'.$pegawai->id) }}" method="POST" style="display: inline;">
                                        @method("DELETE")
                                        @csrf
                                        <input type="hidden" name="oldImage" value="{{ $pegawai->foto }}">
                                        <button type="submit" class="btn btn-danger btn-sm btn-delete" title="Hapus Data">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                    @if($pegawai->status == 1)
                                    <form action="" method="POST" style="display: none">
                                        @method("PUT")
                                        @csrf
                                        <button type="submit" class="btn btn-navy btn-flat btn-sm">
                                            <i class="fa fa-lock"></i>
                                        </button>
                                    </form>
                                    @elseif($pegawai->status == 0)
                                    <form action="" method="POST" style="display: none">
                                        @method("PUT")
                                        @csrf
                                        <button type="submit" class="btn btn-navy btn-flat btn-sm">
                                            <i class="fa fa-lock"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                            Karena <b> Data Penduduk </b> Masih Kosong.
                            <a href="{{ url('/page/admin/kependudukan/penduduk') }}">Silahkan Inputkan Data Penduduk Terlebih Dahulu</a>
                        </p>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection
