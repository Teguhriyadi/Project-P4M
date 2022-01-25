@extends('admin.layouts.main')

@section('title', 'Data Sejarah Desa')

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
    @if ($sejarah)
    <form action="{{ url('page/admin/info/sejarah-desa/'.$sejarah->id) }}" method="post" enctype="multipart/form-data" id="formEditSejarah">
        @method('patch')
        @else
        <form action="{{ url('page/admin/info/sejarah-desa') }}" method="post" enctype="multipart/form-data" id="formTambahSejarah">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">
                                <i class="fa fa-plus"></i> Tambah Sejarah Desa
                            </h3>
                            <a href="{{ url('/profil/sejarah-desa') }}" target="_blank" class="pull-right btn btn-social btn-info btn-flat btn-sm">
                                <i class="fa fa-eye"></i> Preview
                            </a>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="sejarah">Sejarah</label>
                                @if ($sejarah)
                                <textarea name="sejarah" id="sejarah" rows="10" class="form-control" placeholder="Masukkan Sejarah Desa">{{ $sejarah->sejarah }}</textarea>
                                @else
                                <textarea name="sejarah" id="sejarah" rows="10" class="form-control">Masukkan Sejarah Desa</textarea>
                                @endif
                            </div>
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
                            <label for="gambar" style="width: 100%"> Gambar </label>
                            @if ($sejarah)
                            <center><img src="/storage/{{ $sejarah->gambar }}" class="gambar-preview" style="width: 200px; margin-bottom: 20px;"></center>
                            <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                            @else
                            <center><img src="{{ url('/gambar/upload.png') }}" class="gambar-preview" style="width: 200px; margin-bottom: 20px;"></center>
                            <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                            @endif
                        </div>
                        <div class="box-footer">
                            @if ($sejarah)
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
                </div>
            </div>
        </form>
    </section>

    @endsection

    @section('page_scripts')

    <script src="{{ url('/backend/template') }}/bower_components/ckeditor/ckeditor.js"></script>

    <script type="text/javascript">

        $(function() {
            CKEDITOR.replace('sejarah')
        })

    </script>

    <script type="text/javascript">
        (function($,W,D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL =
            {
                setupFormValidation: function()
                {
                    $("#formTambahSejarah").validate({
                        ignore: "",
                        rules: {
                            sejarah: {
                                required: true
                            },
                            gambar: {
                                required: true,
                                accept: 'image/*'
                            }
                        },

                        messages: {
                            sejarah: {
                                required: "Sejarah harap di isi!"
                            },
                            gambar: {
                                required: "Gambar harap di isi!",
                                accept: 'Format harus gambar'
                            }
                        },

                        submitHandler: function(form) {
                            form.submit();
                        }
                    });
                    $("#formEditSejarah").validate({
                        ignore: "",
                        rules: {
                            sejarah: {
                                required: true
                            },
                            gambar: {
                                accept: 'image/*'
                            }
                        },

                        messages: {
                            sejarah: {
                                required: "Sejarah harap di isi!"
                            },
                            gambar: {
                                accept: 'Format harus gambar'
                            }
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
