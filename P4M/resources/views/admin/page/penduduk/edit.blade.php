@extends('admin.layouts.main')

@section('title', 'Biodata Penduduk')

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
            <a href="{{ url('/page/admin/kependudukan/penduduk') }}">
                Daftar Penduduk
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ url('/page/admin/kependudukan/penduduk/'.$data_penduduk->id.'/edit') }}" method="POST" enctype="multipart/form-data" id="formTambahPendudukLahir">
        @method("PUT")
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-body box-profile">
                        <img class="penduduk profile-user-img img-responsive img-preview" style="border-radius: 35px; width: 200px; height: 200px; margin-bottom: 15px" src="{{ url('/gambar/gambar_kepala_user.png') }}" alt="Foto Penduduk">
                        <div class="input-group input-group-sm">
                            <input  type="text" class="form-control" id="file_path4" placeholder="Masukkan Gambar">
                            <input type="file" class="hidden" id="file4" name="foto" onchange="previewImage()">
                            <span class="input-group-btn">
                                <button  type="button" class="btn btn-info btn-flat" id="file_browser4">
                                    <i class="fa fa-upload"></i> Upload
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header">
                        <a href="{{ url('/page/admin/kependudukan/penduduk/') }}" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Penduduk">
                            <i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Daftar Penduduk
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for=""> Tanggal Lapor </label>
                                    <div class="input-group input-group-sm date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right" id="tgl_6" name="tgl_lapor" type="text" value="{{ $data_penduduk->created_at->formatLocalized("%Y-%m-%d") }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>DATA DIRI :</strong></label>
                                </div>
                            </div>

                            <input type="hidden" name="id_hubungan" id="id_hubungan" value="4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nik"> NIK </label>
                                    <input type="text" name="nik" id="nik" class="form-control input-sm" placeholder="Masukkan NIK" value="{{ $data_penduduk->nik }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nama"> Nama Lengkap </label>
                                    <input type="text" name="nama" id="nama" class="form-control input-sm" placeholder="Masukkan Nama Lengkap" value="{{ $data_penduduk->nama }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="kk_sebelumnya"> Nomor KK Sebelumnya </label>
                                    <input type="text" class="form-control input-sm" name="kk_sebelumnya" id="kk_sebelumnya" placeholder="No. KK Sebelumnya" value="{{ $data_penduduk->kk_sebelumnya }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="id_sex"> Jenis Kelamin </label>
                                    <select name="id_sex" id="id_sex" class="form-control input-sm">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_kelamin as $sex)
                                        <option value="{{ $sex->id }}" {{ ($data_penduduk->id_sex == $sex->id) ? 'selected' : '' }} >
                                            {{ $sex->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-7">
                                <label for="id_agama"> Agama </label>
                                <select name="id_agama" id="id_agama" class="form-control input-sm select2">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data_agama as $agama)
                                    <option value="{{ $agama->id }}" {{ ($data_penduduk->id_agama == $agama->id) ? 'selected' : '' }}>
                                        {{ $agama->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-sm-5">
                                <label for="contoh"> Status Penduduk </label>
                                <select name="" id="" class="form-control input-sm select2">
                                    <option value="">- Pilih -</option>
                                    <option value="">Tetap</option>
                                </select>
                            </div> --}}

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px; margin-top: 15px;">
                                    <label class="text-right"><strong>DATA KELAHIRAN :</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="akta_lahir"> Nomor Akta Kelahiran </label>
                                    <input type="text" name="akta_lahir" id="akta_lahir" class="form-control input-sm" placeholder="Masukkan Akta Lahir" value="{{ $data_penduduk->akta_lahir }}">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="tempat_lahir"> Tempat Lahir </label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-sm" placeholder="Masukkan Tempat Lahir" value="{{ $data_penduduk->tempat_lahir }}">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tgl_lahir"> Tanggal Lahir </label>
                                    <div class="input-group input-group-sm date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right datepicker" name="tgl_lahir" id="tgl_lahir" type="text" value="{{ $data_penduduk->tgl_lahir }}" placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="waktu_lahir"> Waktu Kelahiran </label>
                                    <div class="input-group input-group-sm date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right timepicker" id="waktu_lahir" name="waktu_lahir" type="text" value="{{ $data_penduduk->waktu_lahir }}" placeholder="Waktu Lahir">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for=""> Tempat Dilahirkan </label>
                                    <select name="" id="" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        <option value="RS">RS/RB</option>
                                        <option value="PUSKESMAS">PUSKESMAS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jenis_kelahiran"> Jenis Kelahiran </label>
                                    <select name="jenis_kelahiran" id="jenis_kelahiran" class="form-control input-sm">
                                        <option value="">- Pilih -</option>
                                        <option value="1">TUNGGAL</option>
                                        <option value="2">KEMBAR 2</option>
                                        <option value="3">KEMBAR 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="kelahiran_ke"> Anak Ke </label>
                                    <input type="text" name="kelahiran_ke" id="kelahiran_ke" class="form-control input-sm" min="1">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="berat_lahir"> Berat Lahir </label>
                                    <input type="text" name="berat_lahir" id="berat_lahir" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="panjang_lahir"> Panjang Lahir </label>
                                    <input type="text" name="panjang_lahir" id="panjang_lahir" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>Pendidikan dan Pekerjaan :</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_pendidikan"> Pendidikan Dalam KK </label>
                                    <select name="id_pendidikan" id="id_pendidikan" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_pendidikan_kk as $pendidikan_kk)
                                        <option value="{{ $pendidikan_kk->id }}" {{ ($data_penduduk->id_pendidikan == $pendidikan_kk->id ) ? 'selected' : ''  }}>
                                            {{ $pendidikan_kk->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_pendidikan_sedang"> Pendidikan Sedang Ditempuh </label>
                                    <select name="id_pendidikan_sedang" id="id_pendidikan_sedang" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_pendidikan as $pendidikan)
                                        <option value="{{ $pendidikan->id }}" {{ ($data_penduduk->id_pendidikan_sedang == $pendidikan->id) ? 'selected' : '' }}>
                                            {{ $pendidikan->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_pekerjaan"> Pekerjaan </label>
                                    <select name="id_pekerjaan" id="id_pekerjaan" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_pekerjaan as $pekerjaan)
                                        <option value="{{ $pekerjaan->id }}" {{ ($data_penduduk->id_pekerjaan == $pekerjaan->id) ? 'selected' : '' }}>
                                            {{ $pekerjaan->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>DATA KEWARGANEGARAAN</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="id_warga_negara"> Status Warga Negara </label>
                                    <select name="id_warga_negara" id="id_warga_negara" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_warganegara as $warganegara)
                                        <option value="{{ $warganegara->id }}" {{ ($data_penduduk->id_warga_negara == $warganegara->id) ? 'selected' : '' }} >
                                            {{ $warganegara->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>DATA ORANG TUA</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nik_ayah"> NIK Ayah </label>
                                    <input type="text" name="nik_ayah" id="nik_ayah" class="form-control input-sm" placeholder="NIK Ayah" value="{{ $data_penduduk->nik_ayah }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_ayah"> Nama Ayah </label>
                                    <input type="text" name="nama_ayah" id="nama_ayah" class="form-control input-sm" placeholder="Nama ayah" value="{{ $data_penduduk->nama_ayah }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nik_ibu"> NIK Ibu </label>
                                    <input type="text" name="nik_ibu" id="nik_ibu" class="form-control input-sm" placeholder="NIK Ibu" value="{{ $data_penduduk->nik_ibu }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_ibu"> Nama Ibu </label>
                                    <input type="text" name="nama_ibu" id="nama_ibu" class="form-control input-sm" placeholder="Nama Ibu" value="{{ $data_penduduk->nama_ibu }}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>Alamat</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alamat_sekarang"> Alamat KK </label>
                                    <input type="text" name="alamat_sekarang" id="alamat_sekarang" class="form-control input-sm" value="{{ $data_penduduk->alamat_sekarang }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_dusun">Dusun</label>
                                    <select name="id_dusun" id="id_dusun" class="form-control input-sm select2" width="100%">
                                        <option value="">Pilih Dusun</option>
                                        @foreach ($data_dusun as $d)
                                        <option value="{{ $d->id }}" {{ $data_penduduk->id_dusun == $d->id ? 'selected' : '' }}>
                                            {{ $d->dusun }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group" id="rwSebelumnya">
                                    <label for="">RW</label>
                                    <select id="" name="" class="form-control input-sm select2">
                                        <option value="">Pilih RW</option>
                                        @foreach ($data_rw as $rw)
                                        <option value="{{ $rw->id }}" {{ $rw->id == $data_penduduk->id_rw ? 'selected' : '' }}>{{ $rw->rw }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="rw"></div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group" id="rtSebelumnya">
                                    <label for="">RT</label>
                                    <select name="" id="" class="form-control input-sm select2">
                                        <option value="">Pilih RT</option>
                                        @foreach ($data_rt as $rt)
                                        <option value="{{ $rt->id }}" {{ $rt->id == $data_penduduk->id_rt ? 'selected' : '' }}>{{ $rt->rt }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="rt"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="telepon"> Nomor Telepon </label>
                                    <input type="text" name="telepon" id="telepon" class="form-control input-sm"  value="{{ $data_penduduk->telepon }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email"> Alamat Email </label>
                                    <input type="email" name="email" id="email" class="form-control input-sm"  value="{{ $data_penduduk->email }}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alamat_sebelumnya"> Alamat Sebelumnya </label>
                                    <input type="text" name="alamat_sebelumnya" id="alamat_sebelumnya" class="form-control input-sm"  value="{{ $data_penduduk->alamat_sebelumnya }}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>STATUS PERKAWINAN</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for=""> Status Perkawinan </label>
                                    <select name="" id="" class="form-control input-sm">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_kawin as $kawin)
                                        <option value="{{ $kawin->id }}" {{ $kawin->id == $data_penduduk->status_kawin ? 'selected' : '' }}>
                                            {{ $kawin->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="akta_perkawinan"> No. Akta Nikah </label>
                                    <input type="text" name="akta_perkawinan" id="akta_perkawinan" class="form-control input-sm" value="{{ $data_penduduk->akta_perkawinan }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tanggal_perkawinan"> Tanggal Perkawinan </label>
                                    <div class="input-group input-group-sm date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right datepicker" name="tanggal_perkawinan" id="tanggal_perkawinan" type="text" value="{{ $data_penduduk->tanggal_perkawinan }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="akta_perceraian"> Akta Perceraian </label>
                                    <input type="text" name="akta_perceraian" id="akta_perceraian" class="form-control input-sm" value="{{ $data_penduduk->akta_perceraian }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tanggal_perceraian"> Tanggal Perceraian </label>
                                    <div class="input-group input-group-sm date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right datepicker" name="tanggal_perceraian" id="tanggal_perceraian" type="text" value="{{ $data_penduduk->tanggal_perkawinan }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group bg-info" style="padding: 5px;">
                                    <label class="text-right"><strong>DATA KESEHATAN</strong></label>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_golongan_darah"> Golongan Darah </label>
                                    <select name="id_golongan_darah" id="id_golongan_darah" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_darah as $darah)
                                        <option value="{{ $darah->id }}" {{ ($data_penduduk->id_golongan_darah == $darah->id) ? 'selected' : '' }} >
                                            {{ $darah->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_cacat"> Cacat </label>
                                    <select name="id_cacat" id="id_cacat" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_cacat as $cacat)
                                        <option value="{{ $cacat->id }}" {{ $cacat->id == $data_penduduk->id_cacat ? 'selected' : '' }}>
                                            {{ $cacat->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="id_sakit_menahun"> Sakit Menahun </label>
                                    <select name="id_sakit_menahun" id="id_sakit_menahun" class="form-control input-sm select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data_sakit_menahun as $sakit_menahun)
                                        <option value="{{ $sakit_menahun->id }}" {{ $sakit_menahun->id == $data_penduduk->id_sakit_menahun ? 'selected' : '' }}>
                                            {{ $sakit_menahun->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-social btn-flat btn-success btn-sm pull-right" title="Simpan Data">
                            <i class="fa fa-edit"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

    $(document).ready(function () {
        $("#id_dusun").change(function () {
            let id_dusun = $(this).val();

            $.ajax({
                type: "POST",
                url: "{{ url('page/admin/dashboard/coba/combobox/ambil-rw') }}",
                data: { id_dusun: id_dusun },
                success: function(data){
                    $("#rwSebelumnya").addClass('hidden')
                    $("#rw").html(data);
                }
            });
        })
    })
</script>

<script>
    function previewImage() {
        const image = document.querySelector("#file4");
        const imgPreview = document.querySelector(".img-preview");

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    $('#file_browser4').click(function(e)
    {
        e.preventDefault();
        $('#file4').click();
    });
    $('#file4').change(function()
    {
        $('#file_path4').val($(this).val());
    });
    $('#file_path4').click(function()
    {
        $('#file_browser4').click();
    });

    // ! function(a, i, r) {
        //     var e = {};
        //     e.UTIL = {
            //         setupFormValidation: function() {
                //             a("#formTambahPendudukLahir").validate({
                    //                 ignore: "",
                    //                 rules: {
                        //                     foto: {
                            //                         accept: !0
                            //                     },
                            //                     tgl_lapor: {
                                //                         required: !0
                                //                     },
                                //                     nik: {
                                    //                         required: !0,
                                    //                         number: !0,
                                    //                         minlength: 16,
                                    //                         maxlength: 16,
                                    //                     },
                                    //                     kk_sebelumnya: {
                                        //                         number: !0,
                                        //                         minlength: 16,
                                        //                         maxlength: 16,
                                        //                     },
                                        //                     nama: {
                                            //                         required: !0
                                            //                     },
                                            //                     kk_level: {
                                                //                         required: !0
                                                //                     },
                                                //                     id_sex: {
                                                    //                         required: !0
                                                    //                     },
                                                    //                     id_agama: {
                                                        //                         required: !0
                                                        //                     },
                                                        //                     tempat_lahir: {
                                                            //                         required: !0
                                                            //                     },
                                                            //                     tgl_lahir: {
                                                                //                         required: !0
                                                                //                     },
                                                                //                     waktu_lahir: {
                                                                    //                         required: !0
                                                                    //                     },
                                                                    //                     kelahiran_ke: {
                                                                        //                         required: !0
                                                                        //                     },
                                                                        //                     berat_lahir: {
                                                                            //                         required: !0
                                                                            //                     },
                                                                            //                     panjang_lahir: {
                                                                                //                         required: !0
                                                                                //                     },
                                                                                //                     id_pendidikan: {
                                                                                    //                         required: !0
                                                                                    //                     },
                                                                                    //                     id_pendidikan_sedang: {
                                                                                        //                         required: !0
                                                                                        //                     },
                                                                                        //                     id_pekerjaan: {
                                                                                            //                         required: !0
                                                                                            //                     },
                                                                                            //                     id_warga_negara: {
                                                                                                //                         required: !0
                                                                                                //                     },
                                                                                                //                     nik_ayah: {
                                                                                                    //                         required: !0,
                                                                                                    //                         number: !0,
                                                                                                    //                         minlength: 16,
                                                                                                    //                         maxlength: 16,
                                                                                                    //                     },
                                                                                                    //                     nama_ayah: {
                                                                                                        //                         required: !0
                                                                                                        //                     },
                                                                                                        //                     nik_ibu: {
                                                                                                            //                         required: !0,
                                                                                                            //                         number: !0,
                                                                                                            //                         minlength: 16,
                                                                                                            //                         maxlength: 16,
                                                                                                            //                     },
                                                                                                            //                     nama_ibu: {
                                                                                                                //                         required: !0
                                                                                                                //                     },
                                                                                                                //                     alamat_sekarang: {
                                                                                                                    //                         required: !0
                                                                                                                    //                     },
                                                                                                                    //                     id_dusun: {
                                                                                                                        //                         required: !0
                                                                                                                        //                     },
                                                                                                                        //                     id_rw: {
                                                                                                                            //                         required: !0
                                                                                                                            //                     },
                                                                                                                            //                     id_rt: {
                                                                                                                                //                         required: !0
                                                                                                                                //                     },
                                                                                                                                //                     akta_lahir: {
                                                                                                                                    //                         required: !0
                                                                                                                                    //                     },
                                                                                                                                    //                     tempat_lahir: {
                                                                                                                                        //                         required: !0
                                                                                                                                        //                     },
                                                                                                                                        //                     alamat_sebelumnya: {
                                                                                                                                            //                         required: !0
                                                                                                                                            //                     }
                                                                                                                                            //                 },
                                                                                                                                            //                 messages: {
                                                                                                                                                //                     foto: {
                                                                                                                                                    //                         accept: "Upload format gambar!"
                                                                                                                                                    //                     },
                                                                                                                                                    //                     tempat_lahir: {
                                                                                                                                                        //                         required: "Tempat lahir harap di isi!"
                                                                                                                                                        //                     },
                                                                                                                                                        //                     akta_lahir: {
                                                                                                                                                            //                         required: "Akta lahir harap di isi!"
                                                                                                                                                            //                     },
                                                                                                                                                            //                     tgl_lapor: {
                                                                                                                                                                //                         required: "Tanggal lapor harap di isi!"
                                                                                                                                                                //                     },
                                                                                                                                                                //                     nik: {
                                                                                                                                                                    //                         required: "NIK harap di isi!",
                                                                                                                                                                    //                         minlength: "Panjang NIK minimal 16!",
                                                                                                                                                                    //                         maxlength: "Panjang NIK maksimal 16!",
                                                                                                                                                                    //                         number: "Harap masukan angka!"
                                                                                                                                                                    //                     },
                                                                                                                                                                    //                     kk_sebelumnya: {
                                                                                                                                                                        //                         minlength: "Panjang NIK minimal 16!",
                                                                                                                                                                        //                         maxlength: "Panjang NIK maksimal 16!",
                                                                                                                                                                        //                         number: "Harap masukan angka!"
                                                                                                                                                                        //                     },
                                                                                                                                                                        //                     nama: {
                                                                                                                                                                            //                         required: "Nama harap di isi!"
                                                                                                                                                                            //                     },
                                                                                                                                                                            //                     kk_level: {
                                                                                                                                                                                //                         required: "Hubungan keluarga harap di isi!"
                                                                                                                                                                                //                     },
                                                                                                                                                                                //                     id_sex: {
                                                                                                                                                                                    //                         required: "Jenis kelamin harap di isi!"
                                                                                                                                                                                    //                     },
                                                                                                                                                                                    //                     id_agama: {
                                                                                                                                                                                        //                         required: "Agama harap di isi!"
                                                                                                                                                                                        //                     },
                                                                                                                                                                                        //                     tempat_lahir: {
                                                                                                                                                                                            //                         required: "Tempat lahir harap di isi!"
                                                                                                                                                                                            //                     },
                                                                                                                                                                                            //                     tgl_lahir: {
                                                                                                                                                                                                //                         required: "Tanggal lahir harap di isi!"
                                                                                                                                                                                                //                     },
                                                                                                                                                                                                //                     waktu_lahir: {
                                                                                                                                                                                                    //                         required: "Waktu lahir harap di isi!"
                                                                                                                                                                                                    //                     },
                                                                                                                                                                                                    //                     kelahiran_ke: {
                                                                                                                                                                                                        //                         required: "Anak ke harap di isi!"
                                                                                                                                                                                                        //                     },
                                                                                                                                                                                                        //                     berat_lahir: {
                                                                                                                                                                                                            //                         required: "Berat lahir harap di isi!"
                                                                                                                                                                                                            //                     },
                                                                                                                                                                                                            //                     panjang_lahir: {
                                                                                                                                                                                                                //                         required: "Panjang lahir harap di isi!"
                                                                                                                                                                                                                //                     },
                                                                                                                                                                                                                //                     id_pendidikan: {
                                                                                                                                                                                                                    //                         required: "Pendidikan harap di isi!"
                                                                                                                                                                                                                    //                     },
                                                                                                                                                                                                                    //                     id_pendidikan_sedang: {
                                                                                                                                                                                                                        //                         required: "Pendidikan harap di isi!"
                                                                                                                                                                                                                        //                     },
                                                                                                                                                                                                                        //                     id_pekerjaan: {
                                                                                                                                                                                                                            //                         required: "Pekerjaan harap di isi!"
                                                                                                                                                                                                                            //                     },
                                                                                                                                                                                                                            //                     id_warga_negara: {
                                                                                                                                                                                                                                //                         required: "Warga negara harap di isi!"
                                                                                                                                                                                                                                //                     },
                                                                                                                                                                                                                                //                     nik_ayah: {
                                                                                                                                                                                                                                    //                         required: "NIK ayah harap di isi!",
                                                                                                                                                                                                                                    //                         minlength: "Panjang NIK minimal 16!",
                                                                                                                                                                                                                                    //                         maxlength: "Panjang NIK maksimal 16!",
                                                                                                                                                                                                                                    //                         number: "Harap masukan angka!"
                                                                                                                                                                                                                                    //                     },
                                                                                                                                                                                                                                    //                     nama_ayah: {
                                                                                                                                                                                                                                        //                         required: "Nama ayah harap di isi!"
                                                                                                                                                                                                                                        //                     },
                                                                                                                                                                                                                                        //                     nik_ibu: {
                                                                                                                                                                                                                                            //                         required: "NIK ibu harap di isi!",
                                                                                                                                                                                                                                            //                         minlength: "Panjang NIK minimal 16!",
                                                                                                                                                                                                                                            //                         maxlength: "Panjang NIK maksimal 16!",
                                                                                                                                                                                                                                            //                         number: "Harap masukan angka!"
                                                                                                                                                                                                                                            //                     },
                                                                                                                                                                                                                                            //                     nama_ibu: {
                                                                                                                                                                                                                                                //                         required: "Nama ibu harap di isi!"
                                                                                                                                                                                                                                                //                     },
                                                                                                                                                                                                                                                //                     alamat_sekarang: {
                                                                                                                                                                                                                                                    //                         required: "Alamat kk harap di isi!"
                                                                                                                                                                                                                                                    //                     },
                                                                                                                                                                                                                                                    //                     id_dusun: {
                                                                                                                                                                                                                                                        //                         required: "Dusun harap di isi!"
                                                                                                                                                                                                                                                        //                     },
                                                                                                                                                                                                                                                        //                     id_rw: {
                                                                                                                                                                                                                                                            //                         required: "RW harap di isi!"
                                                                                                                                                                                                                                                            //                     },
                                                                                                                                                                                                                                                            //                     id_rt: {
                                                                                                                                                                                                                                                                //                         required: "RT harap di isi!"
                                                                                                                                                                                                                                                                //                     },
                                                                                                                                                                                                                                                                //                     alamat_sebelumnya: {
                                                                                                                                                                                                                                                                    //                         required: "Alamat sebelumnya harap di isi!"
                                                                                                                                                                                                                                                                    //                     }
                                                                                                                                                                                                                                                                    //                 },
                                                                                                                                                                                                                                                                    //                 submitHandler: function(a) {
                                                                                                                                                                                                                                                                        //                     a.submit()
                                                                                                                                                                                                                                                                        //                 }
                                                                                                                                                                                                                                                                        //             })
                                                                                                                                                                                                                                                                        //         }
                                                                                                                                                                                                                                                                        //     }, a(r).ready(function(a) {
                                                                                                                                                                                                                                                                            //         e.UTIL.setupFormValidation()
                                                                                                                                                                                                                                                                            //     })
                                                                                                                                                                                                                                                                            // }(jQuery, window, document);
                                                                                                                                                                                                                                                                        </script>

                                                                                                                                                                                                                                                                        @endsection
