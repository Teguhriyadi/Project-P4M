@extends('admin.layouts.main')

@section('title', 'Edit Data Format Surat')

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
        <li>
            <a href="{{ url('/page/admin/surat/format') }}">
                Data Surat Format
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

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
                <form action="{{ url('/page/admin/surat/format/'.$edit->id) }}" method="POST" class="form-horizontal" id="formEditFormat">
                    @method("PUT")
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="kode_surat" class="col-sm-2 control-label"> Kode/Klasifikasi Surat </label>
                            <div class="col-sm-10">
                                <select name="kode_surat" id="kode_surat" class="form-control input-sm select2" style="width: 100%">
                                    <option value="" selected>- Pilih -</option>
                                    @foreach ($data_klasifikasi as $data)
                                    @if ($edit->kode_surat == $data->kode)
                                    <option value="{{ $data->kode }}" selected>
                                        {{ $data->kode }} - {{ $data->nama }}
                                    </option>
                                    @else
                                    <option value="{{ $data->kode }}">
                                        {{ $data->kode }} - {{ $data->nama }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-sm-2 control-label"> Nama </label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" id="nama" class="form-control input-sm" placeholder="Nama Layanan" value="{{ $edit->nama }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="akronim" class="col-sm-2 control-label"> Akronim Surat </label>
                            <div class="col-sm-10">
                                <input type="text" name="akronim" id="akronim" class="form-control input-sm" placeholder="Ex. SKTM" value="{{ $edit->akronim }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="masa_berlaku" class="col-sm-2 control-label"> Masa Berlaku </label>
                            <div class="col-sm-1">
                                <input type="number" name="masa_berlaku" id="masa_berlaku" class="form-control input-sm" placeholder="0" min="1" max="31" value="{{ $edit->masa_berlaku }}">
                            </div>
                            <div class="col-sm-2">
                                <select name="satuan_masa_berlaku" id="satuan_masa_berlaku" class="form-control input-sm">
                                    <option value="">- Pilih -</option>
                                    <option value="H" @if($edit->satuan_masa_berlaku == "H") selected @endif>Hari</option>
                                    <option value="M" @if($edit->satuan_masa_berlaku == "M") selected @endif>Minggu</option>
                                    <option value="B" @if($edit->satuan_masa_berlaku == "B") selected @endif>Bulan</option>
                                    <option value="T" @if($edit->satuan_masa_berlaku == "T") selected @endif>Tahun</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mandiri" class="col-sm-2 control-label">Sediakan di Layanan Mandiri</label>
                            <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                                <label id="m1" class="tipe btn btn-info btn-flat btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label ">
                                    <input id="g1" type="radio" name="mandiri" class="form-check-input" type="radio" value="1" @if($edit->mandiri == 1) checked @endif autocomplete="off">Ya
                                </label>
                                <label id="m2" class="tipe btn btn-info btn-flat btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label active">
                                    <input id="g2" type="radio" name="mandiri" class="form-check-input" type="radio" value="0" @if($edit->mandiri == 0) checked @endif autocomplete="off">Tidak
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="syarat">
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
                                            <?php
                                            $getData = DB::table("tb_syarat_surat")
                                            ->where("surat_format_id", $edit->id)
                                            ->where("ref_syarat_id", $data->id)
                                            ->first();
                                            ?>
                                            <tr>
                                                <td>
                                                    @if ($getData)
                                                    <input type="checkbox" checked name="syarat[]" value="{{ $data->id}}">
                                                    @else
                                                    <input type="checkbox"  name="syarat[]" value="{{ $data->id}}">
                                                    @endif
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
                        <button type="submit" class="btn btn-social btn-success btn-sm pull-right" title="Simpan Data">
                            <i class="fa fa-edit"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('page_scripts')
<script>
    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#formEditFormat").validate({
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
