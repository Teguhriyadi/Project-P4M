@php
use App\Models\Model\StrukturPemerintahan;
@endphp
@extends('admin.layouts.main')

@section('title', $detail_surat->nama)

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
                    <a href="{{ url('/page/admin/cetak_surat') }}" class="btn btn-social btn-info btn-flat btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali ke Daftar Cetak Surat
                    </a>
                </div>
                <form id="main" name="main" method="POST" class="form-horizontal">
                    @method("PUT")
                    @csrf
                    <div class="box-body" style="margin-bottom: -20px">
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> NIK / Nama </label>
                            <div class="col-sm-8">
                                @if(empty($detail))
                                <select name="id_penduduk" id="id_penduduk" class="form-control input-sm select2" onchange="formAction('main')" style="width: 100%">
                                    <option value="">-- Cari NIK / Nama Penduduk /</option>
                                    @foreach ($data_penduduk as $penduduk)
                                    @if (empty($detail))
                                    <option value="{{ $penduduk->id }}">
                                        NIK : {{ $penduduk->nik .' - '. $penduduk->nama }}
                                    </option>
                                    @else
                                    @if ($detail->id == $penduduk->id)
                                    <option value="{{ $penduduk->id }}" selected>
                                        NIK : {{ $penduduk->nik .' - '. $penduduk->nama }}
                                    </option>
                                    @else
                                    <option value="{{ $penduduk->id }}">
                                        NIK : {{ $penduduk->nik .' - '. $penduduk->nama }}
                                    </option>
                                    @endif
                                    @endif
                                    @endforeach
                                </select>
                                @else
                                <input type="text" class="form-control input-sm" value="{{ $detail->nama }}" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
                <form id="validasi" action="{{ url('/page/admin/cetak_surat/form/'.$detail_surat->url_surat) }}"  method="POST" class="form-horizontal" target="_blank">
                    @csrf
                    <div class="box-body">
                        @if (empty($detail))

                        @else
                        <input type="hidden" name="id_penduduk" value="{{ $detail->id }}">
                        <input type="hidden" name="id_surat_format" value="{{ $detail_surat->id }}">
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Tempat / Tanggal Lahir / Umur </label>
                            <div class="col-sm-4">
                                <input type="text" name="" id="" class="form-control input-sm" value="{{ $detail->tempat_lahir }}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="" id="" class="form-control input-sm" value="{{ $detail->tgl_lahir }}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="" id="" class="form-control input-sm" value="50" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Alamat </label>
                            <div class="col-sm-8">
                                <input type="text" name="" id="" class="form-control input-sm" value="{{ $detail->alamat_sekarang }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Pendidikan / Warga Negara / Agama </label>
                            <div class="col-sm-4">
                                <input type="text" name="" id="" class="form-control input-sm" value="{{ empty($detail->getPendidikan->nama) ? '' : ''.$detail->getPendidikan->nama.'' }}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="" id="" class="form-control input-sm" value="{{ empty($detail->getWargaNegara->nama) ? '' : ''.$detail->getWargaNegara->nama.'' }}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="" id="" class="form-control input-sm" value="{{ empty($detail->getAgama->nama) ? '' : ''.$detail->getAgama->nama.'' }}" readonly>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="no_surat" class="col-sm-4 col-lg-4"> Nomor Surat </label>
                            <div class="col-sm-8">
                                <input type="text" name="no_surat" id="no_surat" class="form-control input-sm" value="{{ $max_nomer }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Barang Yang Hilang </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm" name="barang">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Rincian </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control input-sm" name="rincian">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Keterangan </label>
                            <div class="col-sm-8">
                                <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_pegawai" class="col-sm-4 col-lg-4"> Staf Pemerintah Desa </label>
                            <div class="col-sm-8">
                                <select name="id_pegawai" id="id_pegawai" class="form-control input-sm select2" width="100%">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data_pegawai as $pegawai)
                                    @php
                                    $jabatan = StrukturPemerintahan::where('pegawai_id', $pegawai->id)->first();
                                    @endphp
                                    <option value="{{ $pegawai->id }}">
                                        NIP : {{ $pegawai->nip . ' - ' . $pegawai->nama }} ({{ $jabatan->getJabatan->nama_jabatan }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-social btn-danger btn-flat btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="button" onclick="tambah_elemen_cetak('cetak_rtf'); $('#validasi').submit()" class="btn btn-social bg-purple btn-flat btn-sm pull-right">
                            <i class="fa fa-file-word-o"></i> Cetak
                        </button>
                        <script type="text/javascript">
                            function tambah_elemen_cetak($nilai) {
                                $('<input>').attr({
                                    type: 'hidden',
                                    name: 'submit_cetak',
                                    value: $nilai
                                }).appendTo($('#validasi'));
                            }
                        </script>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('page_scripts')

<script type="text/javascript">
    function formAction(idForm, action, target = '')
    {
        if (target != '')
        {
            $('#'+idForm).attr('target', target);
        }
        $('#'+idForm).attr('action', action);
        console.log();
        $('#'+idForm).submit();
    }
</script>

<script>
    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#validasi").validate({
                    ignore: "",
                    rules: {
                        id_pegawai: {
                            required: true
                        },
                        barang: {
                            required: true
                        },
                        rincian: {
                            required: true
                        },
                        no_surat: {
                            required: true
                        },
                    },

                    messages: {
                        id_pegawai: {
                            required: "Pegawai harap di isi!"
                        },
                        barang: {
                            required: "Barang harap di isi!"
                        },
                        rincian: {
                            required: "Rincian harap di isi!"
                        },
                        no_surat: {
                            required: "No surat harap di isi!"
                        },
                    },

                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            }
        }

        $(D).ready(function($) {
            JQUERY4U.UTIL.setupFormValidation();
        });

    })(jQuery, window, document);
</script>

@endsection
