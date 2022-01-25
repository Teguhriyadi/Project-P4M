@extends('admin.layouts.main')

@section('title', 'Tambah Penduduk')

@section('page_content')

<link rel="stylesheet" href="{{ url('backend/template/plugins/timepicker/bootstrap-timepicker.min.css') }}">

<style>
    .subtitle_head {
        padding: 10px 50px 10px 5px;
        background-color: #b5f2a2;
        margin: 15px 0px 10px 0px;
        text-align: left;
        color: #555;
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
            <a href="{{ url('/page/admin/kependudukan/penduduk') }}">Dashboard</a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="box">
                <div class="box-header">
                    <a href="{{ url('page/admin/kependudukan/penduduk') }}" class="btn btn-social btn-flat btn-info btn-sm"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                </div>
                <form action="{{ url('page/admin/kependudukan/penduduk') }}" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="form-group subtitle_head text-uppercase">
                            <strong>Data Diri :</strong>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" class="form-control input-sm" id="nik" value="{{ old('nik') }}">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control input-sm" id="nama" value="{{ old('nama') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="kk_sebelumnya">No. KK Sebelumnya</label>
                                <input type="text" name="kk_sebelumnya" class="form-control input-sm" id="kk_sebelumnya" value="{{ old('kk_sebelumnya') }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="id_hubungan">Hubungan dalam keluarga</label>
                                <select name="id_hubungan" id="id_hubungan" class="form-control input-sm">
                                    @foreach ($data_hubungan as $hubungan)
                                    <option value="{{ $hubungan->id }}" {{ old('id_hubungan')==$hubungan->id ? 'selected' : '' }}>{{ $hubungan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="id_sex">Jenis Kelamin</label>
                                <select name="id_sex" id="id_sex" class="form-control input-sm">
                                    @foreach ($data_kelamin as $kelamin)
                                    <option value="{{ $kelamin->id }}" {{ old('id_sex')==$kelamin->id ? 'selected' : '' }}>{{ $kelamin->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="id_agama">Agama</label>
                                <select name="id_agama" id="id_agama" class="form-control input-sm">
                                    @foreach ($data_agama as $agama)
                                    <option value="{{ $agama->id }}" {{ old('id_agama')==$agama->id ? 'selected' : '' }}>{{ $agama->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group subtitle_head text-uppercase">
                            <strong>Data Kelahiran :</strong>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control input-sm" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Waktu Lahir</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" class="form-control timepicker" name="waktu_lahir"  value="{{ old('waktu_lahir') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="kelahiran_ke">Anak Ke</label>
                                    <input type="number" class="form-control input-sm" id="kelahiran_ke" name="kelahiran_ke"  value="{{ old('kelahiran_ke') }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="jumlah_saudara">Jumlah Saudara</label>
                                    <input type="number" class="form-control input-sm" id="jumlah_saudara" name="jumlah_saudara"  value="{{ old('jumlah_saudara') }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="berat_lahir">Berat Lahir <code>(Gram)</code> </label>
                                    <input type="text" class="form-control input-sm" id="berat_lahir" name="berat_lahir" value="{{ old('berat_lahir') }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="panjang_lahir">Panjang Lahir <code>(Cm)</code> </label>
                                    <input type="text" class="form-control input-sm" id="panjang_lahir" name="panjang_lahir"  value="{{ old('panjang_lahir') }}">
                                </div>
                            </div>

                        </div>

                        <div class="form-group subtitle_head text-uppercase">
                            <strong>Pendidikan, Pekerjaan dan Kewarganegaraan :</strong>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_pendidikan">Pendidikan</label>
                                    <select name="id_pendidikan" id="id_pendidikan" class="form-control input-sm">
                                        @foreach ($data_pendidikan as $pendidikan)
                                        <option value="{{ $pendidikan->id }}" {{ old('id_pendidikan')==$pendidikan->id ? 'selected' : '' }}>{{ $pendidikan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_pekerjaan">Pekerjaan</label>
                                    <select name="id_pekerjaan" id="id_pekerjaan" class="form-control input-sm">
                                        @foreach ($data_pekerjaan as $pekerjaan)
                                        <option value="{{ $pekerjaan->id }}"  {{ old('id_pekerjaan')==$pekerjaan->id ? 'selected' : '' }}>{{ $pekerjaan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_warga_negara">Status Warga</label>
                                    <select name="id_warga_negara" id="id_warga_negara" class="form-control input-sm">
                                        @foreach ($data_warganegara as $warganegara)
                                        <option value="{{ $warganegara->id }}"  {{ old('id_warga_negara')==$warganegara->id ? 'selected' : '' }}>{{ $warganegara->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-group subtitle_head text-uppercase">
                            <strong>Data Orang Tua :</strong>
                        </div>

                        <div class="row">

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nik_ayah">NIK Ayah</label>
                                    <input type="text" name="nik_ayah" class="form-control input-sm" id="nik_ayah" value="{{ old('nik_ayah') }}">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" value="{{ old('nama_ayah') }}" name="nama_ayah" class="form-control input-sm" id="nama_ayah">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nik_ibu">NIK Ibu</label>
                                    <input type="text" name="nik_ibu" value="{{ old('nik_ibu') }}" class="form-control input-sm" id="nik_ibu">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="nama_ibu">Nama Ibu</label>
                                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="form-control input-sm" id="nama_ibu">
                                </div>
                            </div>

                        </div>

                        <div class="form-group subtitle_head text-uppercase">
                            <strong>Status Perkawinan dan Kesehatan :</strong>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_kawin">Status Perkawinan</label>
                                    <select class="form-control input-sm" name="status_kawin" id="status_kawin">
                                        @foreach ($data_kawin as $kawin)
                                        <option value="{{ $kawin->id }}" {{ old('id_status_kawin')==$kawin->id ? 'selected' : '' }}>{{ $kawin->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_golongan_darah">Golongan Darah</label>
                                    <select name="id_golongan_darah" id="id_golongan_darah" class="form-control input-sm">
                                        @foreach ($data_darah as $darah)
                                        <option value="{{ $darah->id }}" {{ old('id_golongan_darah')==$darah->id ? 'selected' : '' }}>{{ $darah->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="form-group subtitle_head text-uppercase">
                            <strong>Alamat :</strong>
                        </div>

                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" class="form-control input-sm" name="telepon" id="telepon" value="{{ old('telepon') }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id_dusun">Dusun</label>
                                    <select name="id_dusun" id="id_dusun" class="form-control input-sm select2" width="100%">
                                        <option value="">Pilih Dusun</option>
                                        @foreach ($dusun as $d)
                                        <option value="{{ $d->id }}">
                                            {{ $d->dusun }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group" id="rw"></div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group" id="rt"></div>
                            </div>

                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="reset" class="btn btn-social btn-flat btn-warning btn-sm"><i class="fa fa-refresh"></i> Reset</button>

                        <button class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('page_scripts')

<script>
    $(function() {
        $('#datepicker').datetimepicker({
            locale:'id',
            format: 'YYYY-MM-DD'
        });

        $('.timepicker').datetimepicker({
            format: 'HH:mm',
            locale:'id'
        });
    })



</script>

@endsection
