@extends('admin.layouts.main')

@section('title', 'Peserta Program Bantuan')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{  url('/page/admin/dashboard')  }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li>
            <a href="{{ url('/page/admin/program_bantuan') }}">
                Daftar Program Bantuan
            </a>
        </li>
        <li>
            <a href="{{ url('/page/admin/program_bantuan/'.$detail->id.'/rincian') }}">
                Rincian Program Bantuan
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
                    <a href="{{ url('/page/admin/program_bantuan') }}" class="btn btn-social btn-primary btn-flat btn-sm" title="Kembali ke Daftar Program Bantuan">
                        <i class="fa fa-arrow-circle-left "></i> Kembali ke Daftar Program Bantuan
                    </a>
                    <a href="{{ url('/page/admin/program_bantuan/'.$detail->id.'/rincian') }}" class="btn btn-social btn-info btn-flat btn-sm" title="Kembali ke Rincian Program Bantuan">
                        <i class="fa fa-arrow-circle-left "></i> Kembali ke Rincian Program Bantuan
                    </a>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>
                                <b>Rincian Program</b>
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="20%">Nama Program</td>
                                            <td width="1%">:</td>
                                            <td>
                                                {{ $detail->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sasaran Peserta</td>
                                            <td>:</td>
                                            <td>
                                                @if ($detail->sasaran == 1)
                                                Penduduk Perorangan
                                                @elseif ($detail->sasaran == 2)
                                                Keluarga - KK
                                                @elseif ($detail->sasaran == 3)
                                                Rumah Tangga
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Masa Berlaku</td>
                                            <td>:</td>
                                            <td>
                                                {{ $detail->tanggal_mulai }} - {{ $detail->tanggal_berakhir }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>
                                                {{ $detail->deskripsi }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5>
                                        <b>Tambah Peserta Program</b>
                                    </h5>
                                    <hr>
                                    <form id="main" name="main" method="POST" class="form-horizontal">
                                        @method("PUT")
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 col-lg-3 "> Cari Nama Kepala Rumah Tangga</label>
                                            <div class="col-sm-9">
                                                <select name="id_penduduk" id="id_penduduk" class="form-control input-sm select2" onchange="formAction('main')" width="100%">
                                                    <option value="">- Pilih -</option>
                                                    @foreach ($data_penduduk as $data)
                                                        @if (empty($edit))
                                                        <option value="{{ $data->id }}">
                                                            NIK : {{ $data->nik }} - {{ $data->nama }}
                                                        </option>
                                                        @else
                                                            @if ($edit->id == $data->id)
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
                                        </div>
                                    </form>

                                    <!-- Sini -->
                                    @if (empty($edit))

                                    @else
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box box-info box-solid">
                                                <div class="box-header">
                                                    <i class="fa fa-user"></i>
                                                    <h3 class="box-title">
                                                        Konfirmasi Peserta
                                                    </h3>
                                                </div>
                                                <div class="box-body form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 col-lg-5"> NIK Penduduk </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled value="{{ $edit->nik }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5"> Nama Peserta </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled value="{{ $edit->nama }}">
                                                        </div>
                                                    </div>
                                                    @if ($detail->sasaran == 1)

                                                    @elseif($detail->sasaran == 2)
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5"> Nomer KK </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5"> Nama Kepala Keluarga </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5"> Status KK </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5"> Alamat Peserta </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5"> Tempat Tanggal, Lahir Peserta </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-4"> Jenis Kelamin Peserta </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5"> Umur Peserta </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5"> Pendidikan Peserta </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5"> Warga Negara / Agama Peserta </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled>
                                                        </div>
                                                    </div>
                                                    @elseif($detail->sasaran == 3)
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5">Alamat</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled value="{{ $edit->alamat_sekarang }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5">Tempat Tanggal, Lahir Kepala RTM</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled value="{{ $edit->tempat_lahir }}, {{ $edit->tgl_lahir }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5">Jenis Kelamin Kepala RTM</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled value="{{ $edit->getKelamin->nama }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5">Umur Kepala RTM</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled value="{{ $edit->umur }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5">Warga Negara / Agama Kepada RTM</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" disabled value="{{ $edit->getWargaNegara->nama }} / {{ $edit->getAgama->nama }}">
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 col-lg-5"> Bantuan Peserta Yang Sedang Diterima </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box box-success box-solid">
                                                <div class="box-header">
                                                    <i class="fa fa-credit-card"></i>
                                                    <h3 class="box-title">
                                                        Identitas Pada Kartu Peserta
                                                    </h3>
                                                </div>
                                                <form action="{{ url('/page/admin/program_bantuan/tambah_data_peserta_bantuan') }}" method="POST" class="form-horizontal">
                                                    @csrf

                                                    <input type="hidden" name="program_id" value="{{ $edit->id }}">
                                                    <input type="hidden" name="kartu_id_penduduk" value="{{ $edit->id }}">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="" class="col-sm-4 col-lg-4"> Nomor Kartu Peserta </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="" class="form-control input-sm" placeholder="Masukkan Nomor Kartu Peserta">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kartu_peserta" class="col-sm-4 col-lg-4">Gambar Kartu Peserta</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" name="kartu_peserta" id="kartu_peserta" class="form-control input-sm">
                                                                <span class="help-block"><code> Kosongkan jika tidak ingin mengunggah gambar</code></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kartu_nik" class="col-sm-4 col-lg-4"> NIK </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="kartu_nik" id="kartu_nik" class="form-control input-sm" placeholder="Masukkan NIK" value="{{ $edit->nik }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kartu_nama" class="col-sm-4 col-lg-4"> Nama </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="kartu_nama" id="kartu_nama" class="form-control input-sm" placeholder="Masukkan Nama" value="{{ $edit->nama }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kartu_tempat_lahir" class="col-sm-4 col-lg-4"> Tempat Lahir </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="kartu_tempat_lahir" id="kartu_tempat_lahir" class="form-control input-sm" placeholder="Masukkan Tempat Lahir" value="{{ $edit->tempat_lahir }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kartu_tanggal_lahir" class="col-sm-4 col-lg-4"> Tanggal Lahir </label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control pull-right datepicker" name="kartu_tanggal_lahir" placeholder="Tgl. Mulai" value="{{ $edit->tgl_lahir }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kartu_alamat" class="col-sm-4 col-lg-4"> Alamat </label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="kartu_alamat" id="kartu_alamat" class="form-control input-sm" placeholder="Masukkan Data Alamat" value="{{ $edit->alamat }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box-footer">
                                                        <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
                                                            <i class="fa fa-refresh"></i> Reset
                                                        </button>
                                                        <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm pull-right" title="Tambah Data">
                                                            <i class="fa fa-check"></i> Tambah
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- END -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

@endsection
