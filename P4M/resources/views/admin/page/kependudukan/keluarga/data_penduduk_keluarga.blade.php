@extends('admin.layouts.main')

@section('title', 'Data Keluarga')

@section('page_content')

<style>
    .table-min-height {
        min-height: 350px;
    }
</style>

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
                    <div class="btn-group btn-group-vertical">
                        <a class="btn btn-social btn-flat btn-primary btn-sm" data-toggle="dropdown">
                            <i class="fa fa-plus"></i> Tambah KK Baru
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/page/admin/kependudukan/keluarga/form_tambah_penduduk_masuk') }}" class="btn btn-social btn-flat btn-block btn-sm" title="Tambah Data Penduduk Masuk">
                                    <i class="fa fa-plus"></i> Tambah Penduduk Masuk
                                </a>
                            </li>
                            @if ($data_penduduk->count())
                            <li>
                                <a class="btn btn-social btn-flat btn-block btn-sm" data-toggle="modal" data-target="#modal-default-penduduk" title="Dari Data Penduduk">
                                    <i class="fa fa-plus"></i> Dari Penduduk Sudah Ada
                                </a>
                            </li>
                            @else

                            @endif
                        </ul>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Aksi</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Nomor KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Jumlah Anggota</th>
                                    <th class="text-center">Tanggal Terdaftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_keluarga as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/kependudukan/keluarga/'.$data->id) }}/rincian_keluarga" class="btn bg-purple btn-flat btn-sm" title="Rincian Anggota Keluarga (KK)" title="Rincian Data Keluarga">
                                            <i class="fa fa-list-ol"></i>
                                        </a>
                                        <div class="btn-group btn-group-vertical">
                                            <a class="btn btn-success btn-flat btn-sm " data-toggle="dropdown" title="Tambah Anggota Keluarga" ><i class="fa fa-plus"></i> </a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ url('/page/admin/kependudukan/keluarga/'.$data->id) }}/tambah_anggota_keluarga_lahir" class="btn btn-social btn-flat btn-block btn-sm" title="Anggota Keluarga Lahir">
                                                        <i class="fa fa-plus"></i> Anggota Keluarga Lahir
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/page/admin/kependudukan/keluarga/'.$data->id) }}/tambah_anggota_keluarga_masuk" class="btn btn-social btn-flat btn-block btn-sm" title="Anggota Keluarga Masuk">
                                                        <i class="fa fa-plus"></i> Anggota Keluarga Masuk
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <button onclick="editData({{ $data->id }})" type="button" class="btn btn-warning btn-flat btn-sm" data-toggle="modal" data-target="#modal-default">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        @if ($data->foto == NULL)
                                        <img src="{{ url('/gambar/gambar_kepala_user.png') }}" width="50">
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $data->no_kk }}</td>
                                    <td>{{ $data->getDataPenduduk->nama }}</td>
                                    <td class="text-center">{{ $data->getDataPenduduk->nik }}</td>
                                    <td class="text-center">
                                        @php
                                        echo $jumlahData = DB::table("tb_penduduk")
                                        ->where("id_kk", $data->id)
                                        ->count();
                                        @endphp
                                    </td>
                                    <td class="text-center">{{ $data->tgl_daftar }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dari Penduduk Sudah Ada -->
<div class="modal fade" id="modal-default-penduduk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-plus"></i> Tambah Data Kepala Keluarga
                </h4>
            </div>
            <form action="{{ url('/page/admin/kependudukan/keluarga/tambah_kepala_keluarga') }}" method="POST" id="formTambahKPendudukAda">
                @csrf
                <div class="modal-body" id="modal-penduduk-keluarga">
                    <div class="form-group">
                        <label for="nik_kepala"> Kepala Keluarga </label>
                        <select name="nik_kepala" id="nik_kepala" class="form-control input-sm select2" style="width: 100%">
                            <option value="">- Pilih -</option>

                            @foreach ($data_penduduk as $data)
                            <option value="{{ $data->id }}">
                                NIK : {{ $data->nik }} - {{ $data->nama }}
                            </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_kk"> Nomor Kartu Keluarga (KK) </label>
                        <input type="text" name="no_kk" id="no_kk" class="form-control input-sm" placeholder="Nomor KK">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-social btn-warning pull-left btn-flat btn-sm" title="Reset">
                        <i class="fa fa-refresh"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Edit Data -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i> Ubah Data
                </h4>
            </div>
            <form action="{{ url('/page/admin/kependudukan/keluarga/simpan_data_keluarga') }}" method="POST" id="formUbah">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-warning pull-left btn-flat btn-sm" title="Reset">
                        <i class="fa fa-refresh"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-success btn-flat btn-sm" title="Simpan">
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
    $('document').ready(function()
    {
        $('.table').on('show.bs.dropdown', function (e) {
            var table = $(this),
            menu = $(e.target).find('.dropdown-menu'),
            tableOffsetHeight = table.offset().top + table.height(),
            menuOffsetHeight = $(e.target).offset().top + $(e.target).outerHeight(true) + menu.outerHeight(true);

            if (menuOffsetHeight > tableOffsetHeight)
            {
                table.css("padding-bottom", menuOffsetHeight - tableOffsetHeight);
                $('.table')[0].scrollIntoView(false);
            }

        });

        $('.table').on('hide.bs.dropdown', function () {
            $(this).css("padding-bottom", 0);
        })
    });

    function editData(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/kependudukan/keluarga/form_edit_data_penduduk_masuk') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }

    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#formTambahKPendudukAda").validate({
                    ignore: "",
                    rules: {
                        nik_kepala: {
                            required: true
                        },
                        no_kk: {
                            required: true,
                            number: true,
                            minlength: 16,
                            maxlength: 16,
                        },
                    },

                    messages: {
                        nik_kepala: {
                            required: "Kepala keluarga harap di isi!"
                        },
                        no_kk: {
                            required: "No kartu keluarga harap di isi!",
                            number: "Harap masukan angka!",
                            minlength: "Panjang minimal no KK 16!",
                            maxlength: "Panjang maksimal no KK 16!",
                        },
                    },

                    submitHandler: function(form) {
                        form.submit();
                    }
                });
                $("#formUbah").validate({
                    ignore: "",
                    rules: {
                        no_kk: {
                            required: true
                        },
                        alamat: {
                            required: true
                        },
                        dusun: {
                            required: true
                        },
                        rw: {
                            required: true
                        },
                        rt: {
                            required: true
                        },
                        tanggal_cetak: {
                            required: true
                        },
                        kelas_sosial: {
                            required: true
                        },
                    },

                    messages: {
                        no_kk: {
                            required: "No kartu keluarga harap di isi!"
                        },
                        alamat: {
                            required: "Alamat harap di isi!"
                        },
                        dusun: {
                            required: "Dusun harap di isi!"
                        },
                        rw: {
                            required: "RW harap di isi!"
                        },
                        rt: {
                            required: "RT harap di isi!"
                        },
                        tanggal_cetak: {
                            required: "Tanggal cetak harap di isi!"
                        },
                        kelas_sosial: {
                            required: "Kelas sosial harap di isi!"
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
