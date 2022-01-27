@extends('admin.layouts.main')

@section('title', 'Form Tambah Surat Masuk')

@section('page_content')

@php
use App\Models\Model\SuratMasuk;
$noUrutAkhir = SuratMasuk::max('nomor_urut');
$no = 1;
if ($noUrutAkhir) {
    $data = sprintf("%03s", abs($noUrutAkhir + 1));
} else {
    $data = sprintf("%03s", $no);
}

@endphp

<link rel="stylesheet" href="{{ url('backend/template/plugins/timepicker/bootstrap-timepicker.min.css') }}">

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li>
            <a href="{{ url('/page/admin/surat/masuk') }}">
                Data Surat Masuk
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

@if ($data_klasifikasi->count())
    @if ($data_struktur->count())
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <a href="{{ url('/page/admin/surat/keluar') }}" class="btn btn-social btn-flat btn-info btn-flat btn-sm" title="Kembali ke Daftar Surat Masuk">
                            <i class="fa fa-arrow-circle-left"></i> Kembali ke Daftar Surat Masuk
                        </a>
                    </div>
                    <form action="{{ url('/page/admin/surat/masuk') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nomor_urut" class="col-sm-3"> Nomor Urut </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nomor_urut" id="nomor_urut" placeholder="Masukkan Nomor Urut" value="{{ $data }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_penerimaan" class="col-sm-3">Tanggal Penerimaan</label>
                                <div class="col-sm-9">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" name="tanggal_penerimaan" value="{{ old('tanggal_penerimaan') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="berkas_scan" class="col-sm-3">Berkas Scan Surat Masuk</label>
                                <div class="col-sm-9">
                                    <img class="gambar-preview img-fluid" width="300" style="margin-bottom: 5px;">
                                    <input onchange="previewImage()" type="file" class="form-control input-sm" name="berkas_scan" id="berkas_scan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kode_surat" class="col-sm-3 "> Kode / Klasifikasi Surat </label>
                                <div class="col-sm-9">
                                    <select name="kode_surat" id="kode_surat" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_klasifikasi as $surat)
                                        <option value="{{ $surat->id }}">
                                            {{ $surat->kode  }} - {{ $surat->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nomor_surat" class="col-sm-3"> Nomor Surat </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" name="nomor_surat" id="nomor_surat">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_surat" class="col-sm-3"> Tanggal Surat </label>
                                <div class="col-sm-9">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right datepicker" name="tanggal_surat" value="{{ old('tanggal_surat') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pengirim" class="col-sm-3"> Pengirim </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="pengirim" id="pengirim" placeholder="Masukkan Data Pengirim">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="isi_singkat" class="col-sm-3"> Isi Singkat Perihal </label>
                                <div class="col-sm-9">
                                    <textarea name="isi_singkat" id="isi_singkat" class="form-control input-sm" cols="30" rows="5" placeholder="Masukkan Isian Singkat"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3"> Disposisi Kepada </label>
                                @foreach ($data_struktur as $data)
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="id_pegawai[]" value="{{ $data->id }}">
                                        </span>
                                        <input type="text" class="form-control" value="{{ $data->getJabatan->nama_jabatan }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="isi_disposisi" class="col-sm-3"> Isi Disposisi </label>
                                <div class="col-sm-9">
                                    <input type="name" class="form-control input-sm" name="isi_disposisi" id="isi_disposisi" placeholder="Masukkan Isian Disposisi">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
	    	                    <i class="fa fa-refresh"></i> Reset
                            </button>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-social btn-flat btn-primary btn-sm" title="Tambah Data">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <i class="fa fa-bullhorn"></i>
                        <h3 class="box-title">Perhatian</h3>
                    </div>
                    <div class="box-body">
                        <div class="callout callout-danger">
                            <h4>Tidak Bisa Menginputkan Data</h4>

                            <p>
                                Karena <b> Data Struktur Pemerintahan </b> Masih Kosong.
                                <a href="{{ url('/page/admin/pemerintahan/struktur_pemerintahan') }}">Silahkan Inputkan Data Struktur Pemerintahan Terlebih Dahulu</a>
                            </p>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@else
    @if ($data_struktur->count())
w
    @else
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <i class="fa fa-bullhorn"></i>
                        <h3 class="box-title">Perhatian</h3>
                    </div>
                    <div class="box-body">
                        <div class="callout callout-danger">
                            <h4>Tidak Bisa Menginputkan Data</h4>

                            <p>
                                Karena <b> Data Klasifikasi Surat </b> Masih Kosong.
                                <a href="{{ url('/page/admin/surat/klasifikasi') }}">Silahkan Inputkan Data Klasifikasi Surat Terlebih Dahulu</a>
                            </p>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endif

@endsection

@section('page_scripts')

<script src="{{ url('backend/template/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ url('backend/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('backend/template/plugins/timepicker/bootstrap-datetimepicker.min.js') }}"></script>

<script>
    $(function() {
        $('.datepicker').datetimepicker({
            locale:'id',
            format: 'YYYY-MM-DD'
        });

        $('.timepicker').datetimepicker({
            format: 'HH:mm',
            locale:'id'
        });
    })
</script>

<script type="text/javascript">

    function previewImage()
    {
        const gambar = document.querySelector("#berkas_scan");
        const gambarPreview = document.querySelector(".gambar-preview");

        gambarPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent) {
            gambarPreview.src = oFREvent.target.result;
        }
    }

    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#formTambahSurat").validate({
                    ignore: "",
                    rules: {
                        nomor_urut: {
                            required: true
                        },
                        tanggal_peneriamaan: {
                            required: true
                        },
                        kode_surat: {
                            required: true
                        },
                        nomor_surat: {
                            required: true
                        },
                        tanggal_surat: {
                            required: true
                        },
                        pengirim: {
                            required: true
                        },
                        isi_singkat: {
                            required: true
                        },
                        id_pegawai: {
                            required: true
                        },
                    },

                    messages: {
                        nomor_urut: {
                            required: "Nomor urut harap di isi!"
                        },
                        tanggal_peneriamaan: {
                            required: "Tanggal penerimaan harap di isi!"
                        },
                        kode_surat: {
                            required: "Kode urut harap di isi!"
                        },
                        nomor_surat: {
                            required: "Nomor surat harap di isi!"
                        },
                        tanggal_surat: {
                            required: "Tanggal surat harap di isi!"
                        },
                        pengirim: {
                            required: "Pengirim harap di isi!"
                        },
                        isi_singkat: {
                            required: "Isian harap di isi!"
                        },
                        id_pegawai: {
                            required: "Pegawai harap di isi!"
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
