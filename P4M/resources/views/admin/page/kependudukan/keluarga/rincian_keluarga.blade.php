@extends('admin.layouts.main')

@section('title', 'Daftar Anggota Keluarga')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
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
                    <a class="btn btn-social btn-success btn-flat btn-sm" data-toggle="dropdown">
                        <i class="fa fa-plus"></i> Tambah Anggota
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/page/admin/kependudukan/keluarga/'.$edit->id) }}/rincian_keluarga/anggota_keluarga_lahir" class="btn btn-social btn-flat btn-block btn-sm" title="Anggota Keluarga Lahir">
                                <i class="fa fa-plus"></i> Anggota Keluarga Lahir
                            </a>
                            <a href="{{ url('/page/admin/kependudukan/keluarga/'.$edit->id) }}/rincian_keluarga/anggota_keluarga_masuk" class="btn btn-social btn-flat btn-block btn-sm" title="Anggota Keluarga Masuk">
                                <i class="fa fa-plus"></i> Anggota Keluarga Masuk
                            </a>
                            <a href="" class="btn btn-social btn-flat btn-block btn-sm" title="">
                                <i class="fa fa-plus"></i> Dari Penduduk Sudah Ada
                            </a>
                        </li>
                    </ul>
                    <a href="{{ url('/page/admin/kependudukan/keluarga') }}" class="btn btn-social btn-info btn-flat btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali ke Daftar Keluarga
                    </a>
                </div>
                <div class="box-body">
                    <h5>
                        <b>Rincian Keluarga</b>
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
                                <tr>
                                    <td>Nomor Kartu Keluarga (KK)</td>
								    <td>:</td>
                                    <td>
                                        {{ $edit->no_kk }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kepala Keluarga</td>
								    <td>:</td>
                                    <td>
                                        {{ $edit->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
								    <td>:</td>
                                    <td>
                                        {{ $edit->alamat }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Program Bantuan</td>
								    <td>:</td>
                                    <td>
                                        -
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-body">
                    <h5>
                        <b>Daftar Anggota Keluarga</b>
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">NIK</th>
                                    <th>Nama</th>
                                    <th class="text-center">Tanggal Lahir</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Hubungan Keluarga</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    use App\Models\Model\Penduduk;
                                    $data_penduduk = Penduduk::where("id_kk" ,$edit->id_kk)
                                                ->get();
                                @endphp
                                @foreach ($data_penduduk as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">{{ $data->nik }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td class="text-center">{{ $data->tgl_lahir }}</td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-warning btn-flat btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="" class="btn bg-purple btn-flat btn-sm">
                                            <i class="fa fa-times"></i>
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
