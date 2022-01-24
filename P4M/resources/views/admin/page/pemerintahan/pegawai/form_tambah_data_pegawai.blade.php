@extends('admin.layouts.main')

@section('page_title', 'Dashboard')

@section('page_content')

<link rel="stylesheet" href="{{ url('backend/template/plugins/timepicker/bootstrap-timepicker.min.css') }}">

<section class="content-header">
    <h1>
        Form Tambah Data Pegawai
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li>
            <a href="{{ url('/page/admin/pemerintahan/pegawai') }}">
                <i class="fa fa-user"></i> Data Pegawai
            </a>
        </li>
        <li class="active">Form Tambah Data Pegawai</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="{{ url('/page/admin/pemerintahan/pegawai') }}" class="btn btn-social btn-flat btn-info btn-sm" title="Kembali">
                        <i class="fa fa-arrow-circle-o-left"></i> Kembali
                    </a>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12 form-horizontal">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-4 col-lg-2" for="pengurus">Data Staf</label>
                                <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                                    <label for="pengurus_1" class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label active">
                                        <input id="pengurus_1" type="radio" name="pengurus" class="form-check-input" type="radio" value="1" checked autocomplete="off" onchange="pengurus_asal(this.value);"> Dari Database Penduduk
                                    </label>
                                    <label for="pengurus_2" class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label ">
                                        <input id="pengurus_2" type="radio" name="pengurus" class="form-check-input" type="radio" value="2"  autocomplete="off" onchange="pengurus_asal(this.value);"> Tidak Terdata
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <form id="main" name="main" method="POST" class="form-horizontal">
                                @method("PUT")
                                @csrf
                                <label class="col-xs-12 col-sm-4 col-lg-2 control-label" for="id_pend">NIK / Nama Penduduk </label>
                                <div class="col-xs-12 col-sm-8">
                                    <select class="form-control select2 input-sm" id="id_pend" name="id_pend" onchange="formAction('main')">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_penduduk as $data)
                                        @if (empty($detail))
                                        <option value="{{ $data->id }}">
                                            NIK : {{ $data->nik }} - {{ $data->nama }}
                                        </option>
                                        @else
                                        @if ($detail->nik == $data->nik)
                                        <option value="{{ $data->id }}" selected>
                                            NIK : {{ $data->nik }} - {{ $data->nama }}
                                        </option>
                                        @else
                                        <option value="{{ $data->id }}">
                                            NIK : {{ $data->nik }} - {{ $data->nama }}
                                        </option>
                                        @endif
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <form action="{{ url('/page/admin/pemerintahan/pegawai/') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" id="tambahPegawai">
            @csrf
            <input type="hidden" name="id_pend" value="">
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-upload"></i> Upload Gambar
                        </h3>
                    </div>
                    <div class="box-body">
                        <label for="foto">Foto</label>
                        <img class="gambar-preview img-fluid" width="300" style="margin-bottom: 5px;">
                        <input onchange="previewImage()" type="file" class="form-control input-sm" name="foto" id="foto">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-plus"></i> Tambah Form Data Pegawai
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama" class="col-sm-4 control-label"> Nama </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm pengurus-desa" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ empty($detail) ? '' : ''.$detail->nama.'' }}">
<<<<<<< HEAD
                                {{-- <input type="text" class="form-control input-sm pengurus-luar-desa required" name="nama" id="nama" placeholder="Nama" style="display: none;"> --}}
=======
                                <input type="text" class="form-control input-sm pengurus-luar-desa required" name="nama" id="nama" placeholder="Nama" style="display: none;">
>>>>>>> 9afca961fab620a9eb00c8b3f8268bf762f6a039
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nik" class="col-sm-4 control-label"> Nomor Induk Kependudukan </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm pengurus-desa" name="nik" id="nik" placeholder="Masukkan Nama" value="{{ empty($detail) ? '' : ''.$detail->nik.'' }}">
<<<<<<< HEAD
                                {{-- <input type="text" class="form-control input-sm pengurus-luar-desa required" name="nik" id="nik" placeholder="Nama" style="display: none;"> --}}
=======
                                <input type="text" class="form-control input-sm pengurus-luar-desa required" name="nik" id="nik" placeholder="Nama" style="display: none;">
