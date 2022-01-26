@extends('admin.layouts.main')

@section('title', 'Tambah Program Bantuan')

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
            <a href="{{ url('/page/admin/program_bantuan') }}">
                Data Program Bantuan
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
                    <a href="{{ url('/page/admin/program_bantuan/') }}" class="btn btn-social btn-info btn-flat btn-sm" title="Kembali ke Daftar Program Bantuan">
                        <i class="fa fa-arrow-circle-left "></i> Kembali ke Daftar Program Bantuan
                    </a>
                </div>
                <form action="{{ url('/page/admin/program_bantuan') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="sasaran" class="col-sm-3"> Sasaran Program </label>
                            <div class="col-sm-9">
                                <select name="sasaran" id="sasaran" class="form-control input-sm select2" width="100%">
                                    <option value="">- Pilih Sasaran Program -</option>
                                    <option value="1">Penduduk Perorangan</option>
                                    <option value="2">Keluarga - KK</option>
                                    <option value="3">Rumah Tangga</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-sm-3"> Nama Program </label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" id="nama" class="form-control input-sm" placeholder="Masukkan Nama Program">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="col-sm-3"> Keterangan </label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control" placeholder="Isi Keterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="asal_dana" class="col-sm-3"> Asal Dana </label>
                            <div class="col-sm-9">
                                <select name="asal_dana" id="asal_dana" class="form-control input-sm select2">
                                    <option value="">Asal Dana</option>
                                    <option value="PUSAT">Pusat</option>
                                    <option value="PROVINSI">Provinsi</option>
                                    <option value="KAB/KOTA">Kab/Kota</option>
                                    <option value="DANADESA">Dana Desa</option>
                                    <option value="LAIN-LAIN">Lain - Lain(Hibah)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3"> Rentang Waktu Program </label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" name="tanggal_mulai" placeholder="Tgl. Mulai" value="{{ old('tgl_lahir') }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" name="tanggal_berakhir" placeholder="Tgl. Akhir" value="{{ old('tgl_lahir') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-3"> Status </label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control input-sm select2">
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
	    	                <i class="fa fa-refresh"></i> Reset
                	    </button>
                        <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm pull-right" title="Tambah Data">
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

<script src="{{ url('backend/template/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ url('backend/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('backend/template/plugins/timepicker/bootstrap-datetimepicker.min.js') }}"></script>

<script>
  $(function() {
    $('.datepicker').datetimepicker({
      locale:'id',
      format: 'YYYY-MM-DD'
    });
  })
</script>

@endsection
