@extends('admin.layouts.main')

@section('title', "Biodata Penduduk $penduduk->nama")

@section('page_content')

@php
    use Carbon\Carbon;
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
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li>
            <a href="{{ url('/page/admin/kependudukan/penduduk') }}">
                Data Penduduk
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
                    <a href="{{ url('page/admin/kependudukan/penduduk') }}" class="btn btn-social btn-flat btn-info btn-sm" title="Kembali">
                        <i class="fa fa-arrow-circle-o-left"></i> Kembali
                    </a>
                    <a href="{{ url('page/admin/kependudukan/penduduk/'.$penduduk->id.'/edit') }}" class="btn btn-social btn-flat btn-warning btn-sm" title="Ubah Biodata">
                        <i class="fa fa-edit"></i> Ubah Biodata
                    </a>
                    <a href="{{ url('page/admin/kependudukan/penduduk/'.$penduduk->id.'/cetak') }}" class="btn btn-social btn-flat btn-primary btn-sm" target="_blank" title="Cetak Penduduk">
                        <i class="fa fa-print"></i> Cetak Penduduk
                    </a>
                </div>

                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">Biodata Penduduk (NIK : {{ $penduduk->nik }})</h3>
                        <br>
                        <p class="kecil">
                            Terdaftar pada:
                            <i class="fa fa-clock-o"></i> {{ Carbon::createFromFormat('Y-m-d H:i:s', $penduduk->created_at)->isoFormat('D MMMM Y') }}</i>
                        </p>
                        <p class="kecil">
                            Terakhir diubah:
                            <i class="fa fa-clock-o"></i> {{ Carbon::createFromFormat('Y-m-d H:i:s', $penduduk->updated_at)->isoFormat('D MMMM Y') }}
                            <i class="fa fa-user"></i> Administrator
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td colspan="3">
                                    <img src="{{ url('/gambar/gambar_kepala_user.png') }}" class="profile-user-img img-responsive img-circle">
                                </td>
                            </tr>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td>Status Dasar</td>
                                            <td >:</td>
                                            <td>
                                                {{ $penduduk->getStatusDasar->nama }}
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
                                            <td>
                                                @if (empty($penduduk->getHubungan->nama))

                                                @else
                                                {{ $penduduk->getHubungan->nama }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td >:</td>
                                            <td>
                                                @if (empty($penduduk->getKelamin->nama))

                                                @else
                                                {{ $penduduk->getKelamin->nama }}
                                                @endif

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td >:</td>
                                            <td>
                                                @if (empty($penduduk->getAgama->nama))

                                                @else
                                                {{ $penduduk->getAgama->nama }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="subtitle_head">
                                                <strong>DATA KELAHIRAN</strong>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>Tempat / Tanggal Lahir</td>
                                            <td>:</td>
                                            <td>
                                                {{ $penduduk->tempat_lahir }} /
                                                <?php
                                                    $date = Carbon::parse($penduduk->tgl_lahir);
                                                    echo $date->isoFormat('D MMMM Y');
                                                ?>
                                            </td>
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
                                            <td>
                                                @if (empty($penduduk->getPendidikan->nama))

                                                @else
                                                {{ $penduduk->getPendidikan->nama }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td >:</td>
                                            <td>
                                                @if (empty($penduduk->getPekerjaan->nam))

                                                @else
                                                {{ $penduduk->getPekerjaan->nama }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Warga Negara</td>
                                            <td >:</td>
                                            <td>
                                                @if (empty($penduduk->getWargaNegara->nama))

                                                @else
                                                {{ $penduduk->getWargaNegara->nama }}
                                                @endif
                                            </td>
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
                                            <td>
                                                @if (empty($penduduk->getDusun->nama))

                                                @else
                                                {{ $penduduk->getDusun->dusun }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>RT/ RW</td>
                                            <td >:</td>
                                            <td>
                                                @if (empty($penduduk->getRt->rt))

                                                @else
                                                {{ $penduduk->getRt->rt }}
                                                @endif
                                                /
                                                @if (empty($penduduk->getRw->rw))

                                                @else
                                                {{ $penduduk->getRw->rw }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="subtitle_head"><strong>STATUS PERKAWINAN DAN KESEHATAN</strong></th>
                                        </tr>
                                        <tr>
                                            <td>Status Kawin</td>
                                            <td >:</td>
                                            <td>
                                                @if (empty($penduduk->getKawin->nama))

                                                @else
                                                {{ $penduduk->getKawin->nama }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Golongan Darah</td>
                                            <td >:</td>
                                            <td>TIDAK TAHU</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
