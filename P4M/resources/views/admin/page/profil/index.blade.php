@extends('admin.layouts.main')

@section('page_content')

<section class="content-header">
    <h1>
        Info Profil Desa
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">Data Info Alamat</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab">Profil Desa</a>
                    </li>
                    <li>
                        <a href="#tab_2" data-toggle="tab">Alamat</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
                            @if ($data_profil->count())
                            @foreach ($data_profil as $profil)
                            <form action="{{ url('/page/admin/profil/'.$profil->id) }}" method="POST" enctype="multipart/form-data" id="formEditProfil">
                                @method("PUT")
                                @endforeach
                                @else
                                <form action="{{ url('/page/admin/profil') }}" method="POST" enctype="multipart/form-data" id="formTambahProfil">
                                    @endif
                                    @csrf
                                    <div class="col-md-8">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">
                                                    @if($data_profil->count())
                                                    <i class="fa fa-edit"></i> Edit Profil Desa
                                                    @else
                                                    <i class="fa fa-plus"></i> Tambah Profil Desa
                                                    @endif
                                                </h3>
                                            </div>
                                            <div class="box-body">
                                                @if ($data_profil->count())
                                                @foreach ($data_profil as $profil)
                                                <div class="form-group">
                                                    <label for="nama_desa"> Nama Desa </label>
                                                    <input type="text" class="form-control" name="nama_desa" id="nama_desa" placeholder="Masukkan Nama Desa" value="{{ $profil->nama_desa }}">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="kecamatan"> Kecamatan </label>
                                                            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Masukkan Kecamatan" value="{{ $profil->kecamatan }}">
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
                                                <div class="form-group">
                                                    <label for="nama_desa"> Nama Desa </label>
                                                    <input type="text" class="form-control" name="nama_desa" id="nama_desa" placeholder="Masukkan Nama Desa">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="kecamatan"> Kecamatan </label>
                                                            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Masukkan Kecamatan">
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
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">
                                                    Upload Gambar
                                                </h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="gambar"> Gambar </label>
                                                    @if ($data_profil->count())
                                                    @foreach ($data_profil as $profil)
                                                    <img src="{{ url('/storage/'.$profil->gambar) }}" class="gambar-preview" style="width: 300px; margin-bottom: 5px;">
                                                    @endforeach
                                                    @else
                                                    <br>
                                                    <center>
                                                        <img src="{{ url('/gambar/upload.png') }}" class="gambar-preview" style="width: 200px; margin-bottom: 20px;">
                                                    </center>
                                                    @endif
                                                    <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                @if ($data_profil->count())
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fa fa-edit"></i> Simpan
                                                </button>
                                                @else
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-plus"></i> Tambah
                                                </button>
                                                @endif
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-refresh"></i> Batal
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <div class="row">
                                @if ($data_alamat->count())
                                @foreach ($data_alamat as $alamat)
                                <form action="{{ url('/page/admin/alamat/'.$alamat->id) }}" method="POST" id="formAlamat">
                                    @method("PUT")
                                    @endforeach
                                    @else
                                    <form action="{{ url('/page/admin/alamat') }}" method="POST" id="formAlamat">
                                        @endif
                                        @csrf
                                        <div class="col-md-4">
                                            <div class="box">
                                                <div class="box-header">
                                                    <h3 class="box-title">
                                                        @if ($data_alamat->count())
                                                        <i class="fa fa-pencil"></i> Edit Data Alamat
                                                        @else
                                                        <i class="fa fa-plus"></i> Tambah Data Alamat
                                                        @endif
                                                    </h3>
                                                </div>
                                                <div class="box-body">
                                                    @if ($data_alamat->count())
                                                    @foreach ($data_alamat as $alamat)
                                                    <div class="form-group">
                                                        <label for="website"> Website </label>
                                                        <input type="text" class="form-control" name="website" id="website" placeholder="Masukkan Nama Website" value="{{ $alamat->website }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_telepon"> No. Telepon </label>
                                                        <input type="text" class="form-control" name="no_telepon" placeholder="0" value="{{ $alamat->no_telepon }}">
                                                    </div>
                                                    @endforeach
                                                    @else
                                                    <div class="form-group">
                                                        <label for="website"> Website </label>
                                                        <input type="text" class="form-control" name="website" id="website" placeholder="Masukkan Nama Website">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_telepon"> No. Telepon </label>
                                                        <input type="text" class="form-control" name="no_telepon" placeholder="0">
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="box">
                                                <div class="box-header">
                                                    <h3 class="box-title">
                                                        <i class="fa fa-map"></i> Alamat
                                                    </h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="alamat"> Alamat </label>
                                                        @if ($data_alamat->count())
                                                        @foreach ($data_alamat as $alamat)
                                                        <textarea name="alamat" id="alamat" cols="80" rows="10">
                                                            {{ $alamat->alamat }}
                                                        </textarea>
                                                        @endforeach
                                                        @else
                                                        <textarea name="alamat" id="alamat" cols="80" rows="10">
                                                            Alamat
                                                        </textarea>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    @if ($data_alamat->count())
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="fa fa-edit"></i> Simpan
                                                    </button>
                                                    @else
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-plus"></i> Tambah
                                                    </button>
                                                    @endif
                                                    <button type="reset" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-refresh"></i> Batal
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Tambah Data -->
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">
                                        <i class="fa fa-plus"></i> Tambah Data
                                    </h4>
                                </div>
                                <form action="{{ url('/page/admin/wilayah_geografis/') }}" method="POST" id="tambahWilayah">
                                    @csrf
                                    @foreach ($data_geografis as $geografis)
                                    <input type="hidden" name="geografis_id" value="{{ $geografis->id }}">
                                    @endforeach
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="batas"> Batas </label>
                                            <input type="text" class="form-control" name="batas" id="batas" placeholder="Batas">
                                        </div>
                                        <div class="form-group">
                                            <label for="desa"> Desa </label>
                                            <input type="text" class="form-control" name="desa" id="desa" placeholder="Masukkan Nama Desa">
                                        </div>
                                        <div class="form-group">
                                            <label for="kecamatan"> Kecamatan </label>
                                            <input type="text" class="form-control" name="kecamatan" id="kecamatan">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                            <i class="fa fa-refresh"></i> Batal
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END -->

                    <!-- Tambah Data -->
                    <div class="modal fade" id="modal-default-edit">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">
                                        <i class="fa fa-pencil"></i> Edit Data
                                    </h4>
                                </div>
                                <form action="{{ url('/page/admin/wilayah_geografis/simpan') }}" method="POST" id="editWilayah">
                                    @method("PUT")
                                    @csrf
                                    @foreach ($data_geografis as $geografis)
                                    <input type="hidden" name="geografis_id" value="{{ $geografis->id }}">
                                    @endforeach
                                    <div class="modal-body" id="modal-content-edit">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                                            <i class="fa fa-refresh"></i> Batal
                                        </button>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-edit"></i> Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END -->

                    @endsection

                    @section('page_scripts')

                    <script src="{{ url('/backend/template') }}/bower_components/ckeditor/ckeditor.js"></script>

                    <script type="text/javascript">

                        $(function() {
                            CKEDITOR.replace('deskripsi'),
                            CKEDITOR.replace('deskripsi_geografis'),
                            CKEDITOR.replace('visi'),
                            CKEDITOR.replace('misi'),
                            CKEDITOR.replace('alamat')
                        })

                    </script>

                    <script type="text/javascript">

                        function previewImage()
                        {
                            const gambar = document.querySelector("#gambar");
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
