@extends('admin.layouts.main')

@section('title', 'Data Profil Desa')

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
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @if ($data_profil->count())
                @foreach ($data_profil as $profil)
                <form action="{{ url('/page/admin/info/profil/'.$profil->id) }}" method="POST" enctype="multipart/form-data" id="formEditProfil">
                    @method("PUT")
                    @endforeach
                    @else
                    <form action="{{ url('/page/admin/info/profil') }}" method="POST" enctype="multipart/form-data" id="formTambahProfil">
                        @endif
                        @csrf
                        <div class="col-md-8">
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        @if($data_profil->count())
                                        <i class="fa fa-edit"></i> Edit @yield('title')
                                        @else
                                        <i class="fa fa-plus"></i> Tambah @yield('title')
                                        @endif
                                    </h3>
                                </div>
                                <div class="box-body">
                                    @if ($data_profil->count())
                                    @foreach ($data_profil as $profil)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_desa"> Nama Desa </label>
                                                <input type="text" class="form-control" name="nama_desa" id="nama_desa" placeholder="Masukkan Nama Desa" value="{{ $profil->nama_desa }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kecamatan"> Kecamatan </label>
                                                <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Masukkan Kecamatan" value="{{ $profil->kecamatan }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kabupaten"> Kabupaten </label>
                                                <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Masukkan Kabupaten" value="{{ $profil->kabupaten }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="provinsi"> Provinsi </label>
                                                <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Masukkan Data Provinsi" value="{{ $profil->provinsi }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="negara"> Negara </label>
                                                <input type="text" class="form-control" name="negara" id="negara" placeholder="Masukkan Negara" value="{{ $profil->negara }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kode_pos"> Kode Pos </label>
                                                <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Masukkan Kode Pos" value="{{ $profil->kode_pos }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi"> Deskripsi </label>
                                        <textarea name="deskripsi" id="deskripsi" cols="80" rows="10">
                                            {{ $profil->deskripsi }}
                                        </textarea>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_desa"> Nama Desa </label>
                                                <input type="text" class="form-control" name="nama_desa" id="nama_desa" placeholder="Masukkan Nama Desa">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kecamatan"> Kecamatan </label>
                                                <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Masukkan Kecamatan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kabupaten"> Kabupaten </label>
                                                <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Masukkan Kabupaten">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="provinsi"> Provinsi </label>
                                                <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Masukkan Data Provinsi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="negara"> Negara </label>
                                                <input type="text" class="form-control" name="negara" id="negara" placeholder="Masukkan Negara">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kode_pos"> Kode Pos </label>
                                                <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Masukkan Kode Pos">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi"> Deskripsi </label>
                                        <textarea name="deskripsi" id="deskripsi" cols="80" rows="10">
                                            Deskripsi Desa
                                        </textarea>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        <i class="fa fa-upload"></i> Upload Gambar
                                    </h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="gambar"> Gambar </label>
                                        <div class="box-body box-profile">
                                            @if ($data_profil->count())
                                                @foreach ($data_profil as $profil)
                                                <img class="penduduk profile-user-img img-responsive img-preview" style="border-radius: 50%; width: 200px; height: 200px; margin-bottom: 15px" src="{{ url('/storage/'.$profil->gambar) }}" alt="Foto Profil">
                                                @endforeach
                                            @else
                                            <img class="penduduk profile-user-img img-responsive img-preview" style="border-radius: 50%; width: 200px; height: 200px; margin-bottom: 15px" src="{{ url('/gambar/upload.png') }}" alt="Foto Profil">
                                            @endif

                                            <div class="input-group input-group-sm">
                                                <input  type="text" class="form-control" id="file_path4" placeholder="Masukkan Gambar">
                                                <input type="file" class="hidden" id="file4" name="gambar" onchange="previewImage()">
                                                <span class="input-group-btn">
                                                    <button  type="button" class="btn btn-info btn-flat" id="file_browser4">
                                                        <i class="fa fa-upload"></i> Upload
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    @if ($data_profil->count())
                                    <button type="submit" class="btn btn-social btn-success btn-flat btn-sm" title="Simpan Data">
                                        <i class="fa fa-edit"></i> Simpan
                                    </button>
                                    @else
                                    <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm" title="Tambah Data">
                                        <i class="fa fa-plus"></i> Tambah
                                    </button>
                                    @endif
                                    <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
                                        <i class="fa fa-refresh"></i> Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>

                    @endsection

                    @section('page_scripts')

                    <script src="{{ url('/backend/template') }}/bower_components/ckeditor/ckeditor.js"></script>

                    <script type="text/javascript">

                        (function($,W,D){var JQUERY4U={};JQUERY4U.UTIL={setupFormValidation:function(){$("#formTambahProfil").validate({ignore:"",rules:{nama_desa:{required:!0},kecamatan:{required:!0},kabupaten:{required:!0},provinsi:{required:!0},negara:{required:!0},kode_pos:{required:!0},deskripsi:{required:!0},gambar:{required:!0,accept:'image/*'},},messages:{nama_desa:{required:"Nama desa harap diisi!"},kecamatan:{required:"Kecamatan harap diisi!"},kabupaten:{required:"Kabupaten harap diisi!"},provinsi:{required:"Provinsi harap diisi!"},negara:{required:"Negara harap diisi!"},kode_pos:{required:"Kode pos harap diisi!"},deskripsi:{required:"Deskripsi harap diisi!"},gambar:{required:"Gambar harap diisi!",accept:'Masukan format gambar'},},submitHandler:function(form){form.submit()}})
                        $("#formEditProfil").validate({ignore:"",rules:{nama_desa:{required:!0},kecamatan:{required:!0},kabupaten:{required:!0},provinsi:{required:!0},negara:{required:!0},kode_pos:{required:!0},deskripsi:{required:!0},gambar:{accept:'image/*'},},messages:{nama_desa:{required:"Nama desa harap diisi!"},kecamatan:{required:"Kecamatan harap diisi!"},kabupaten:{required:"Kabupaten harap diisi!"},provinsi:{required:"Provinsi harap diisi!"},negara:{required:"Negara harap diisi!"},kode_pos:{required:"Kode pos harap diisi!"},deskripsi:{required:"Deskripsi harap diisi!"},gambar:{accept:'Masukan format gambar'},},submitHandler:function(form){form.submit()}})}}
                        $(D).ready(function($){JQUERY4U.UTIL.setupFormValidation()})})(jQuery,window,document)

                        $(function() {
                            CKEDITOR.replace('deskripsi'),
                            CKEDITOR.replace('alamat')
                        })

                    </script>

                    <script type="text/javascript">

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

                    </script>

                    @endsection
