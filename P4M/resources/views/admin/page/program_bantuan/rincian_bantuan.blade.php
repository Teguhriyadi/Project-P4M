@extends('admin.layouts.main')

@section('title', 'Sarana Agama')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li><a href="/page/admin">Dashboard</a></li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <a href="{{ url('/page/admin/program_bantuan/'.$detail->id.'/tambah_peserta') }}" class="btn btn-social btn-success btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah Peserta Baru
                    </a>
                    <a href="" class="btn btn-social bg-purple btn-flat btn-sm">
                        <i class="fa fa-upload"></i> Cetak
                    </a>
                    <a href="{{ url('/page/admin/program_bantuan') }}" class="btn btn-social btn-info btn-flat btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali Ke Daftar Program Bantuan
                    </a>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>
                                <b>Rincian Program</b>
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="20%">Nama Program</td>
                                            <td width="1%">:</td>
                                            <td>
                                                {{ $detail->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sasaran Peserta</td>
                                            <td>:</td>
                                            <td>
                                                @if ($detail->sasaran == 1)
                                                Penduduk Perorangan
                                                @elseif ($detail->sasaran == 2)
                                                Keluarga - KK
                                                @elseif ($detail->sasaran == 3)
                                                Rumah Tangga
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Masa Berlaku</td>
                                            <td>:</td>
                                            <td>
                                                {{ $detail->tanggal_mulai }} - {{ $detail->tanggal_berakhir }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>
                                                {{ $detail->deskripsi }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <h5>
                                        <b>Daftar Peserta</b>
                                    </h5>
                                </div>
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" width="100%">
                                            <thead>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Aksi</th>
                                                <th>No. KK</th>
                                                <th class="text-center">NIK</th>
                                                <th>Kepala Keluarga</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
