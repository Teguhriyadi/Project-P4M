@extends('admin.layouts.main')

@section('title', 'Data Format Surat')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Home
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
                    <a href="{{ url('/page/admin/surat/format') }}" class="btn btn-social btn-flat btn-success btn-sm ">
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
                            <label for="masa_berlaku" class="col-sm-2 control-label"> Masa Berlaku </label>
                            <div class="col-sm-1">
                                <input type="number" name="masa_berlaku" id="masa_berlaku" class="form-control input-sm" placeholder="0" min="1" max="31">
                            </div>
                            <div class="col-sm-2">
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
                                <label id="m1" class="tipe btn btn-info btn-flat btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label ">
                                    <input id="g1" type="radio" name="mandiri" class="form-check-input" type="radio" value="1"  autocomplete="off">Ya
                                </label>
                                <label id="m2" class="tipe btn btn-info btn-flat btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label active">
                                    <input id="g2" type="radio" name="mandiri" class="form-check-input" type="radio" value="0" checked autocomplete="off">Tidak
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="syarat" style="display: none;">
                            <label class="col-sm-2 control-label" for="mandiri"> Syarat Surat </label>
                            <div class="col-sm-9">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox">
                                                </th>
                                                <th class="text-center">No.</th>
                                                <th>Nama Dokumen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_syarat as $data)
                                            <tr>
                                                <td>
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
                        <button type="reset" class="btn btn-social btn-danger btn-sm">
                            <i class="fa fa-refresh"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-social btn-primary btn-sm pull-right">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('page_scripts')

<script type="text/javascript">
    $('document').ready(function() {
        syarat($('input[name=mandiri]:checked').val());
        $('input[name="mandiri"]').change(function() {
            syarat($(this).val());
        });
    });

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
