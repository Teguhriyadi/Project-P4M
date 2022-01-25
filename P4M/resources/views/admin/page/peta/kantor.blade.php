@extends('admin.layouts.main')

@section('title', "Peta Lokasi Kantor")

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
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">
                <i class="fa fa-minus"></i> Form Maps
            </h3>
            <a href="{{ url('/peta') }}" target="_blank" class="btn btn-social btn-info btn-flat btn-sm pull-right" style="margin-left: 5px" title="Lihat">
                <i class="fa fa-eye"></i> Preview
            </a>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ url('/page/admin/peta/kantor') }}" method="POST" id="formPeta">
                        @if ($kantor)
                        @method("put")
                        <input type="hidden" name="id" id="id" value="{{ $kantor->id }}">
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="url">Masukan Url</label>
                            @if (empty($kantor))
                            <textarea name="url" id="url" rows="8" class="form-control" placeholder="Silahkan Masukkan URL"></textarea>
                            @else
                            <textarea name="url" id="url" rows="8" class="form-control" placeholder="Silahkan Masukkan URL">{!! $kantor->lokasi_kantor !!}</textarea>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-social btn-success btn-flat btn-sm">
                                <i class="fa fa-edit"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm">
                                <i class="fa fa-refresh"></i> Batal
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4><b>Cara memasukan data</b></h4>
                    <p>Silahkan kunjungi link berikut <a href="https://www.google.com/maps/">Google Maps</a></p>
                    <p class="text-danger"><b>*Masukan iframe dari google maps seperti berikut :</b></p>
                    <img src="/frontend/img/step-maps.png" width="100%" height="">
                </div>
            </div>
        </div>
    </div>
    <div class="box box-info">
        <div class="box-header">
            <h3 class="title">
                <i class="fa fa-minus"></i> Hasil
            </h3>
        </div>
        <div class="box-body">
            @if (empty($kantor) || $kantor->lokasi_kantor == NULL)
            Harap isi url tersebut.
            @else
            {!! $kantor->lokasi_kantor !!}
            @endif
        </div>
    </div>
</section>

@endsection


@section('page_scripts')
<script>
    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#formPeta").validate({
                    ignore: "",
                    rules: {
                        url: {
                            required: true
                        },
                    },

                    messages: {
                        url: {
                            required: "URL harap di isi!"
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
