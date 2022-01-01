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
                        <a href="#tab_2" data-toggle="tab">Letak Geografis Desa</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
                            @if ($data_profil->count())
                            @foreach ($data_profil as $profil)
                            <form action="{{ url('/page/admin/profil') }}/{{ $profil->id }}" method="POST" enctype="multipart/form-data">
                                @method("PUT")
                                @endforeach
                                @else
                                <form action="{{ url('/page/admin/profil') }}" method="POST" enctype="multipart/form-data">
                                    @endif
                                    @csrf
                                    <div class="col-md-8">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">
                                                    @if ($data_profil->count())
                                                    <i class="fa fa-edit"></i> Edit Profil Desa
                                                    @else
                                                    <i class="fa fa-plus"></i> Tambah Profil Desa
                                                    @endif
                                                </h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="deskripsi"> Deskripsi </label>
                                                    @if ($data_profil->count())
                                                    @foreach ($data_profil as $profil)
                                                    <textarea name="deskripsi" id="deskripsi" cols="80" rows="10">
                                                        {{ $profil->deskripsi }}
                                                    </textarea>
                                                    @endforeach
                                                    @else
                                                    <textarea name="deskripsi" id="deskripsi" cols="80" rows="10">
                                                        Silahkan Isi Profil Desa
                                                    </textarea>
                                                    @endif
                                                </div>
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
                                                    @if ($profil->gambar)
                                                    <img class="gambar-preview" style="width: 300px; margin-bottom: 5px;" src="{{ url('/storage/'.$profil->gambar) }}">
                                                    @else
                                                    <img class="gambar-preview" style="width: 300px;">
                                                    @endif
                                                    @endforeach
                                                    @else
                                                    <img class="gambar-preview" style="width: 300px;">
                                                    @endif
                                                    <input onchange="previewImage()" type="file" class="form-control" id="gambar" name="gambar">
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
                                <div class="col-md-6">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">
                                                @if ($data_geografis->count())
                                                <i class="fa fa-edit"></i> Edit Profil Geografis
                                                @else
                                                <i class="fa fa-plus"></i> Tambah Profil Geografis
                                                @endif
                                            </h3>
                                        </div>
                                        @if ($data_geografis->count())
                                        @foreach ($data_geografis as $geografis)
                                        <form action="{{ url('/page/admin/geografis/'.$geografis->id) }}" method="POST">
                                            @method("PUT")
                                            @endforeach
                                            @else
                                            <form action="{{ url('/page/admin/geografis') }}" method="POST">
                                                @endif
                                                @csrf
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="deskripsi"> Deskripsi </label>
                                                        @if ($data_geografis->count())
                                                        @foreach ($data_geografis as $geografis)
                                                        <textarea name="deskripsi_geografis" id="deskripsi_geografis" cols="80" rows="10">
                                                            {{ $geografis->deskripsi }}
                                                        </textarea>
                                                        @endforeach
                                                        @else
                                                        <textarea name="deskripsi_geografis" id="deskripsi_geografis" cols="80" rows="10">
                                                            Deskripsi
                                                        </textarea>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    @if ($data_geografis->count())
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
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">
                                                    <i class="fa fa-map-marker"></i> Wilayah Geografis
                                                </h3>
                                                <div class="pull-right">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                                                        <i class="fa fa-plus"></i> Tambah
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <div class="table-responsive">
                                                    <table id="example1" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Batas</th>
                                                                <th>Desa</th>
                                                                <th>Kecamatan</th>
                                                                <th class="text-center">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data_wilayah as $wilayah)
                                                                <tr>
                                                                   <td>{{ $wilayah->batas }}</td>
                                                                   <td>{{ $wilayah->desa }}</td>
                                                                   <td>{{ $wilayah->kecamatan }}</td>
                                                                   <td class="text-center">
                                                                        <button onclick="editWilayah({{$wilayah->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>
                                                                       <form action="{{ url('/page/admin/wilayah_geografis/'.$wilayah->id) }}" method="POST" style="display: inline;">
                                                                            @method("DELETE")
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                                <i class="fa fa-trash-o"></i>
                                                                            </button>
                                                                       </form>
                                                                   </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <form action="{{ url('/page/admin/wilayah_geografis/') }}" method="POST">
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
                    <form action="{{ url('/page/admin/wilayah_geografis/simpan') }}" method="POST">
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
                CKEDITOR.replace('deskripsi_geografis')
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

            function editWilayah(id)
            {
                $.ajax({
                    url : "{{ url('/page/admin/wilayah_geografis/edit') }}",
                    type : "GET",
                    data : { id : id },
                    success : function(data) {
                        $("#modal-content-edit").html(data);
                        return true;
                    }
                })
            }

        </script>

        @endsection
