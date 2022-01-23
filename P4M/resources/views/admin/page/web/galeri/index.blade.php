@extends('admin.layouts.main')

@section('title', 'Data Galeri')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-image"></i> Image
                    </h3>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="galeriTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Judul Galeri</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_galeri as $galeri)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td class="text-center">{{ $galeri->judul }}</td>
                                <td class="text-center">
                                    <img src="{{ url('storage/'.$galeri->gambar) }}" alt="" width="100" height="70">
                                </td>
                                <td class="text-center">
                                    <button onclick="editDataGaleri({{$galeri->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <form action="{{ url('/page/admin/web/galeri/'.$galeri->id) }}" method="POST" style="display: inline;">
                                        @method("DELETE")
                                        @csrf
                                        <input type="hidden" name="gambar" value="{{ $galeri->gambar }}">
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
                    <i class="fa fa-plus"></i> Tambah @yield('title')
                </h4>
            </div>
            <form action="{{ url('/page/admin/web/galeri') }}" method="POST" enctype="multipart/form-data" id="formTambahGaleri">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul"> Judul </label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul">
                    </div>
                    <div class="form-group">
                        <label for="gambar"> Gambar </label>
                        <img class="gambar-preview img-fluid" width="300">
                        <br>
                        <input type="file" class="form-control" name="gambar" id="gambar" onchange="previewImage()">
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

<!-- Edit Data -->
<div class="modal fade" id="modal-default-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-pencil"></i> Edit @yield('title')
                </h4>
            </div>
            <form action="{{ url('/page/admin/web/galeri/simpan') }}" method="POST" enctype="multipart/form-data" id="formEditGaleri">
                @method("PUT")
                @csrf
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

    function editDataGaleri(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/web/galeri/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }

    $(function (){
        $('#galeriTable').DataTable({
            columnDefs: [
            { orderable: false, targets: [0,2,3] }
            ],
        })
    })

</script>

<script>
    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#formTambahGaleri").validate({
                    ignore: "",
                    rules: {
                        judul: {
                            required: true
                        },
                        gambar: {
                            required: true,
                            accept: "image/*"
                        }
                    },

                    messages: {
                        judul: {
                            required: "Judul harap di isi!"
                        },
                        gambar: {
                            required: "Gambar harap di isi!",
                            accept: "Tipe file harus gambar (jpg, png, jpeg)"
                        },
                    },

                    submitHandler: function(form) {
                        form.submit();
                    }
                });

                $("#formEditGaleri").validate({
                    ignore: "",
                    rules: {
                        judul: {
                            required: true
                        },
                        gambar: {
                            accept: "image/*"
                        }
                    },

                    messages: {
                        judul: {
                            required: "Judul harap di isi!"
                        },
                        gambar: {
                            accept: "Tipe file harus gambar (jpg, png, jpeg)"
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
