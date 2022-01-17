@extends('admin.layouts.main')

@section('title', 'Data Pegawai')

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
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-user"></i> Pegawai
                    </h3>
                    <div class="pull-right">
                        <a href="{{ url('/page/admin/pemerintahan/pegawai/create') }}" class="btn btn-primary btn-sm">
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
                                    <td class="text-center">{{ $pegawai->nik }}</td>
                                    <td>{{ $pegawai->nama }}</td>
                                    <td class="text-center">{{ $pegawai->no_hp }}</td>
                                    <td class="text-center">
                                        @if ($pegawai->jenis_kelamin == "L")
                                        Laki - Laki
                                        @elseif($pegawai->jenis_kelamin == "P")
                                        Perempuan
                                        @else
                                        Tidak Ada
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/pemerintahan/pegawai/'.$pegawai->id) }}/edit" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('/page/admin/pemerintahan/pegawai/'.$pegawai->id) }}" method="POST" style="display: inline;">
                                            @method("DELETE")
                                            @csrf
                                            <input type="hidden" name="oldImage" value="{{ $pegawai->foto }}">
                                            <button type="submit" class="btn btn-danger btn-sm">
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
