@extends('admin.layouts.main')

@section('title', "Biodata Penduduk $penduduk->nama")

@section('page_content')

@php
setLocale(LC_ALL, 'id', 'ID')
@endphp

<style>
    .subtitle_head {
        padding: 10px 50px 10px 5px;
        background-color: #b5f2a2;
        margin: 15px 0px 10px 0px;
        text-align: left;
        color: #555;
        text-transform: uppercase;
    }
    .kecil {
        font-size: .8em;
        color: #888;
        font-style: italic;
        font-weight: 400;
        margin-bottom: 0.5em;
    }
</style>

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
        <li>
            <a href="{{ url('/page/admin/kependudukan/penduduk') }}">Daftar Penduduk</a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ url('page/admin/kependudukan/penduduk') }}" class="btn btn-social btn-flat btn-info btn-sm"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                    <a href="{{ url('page/admin/kependudukan/penduduk/'.$penduduk->id.'/edit') }}" class="btn btn-social btn-flat btn-warning btn-sm"><i class="fa fa-edit"></i> Ubah Biodata</a>
                </div>
                
                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">Biodata Penduduk (NIK : {{ $penduduk->nik }})</h3>
                        <br>
                        <p class="kecil">
                            Terdaftar pada:
                            <i class="fa fa-clock-o"></i>{{ $penduduk->created_at->formatLocalized("%d %B %Y %H:%M:%S") }}</i>
                        </p>
                        <p class="kecil">
                            Terakhir diubah:
                            <i class="fa fa-clock-o"></i>{{ $penduduk->updated_at->formatLocalized("%d %B %Y %H:%M:%S") }}
                            <i class="fa fa-user"></i> Administrator
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" >
                            <tbody>
                                <tr>
                                    <td>Status Dasar</td>
                                    <td >:</td>
                                    <td>
                                        <span class=""><strong>{{ $penduduk->getStatusHidup($penduduk->status_hidup) }}</strong></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="300">Nama</td>
                                    <td width="1">:</td>
                                    <td>{{ $penduduk->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Kartu Keluarga</td><td >:</td>
                                    <td>{{ $penduduk->kk_sebelumnya }}</td>
                                </tr>
                                <tr>
                                    <td>Hubungan Dalam Keluarga</td>
                                    <td>:</td>
                                    <td>{{ $penduduk->getHubungan->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->getKelamin->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->getAgama->nama }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="subtitle_head">
                                        <strong>DATA KELAHIRAN</strong>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Tempat / Tanggal Lahir</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->tempat_lahir }} / {{ date('d F Y', strtotime($penduduk->tgl_lahir)) }}</td>
                                </tr>
                                <tr>
                                    <td>Anak Ke</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->kelahiran_ke }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Saudara</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->jumlah_saudara }}</td>
                                </tr>
                                <tr>
                                    <td>Berat Lahir</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->berat_lahir }} Gram</td>
                                </tr>
                                <tr>
                                    <td>Panjang Lahir</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->panjang_lahir }} cm</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="subtitle_head"><strong>PENDIDIKAN, PEKERJAAN dan Kewarganegaraan</strong></th>
                                </tr>
                                <tr>
                                    <td>Pendidikan sedang ditempuh</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->getPendidikan->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->getPekerjaan->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Warga Negara</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->getWargaNegara->nama }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="subtitle_head"><strong>ORANG TUA</strong></th>
                                </tr>
                                <tr>
                                    <td>NIK Ayah</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->nik_ayah }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->nama_ayah }}</td>
                                </tr>
                                <tr>
                                    <td>NIK Ibu</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->nik_ibu }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->nama_ibu }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="subtitle_head"><strong>ALAMAT</strong></th>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->telepon }}</td>
                                </tr>
                                <tr>
                                    <td>Dusun</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->getDusun->dusun }}</td>
                                </tr>
                                <tr>
                                    <td>RT/ RW</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->getRt->rt }} / {{ $penduduk->getRw->rw }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3" class="subtitle_head"><strong>STATUS PERKAWINAN DAN KESEHATAN</strong></th>
                                </tr>
                                <tr>
                                    <td>Status Kawin</td>
                                    <td >:</td>
                                    <td>{{ $penduduk->getKawin->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan Darah</td>
                                    <td >:</td>
                                    <td>TIDAK TAHU</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection