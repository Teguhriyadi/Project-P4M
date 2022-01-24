@extends('admin.layouts.main')

@section('title', 'Program Bantuan')

@section('page_content')

@php
    use App\Models\Model\ProgramPeserta;
@endphp

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li><a href="/page/admin"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <a href="{{ url('/page/admin/program_bantuan/create') }}" class="btn btn-social btn-success btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                    <a href="" class="btn btn-info btn-success btn-flat btn-sm">
                        <i class="fa fa-arrow-right"></i> Panduan
                    </a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Aksi</th>
                                    <th>Nama Program</th>
                                    <th class="text-center">Asal Dana</th>
                                    <th class="text-center">Jumlah Peserta</th>
                                    <th class="text-center">Masa Berlaku</th>
                                    <th class="text-center">Sasaran</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_program_bantuan as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/program_bantuan/'.$data->id."/rincian") }}" class="btn bg-purple btn-flat btn-sm">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                        <a href="" class="btn btn-warning btn-flat btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-flat btn-sm">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                    <td>{{ $data->nama }}</td>
                                    <td class="text-center">{{ $data->asal_dana }}</td>
                                    <td class="text-center">
                                        @php
                                           echo $count = ProgramPeserta::where("program_id", $data->id)
                                                                        ->count();
                                        @endphp
                                    </td>
                                    <td class="text-center">
                                        {{ $data->tanggal_mulai }} - {{ $data->tanggal_berakhir }}
                                    </td>
                                    <td class="text-center">
                                        @if ($data->sasaran == 1)
                                            Penduduk Peorangan
                                        @elseif ($data->sasaran == 2)
                                            Keluarga - KK
                                        @elseif ($data->sasaran == 3)
                                            Rumah Tangga
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($data->status == 1)
                                            Aktif
                                        @elseif ($data->status == 0)
                                            Tidak Aktif
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
