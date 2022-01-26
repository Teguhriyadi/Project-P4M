@extends('pengunjung/layouts/main')

@section('title', 'Permohonan Surat')

@section('page_content')

<style>
    label.error {
        color: red;
    }
</style>

{!! session('message') ? session('message') : '' !!}

<div id="printableArea">

    <div class="single_page_area" style="margin-bottom:10px;">
        <h2 class="post_title" style="font-family: Oswald; margin-bottom: 3rem;">@yield('title')</h2>

        <h5 style="margin-bottom: 2rem">Silahkan lengkapi semua isian sesuai dengan data yang diperlukan</h5>

        <div class="alert alert-danger" style="text-align:center;">
            <b> Pastikan nama anda sudah terdaftar di kependudukan Desa Arahan Lor! </b>
            <br>
            <p>Silahkan lihat data anda pada link berikut ini <p><a href="/kependudukan"><u> Data kependudukan desa Arahan Lor </u></a></p>  </p> 
        </div>
        <form action="/surat" method="post" id="permohonanSurat">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telepon">No Telepon / WA</label>
                        <input type="text" class="form-control" name="telepon" id="telepon">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_surat">Pilih Jenis Surat</label>
                        <select name="id_surat" id="id_surat" class="form-control">
                            @foreach ($jenis_surat as $surat)
                            <option value="{{ $surat->id }}">{{ $surat->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kebutuhan">Kebutuhan</label>
                <textarea name="kebutuhan" id="kebutuhan" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-paper-plane"></i> Kirim</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('page_scripts')

<script>
    (function($, W, D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL = {
            setupFormValidation: function() {
                $("#permohonanSurat").validate({
                    ignore: "",
                    rules: {
                        nama: {
                            required: true
                        },
                        jenis_surat: {
                            required: true
                        },
                        kebutuhan: {
                            required: true
                        }
                    },
                    messages: {
                        nama: {
                            required: "Nama harap di isi!"
                        },
                        jenis_surat: {
                            required: "Jenis surat harap di isi!"
                        },
                        kebutuhan: {
                            required: "Kebutuhan harap di isi!"
                        },
                    },
                    submitHandler: function(form) {
                        form.submit()
                    }
                })
            }
        }
        $(D).ready(function($) {
            JQUERY4U.UTIL.setupFormValidation()
        })
    })(jQuery, window, document)
</script>
@endsection
