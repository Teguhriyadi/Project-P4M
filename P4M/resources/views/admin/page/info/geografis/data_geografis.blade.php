@extends('admin.layouts.main')

@section('title', 'Data Letak Geografis')

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
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        @if (empty($data_geografis))
                        <i class="fa fa-plus"></i> Tambah @yield('title')
                        @else
                        <i class="fa fa-edit"></i> Edit @yield('title')
                        @endif
                    </h3>
                    <a href="{{ url('/profil/wilayah-desa') }}" target="_blank" class="btn btn-social btn-info btn-flat btn-sm pull-right" title="Lihat">
                        <i class="fa fa-eye"></i> Preview
                    </a>
                </div>
                @if (empty($data_geografis))
                <form action="{{ url('/page/admin/info/geografis') }}" method="POST">
                    @else
                    <form action="{{ url('/page/admin/info/geografis/'.$data_geografis->id) }}" method="POST">
                        @method("PUT")
                        @endif
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="deskripsi"> Deskripsi Geografis </label>
                                @if (empty($data_geografis))
                                <textarea name="deskripsi" id="deskripsi" cols="80" rows="10">
                                    Deskripsi Geografis
                                </textarea>
                                @else
                                <textarea name="deskripsi" id="deskripsi" cols="80" rows="10">
                                    {{ $data_geografis->deskripsi }}
                                </textarea>
                                @endif
                            </div>
                        </div>
                        <div class="box-footer">
                            @if (empty($data_geografis))
                            <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm" title="Tambah Data">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                            @else
                            <button type="submit" class="btn btn-social btn-success btn-flat btn-sm" title="Simpan Data">
                                <i class="fa fa-edit"></i> Simpan
                            </button>
                            @endif
                            <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @endsection

    @section('page_scripts')

    <script src="{{ url('/backend/template') }}/bower_components/ckeditor/ckeditor.js"></script>

    <script type="text/javascript">

        (function($,W,D){var JQUERY4U={};JQUERY4U.UTIL={setupFormValidation:function(){$("#formVisiMisi").validate({ignore:"",rules:{deskripsi:{required:!0},},messages:{deskripsi:{required:"Deskripsi harap di isi!"},},submitHandler:function(form){form.submit()}})}}
        $(D).ready(function($){JQUERY4U.UTIL.setupFormValidation()})})(jQuery,window,document)

        $(function() {
            CKEDITOR.replace('deskripsi')
        })

    </script>

    <script type="text/javascript">
        function editWilayah(id)
        {
            $.ajax({
                url : "{{ url('/page/admin/geografis/edit') }}",
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