>>>>>>> 9afca961fab620a9eb00c8b3f8268bf762f6a039
                            </div>
                        </div>
                        <!--
                            <div class="form-group">
                                <label for="nip" class="col-sm-4 control-label"> NIPD </label>
                            </div>
                        -->
                        <div class="form-group">
                            <label for="nip" class="col-sm-4 control-label"> NIP </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" name="nip" id="nip" placeholder="NIP">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir" class="col-sm-4 control-label"> Tempat Lahir </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir" class="col-sm-4 control-label"> Tanggal Lahir </label>
                            <div class="col-sm-7">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sex" class="col-sm-4 control-label"> Jenis Kelamin </label>
                            <div class="col-sm-7">
                                <select name="sex" id="sex" class="form-control input-sm">
                                    <option value="">- Pilih -</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan" class="col-sm-4 control-label"> Pendidikan </label>
                            <div class="col-sm-7">
                                <select name="pendidikan" class="form-control input-sm select2" id="pendidikan">
                                    <option value="">- Pilih Pendidikan (Dalam KK) -</option>
                                    @foreach ($data_pendidikan_kk as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="agama" class="col-sm-4 control-label"> Agama </label>
                            <div class="col-sm-7">
                                <select name="agama" class="form-control input-sm select2" id="agama">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data_agama as $agama)
                                    <option value="">
                                        {{ $agama->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pangkat" class="col-sm-4 control-label"> Pangkat / Golongan </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" placeholder="Pangkat / Golongan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_sk" class="col-sm-4 control-label"> Nomor SK Pengangkatan </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" name="no_sk" id="no_sk" placeholder="Nomor SK Pengangkatan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_sk" class="col-sm-4 control-label"> Tanggal SK Pengangkatan </label>
                            <div class="col-sm-7">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker2" name="tgl_sk" value="{{ old('tgl_sk') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_henti" class="col-sm-4 control-label"> Nomor SK Pemberhentian </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" name="no_henti" id="no_henti" placeholder="Nomor SK Pemberhentian">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_henti" class="col-sm-4 control-label"> Tanggal SK Pemberhentian </label>
                            <div class="col-sm-7">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker3" name="tgl_henti" value="{{ old('tgl_henti') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="masa_jabatan" class="col-sm-4 control-label"> Masa Jabatan </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" name="masa_jabatan" id="masa_jabatan" placeholder="Contoh : 6 Tahun Periode Pertama (2015 s/d 2021)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="col-sm-4 control-label"> No. HP </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" name="no_hp" id="no_hp" placeholder="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-sm-4 control-label"> Alamat </label>
                            <div class="col-sm-7">
                                <textarea name="alamat" id="alamat" class="form-control input-sm" cols="30" rows="5" placeholder="Alamat"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm" title="Batal">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm" title="Tambah Data">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>
@endsection

@section('page_scripts')

<script src="{{ url('backend/template/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ url('backend/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('backend/template/plugins/timepicker/bootstrap-datetimepicker.min.js') }}"></script>

<script type="text/javascript">
    $('document').ready(function() {
        $("input[name='pengurus']:checked").change();
        if ($("#validasi input[name='id_pend']").val() != '') {
            $('#nama').removeClass('required');
        }
    });
</script>

<script type="text/javascript">

    function pilih()
    {
        alert('hay');
    }

    $(function() {
        $('#datepicker').datetimepicker({
            locale:'id',
            format: 'YYYY-MM-DD'
        });

        $('#datepicker2').datetimepicker({
            locale:'id',
            format: 'YYYY-MM-DD'
        });

        $('#datepicker3').datetimepicker({
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
    function pengurus_asal(asal) {
        if (asal == 1) {
            $('#main').show();
            $('.pengurus-luar-desa').hide();
            $('.pengurus-desa').show();
        } else {
            $('#main').hide();
            $("input[name='id_pend']").val('');
            $('.pengurus-luar-desa').show();
            $('.pengurus-desa').hide();
            $('#nama').addClass('required');
        }
    }

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

    function previewImage()
    {
        const gambar = document.querySelector("#foto");
        const gambarPreview = document.querySelector(".gambar-preview");

        gambarPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent) {
            gambarPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
