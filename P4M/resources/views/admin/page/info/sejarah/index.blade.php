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
                        <div class="box-body box-profile">
                            @if ($sejarah)
                            <img class="penduduk profile-user-img img-responsive img-preview" style="border-radius: 50%; width: 200px; height: 200px; margin-bottom: 15px" src="{{ url('/storage/'.$sejarah->gambar) }}" alt="Foto Penduduk">
                            @else
                            <img class="penduduk profile-user-img img-responsive img-preview" style="border-radius: 50%; width: 200px; height: 200px; margin-bottom: 15px" src="{{ url('/gambar/upload.png') }}" alt="Foto Penduduk">
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

    </script>

    @endsection
