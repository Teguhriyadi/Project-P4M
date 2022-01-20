@extends('admin.layouts.main')

@section('title', 'Daftar Anggota Rumah Tangga')

@section('page_content')

@php
    use Carbon\Carbon;
@endphp

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
                    <a href="{{ url('/page/admin/kependudukan/rtm/cetak_rtm/'.$detail->id) }}" class="btn btn-social bg-purple btn-flat btn-sm">
                        <i class="fa fa-print"></i> Cetak
                    </a>
                    <a href="{{ url('/page/admin/kependudukan/rtm/'.$detail->id."/rincian_rtm") }}" class="btn btn-info btn-flat btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali ke Daftar Anggota Rumah Tangga
                    </a>
                </div>
                <div class="box-header">
                    <h3 class="text-center">
                        <strong>KARTU RUMAH TANGGA</strong>
                    </h3>
                    <h5 class="text-center">
                        <strong>
                            No. {{ $detail->no_kk }}
                        </strong>
                    </h5>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"> ALAMAT </label>
                                <div class="col-sm-8">
                                    <p class="text-muted">: BANJAR</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">RT/RW</label>
                                <div class="col-sm-9">
                                    <p class="text-muted">: 004 / -</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">DESA / KELURAHAN</label>
                                <div class="col-sm-9">
                                    <p class="text-muted">: </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">KECAMATAN</label>
                                <div class="col-sm-9">
                                    <p class="text-muted">: BAKONGAN</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-sm-5 control-label">KABUPATEN</label>
                                <div class="col-sm-7">
                                    <p class="text-muted">: ACEH SELATAN</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">KODE POS</label>
                                <div class="col-sm-7">
                                    <p class="text-muted">: 83355</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">PROVINSI</label>
                                <div class="col-sm-7">
                                    <p class="text-muted">: ACEH</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">JUMLAH ANGGOTA</label>
                                <div class="col-sm-7">
                                    <p class="text-muted">: 2</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" width="100%">
                                    <thead class="bg-gray disabled color-palette">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Lengkap</th>
                                            <th>NIK</th>
                                            <th>Nomor KK</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Agama</th>
                                            <th>Pendidikan</th>
                                            <th>Pekerjaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            use App\Models\Model\Penduduk;
                                            $getData = Penduduk::where("id_rtm", $detail->no_kk)->get();
                                        @endphp
                                        @foreach ($getData as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->getRtm->no_kk }}</td>
                                            <td>{{ $data->getKelamin->nama }}</td>
                                            <td>{{ $data->tempat_lahir }}</td>
                                            <td>{{ $data->tgl_lahir }}</td>
                                            <td>{{ $data->getAgama->nama }}</td>
                                            <td>{{ $data->getPendidikan->nama }}</td>
                                            <td>{{ $data->getPekerjaan->nama }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="bg-gray disabled color-palette">
                                        <tr>
                                            <th>No</th>
                                            <th>Status Perkawinan</th>
                                            <th>Status Hubungan Dalam Rumah Tangga</th>
                                            <th>Kewarganegaraan</th>
                                            <th>Nama Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>Golongan Darah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getData as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->getKawin->nama }}</td>
                                            <td>{{ $data->getHubunganRtm->nama }}</td>
                                            <td>{{ $data->getWargaNegara->nama }}</td>
                                            <td>{{ $data->nama_ayah }}</td>
                                            <td>{{ $data->nama_ibu }}</td>
                                            <td>{{ $data->getGolonganDarah->nama }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <p class="pull-right">Dikeluarkan Tanggal : {{ Carbon::now()->isoFormat('D MMMM Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
