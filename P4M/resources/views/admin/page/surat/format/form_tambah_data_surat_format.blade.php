@extends('admin.layouts.main')

@section('title', 'Tambah Data Format Surat')

@section('page_content')

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
            <a href="{{ url('/page/admin/surat/format') }}">
                Format Surat
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

@if ($data_klasifikasi->count())
@if ($data_syarat->count())
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                <p>*Nama diisi tanpa memasukan surat</p>
            </div>
            <div class="box box-info">
                <div class="box-header">
                    <a href="{{ url('/page/admin/surat/format') }}" class="btn btn-social btn-flat btn-info btn-sm ">
                        <i class="fa fa-arrow-circle-left"></i> Kembali
                    </a>
                </div>
                <form action="{{ url('/page/admin/surat/format') }}" method="POST" class="form-horizontal" id="formTambahFormat">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="kode_surat" class="col-sm-2 control-label"> Kode/Klasifikasi Surat </label>
                            <div class="col-sm-10">
                                <select name="kode_surat" id="kode_surat" class="form-control input-sm select2" style="width: 100%">
                                    <option value="" selected>- Pilih -</option>
                                    @foreach ($data_klasifikasi as $data)
                                    <option value="{{ $data->kode }}">
                                        {{ $data->kode }} - {{ $data->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-sm-2 control-label"> Nama </label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon input-sm">Surat</span>
                                    <input type="text" name="nama" id="nama" class="form-control input-sm" placeholder="Nama Layanan">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="akronim" class="col-sm-2 control-label"> Akronim Surat </label>
                            <div class="col-sm-10">
                                <input type="text" name="akronim" id="akronim" class="form-control input-sm" placeholder="Ex. SKTM">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="masa_berlaku" class="col-md-2 col-sm-2 control-label"> Masa Berlaku </label>
                            <div class="col-md-1 col-sm-2">
                                <input type="number" name="masa_berlaku" id="masa_berlaku" class="form-control input-sm" placeholder="0" min="1" max="31" style="margin-bottom: 15px">
                            </div>
                            <div class="col-md-2 col-sm-4">
                                <select name="satuan_masa_berlaku" id="satuan_masa_berlaku" class="form-control input-sm">
                                    <option value="">- Pilih -</option>
                                    <option value="H">Hari</option>
                                    <option value="M">Minggu</option>
                                    <option value="B">Bulan</option>
                                    <option value="T">Tahun</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mandiri" class="col-sm-2 control-label">Sediakan di Layanan Mandiri</label>
                            <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                                <label id="m1" class="tipe btn btn-info btn-flat btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label active"  style="margin-bottom: 15px">
                                    <input id="g1" type="radio" name="mandiri" class="form-check-input" type="radio" value="1"  autocomplete="off" checked>Ya
                                </label>
                                <label id="m2" class="tipe btn btn-info btn-flat btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label">
                                    <input id="g2" type="radio" name="mandiri" class="form-check-input" type="radio" value="0" autocomplete="off">Tidak
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="syarat" style="display: none;">
                            <label class="col-sm-2 control-label" for="mandiri"> Syarat Surat </label>
                            <div class="col-sm-9">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <input type="checkbox" id="checkall">
                                                </th>
                                                <th class="text-center">No.</th>
                                                <th>Nama Dokumen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_syarat as $data)
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" name="syarat[]" value="{{ $data->id}}">
                                                </td>
                                                <td class="text-center">{{ $loop->iteration }}.</td>
                                                <td>{{ $data->ref_syarat_nama }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
	    	                <i class="fa fa-refresh"></i> Reset
                	    </button>
                        <button type="submit" class="btn btn-social btn-primary btn-sm pull-right" title="Simpan Data">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
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
                            Karena <b> Data Referensi Syarat Surat </b> Masih Kosong.
                            <a href="{{ url('/page/admin/surat/ref_syarat') }}"> Silahkan Inputkan Data Referensi Syarat Surat Terlebih Dahulu</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@else
@if ($data_syarat->count())
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
                            <a href="{{ url('/page/admin/surat/klasifikasi') }}"> Silahkan Inputkan Data Klasifikasi Surat Terlebih Dahulu</a>
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

<script type="text/javascript">
    $('document').ready(function() {
        syarat($('input[name=mandiri]:checked').val());
        $('input[name="mandiri"]').change(function() {
            syarat($(this).val());
        });
        $('table').on('click', "#checkall", function() {
            if ($(this).is(':checked')) {
                $(".table input[type=checkbox]").each(function () {
                    $(this).prop("checked", true);
                });
            } else {
                $(".table input[type=checkbox]").each(function () {
                    $(this).prop("checked", false);
                });
            }
            $(".table input[type=checkbox]").change();
            enableHapusTerpilih();
        });
        $("[data-toggle=tooltip]").tooltip();
    });

    function enableHapusTerpilih() {
        if ($("input[name='id_cb[]']:checked:not(:disabled)").length <= 0) {
            $(".aksi-terpilih").addClass('disabled');
            $(".hapus-terpilih").addClass('disabled');
            $(".hapus-terpilih").attr('href','#');
        } else {
            $(".aksi-terpilih").removeClass('disabled');
            $(".hapus-terpilih").removeClass('disabled');
            $(".hapus-terpilih").attr('href','#confirm-delete');
        }
    }

    function syarat(tipe) {
        (tipe == '1' || tipe == null) ? $('#syarat').show() : $('#syarat').hide();
    }

    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#formTambahFormat").validate({
                    ignore: "",
                    rules: {
                        kode_surat: {
                            required: true
                        },
                        nama: {
                            required: true
                        },
                    },

                    messages: {
                        kode_surat: {
                            required: "Kode surat harap di isi!"
                        },
                        nama: {
                            required: "Nama surat harap di isi!"
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
