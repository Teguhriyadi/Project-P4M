@extends('admin.layouts.main')

@section('title', 'Profil Penerima Manfaat Program')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/page/admin') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{ url('/page/admin/program_bantuan') }}">Daftar Program Bantuan</a></li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <a href="{{ url('/page/admin/program_bantuan/') }}" class="btn btn-social btn-info btn-flat btn-sm" title="Kembali ke Daftar Program Bantuan">
                        <i class="fa fa-arrow-left"></i> Kembali ke Daftar Program Bantuan
                    </a>
                </div>
                <div class="box-body">
                    <h5>
                        <b>Profil Penerima Manfaat Program Bantuan</b>
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
                                <tr>
                                    <td width="20%">Nama Penerima</td>
                                    <td width="1%">:</td>
                                    <td>
                                        {{ $profil->kartu_nama }} - {{ $profil->kartu_nik }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>
                                        {{ $profil->kartu_alamat }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <h5>
                        <b>
                            Program Bantuan Yang Pernah Diikuti :
                        </b>
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th width="15%">Waktu / Tanggal</th>
                                    <th width="15%">Nama Program</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_profil as $data)
                                <tr>
                                    <td class="text-center" width="5%">{{ $loop->iteration }}.</td>
                                    <td>
                                        {{ $data->getDataProgramBantuan->tanggal_mulai }} -
                                        {{ $data->getDataProgramBantuan->tanggal_berakhir }}
                                    </td>
                                    <td>
                                        <a href="{{ url('/page/admin/program_bantuan/'.$data->getDataProgramBantuan->id.'/rincian') }}">
                                            {{ $data->getDataProgramBantuan->nama }}
                                        </a>
                                    </td>
                                    <td>{{ $data->getDataProgramBantuan->deskripsi }}</td>
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
