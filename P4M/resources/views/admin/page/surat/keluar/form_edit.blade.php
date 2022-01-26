@extends('admin.layouts.main')

@section('title', 'Surat Keluar')

@section('page_content')

<link rel="stylesheet" href="{{ url('backend/template/plugins/timepicker/bootstrap-timepicker.min.css') }}">

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
                    <a href="{{ url('/page/admin/surat/keluar') }}" class="btn btn-social btn-flat btn-success btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali ke Daftar Surat Keluar
                    </a>
                </div>
                <form action="{{ url('/page/admin/surat/keluar/'.$edit->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data" id="formEditSurat">
                    @method("PUT")
                    @csrf
                    <input type="hidden" name="oldBerkasScan" value="{{ $edit->berkas_scan }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nomor_urut" class="col-sm-3"> Nomor Urut </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nomor_urut" id="nomor_urut" placeholder="Masukkan Nomor Urut" value="{{ $edit->nomor_urut }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="berkas_scan" class="col-sm-3">Berkas Scan Surat Keluar</label>
                            <div class="col-sm-9">
                                @if ($edit->berkas_scan)
                                <img src="{{ url('/storage/'.$edit->berkas_scan) }}" class="gambar-preview img-fluid" width="300" style="margin-bottom: 5px;">
                                @else
                                <img class="gambar-preview img-fluid" width="300" style="margin-bottom: 5px;">
                                @endif
                                <input onchange="previewImage()" type="file" class="form-control input-sm" name="berkas_scan" id="berkas_scan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kode_surat" class="col-sm-3 "> Kode / Klasifikasi Surat </label>
                            <div class="col-sm-9">
                                <select name="kode_surat" id="kode_surat" class="form-control input-sm select2">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data_klasifikasi as $surat)
                                    <option value="{{ $surat->id }}" {{ $edit->kode_surat == $surat->id ? 'selected' : '' }}>
                                        {{ $surat->kode  }} - {{ $surat->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nomor_surat" class="col-sm-3"> Nomor Surat </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" name="nomor_surat" id="nomor_surat" value="{{ $edit->nomor_surat }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_surat" class="col-sm-3"> Tanggal Surat </label>
                            <div class="col-sm-9">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" name="tanggal_surat" value="{{ $edit->tanggal_surat }} {{ old('tanggal_surat') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tujuan" class="col-sm-3"> Tujuan </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" name="tujuan" id="tujuan" placeholder="Masukkan Tujuan" value="{{ $edit->tujuan }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="isi_singkat" class="col-sm-3"> Isi Singkat Perihal </label>
                            <div class="col-sm-9">
                                <textarea name="isi_singkat" id="isi_singkat" class="form-control input-sm" cols="30" rows="5" placeholder="Masukkan Isian Singkat">{{ $edit->isi_singkat }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
	    	                <i class="fa fa-refresh"></i> Reset
                	    </button>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-social btn-flat btn-success btn-sm" title="Simpan Data">
                                <i class="fa fa-edit"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

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
                $("#formEditSurat").validate({
                    ignore: "",
                    rules: {
                        nomor_urut: {
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
                        tujuan: {
                            required: true
                        },
                        isi_singkat: {
                            required: true
                        },
                    },

                    messages: {
                        nomor_urut: {
                            required: "Nomor urut harap di isi!"
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
                        tujuan: {
                            required: "Pengirim harap di isi!"
                        },
                        isi_singkat: {
                            required: "Isian harap di isi!"
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
