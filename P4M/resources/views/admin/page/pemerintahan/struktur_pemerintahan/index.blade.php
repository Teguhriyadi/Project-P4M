@extends('admin.layouts.main')

@section('title', 'Data Struktur Pemerintahan')

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

@if ($data_jabatan->count())
@if ($data_pegawai->count())
<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-plus"></i> Tambah Struktur Pemerintahan
                    </h3>
                </div>
                <form id="tambahStruktur" action="{{ url('/page/admin/pemerintahan/struktur_pemerintahan') }}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="jabatan_id"> Jabatan </label>
                            <select name="jabatan_id" id="jabatan_id" class="form-control select2" style="width: 100%">
                                <option value="" selected>- Pilih -</option>
                                @foreach ($data_jabatan as $data)
                                @php
                                $cek_jabatan = App\Models\Model\StrukturPemerintahan::where('jabatan_id', $data->id)->first();
                                @endphp
                                @if (!$cek_jabatan)
                                <option value="{{ $data->id }}">
                                    {{ $data->nama_jabatan }}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pegawai_id"> Pegawai </label>
                            <select name="pegawai_id" id="pegawai_id" class="form-control select2" style="width: 100%;">
                                <option value="" selected>- Pilih -</option>
                                {{-- @foreach ($data_pegawai as $pegawai)
                                    @php
                                    $cek_pegawai = App\Models\Model\StrukturPemerintahan::where('pegawai_id', $pegawai->id)->first();
                                    @endphp
                                    @if (!$cek_pegawai)
                                    <option value="{{ $pegawai->id }}">
                                        {{ $pegawai->nama }}
                                    </option>
                                    @endif
                                    @endforeach --}}
                                    @foreach ($data_pegawai as $pegawai)
                                    @if (empty($pegawai->id_penduduk))
                                    <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                                    @else
                                    <option value="{{ $pegawai->id }}">{{ $penduduk->nama }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="staf_id"> Turunan </label>
                                <select name="staf_id" id="staf_id" class="form-control select2" style="width: 100%">
                                    <option value="" selected>- Pilih -</option>
                                    @foreach ($data_jabatan as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->nama_jabatan }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-social btn-primary btn-flat btn-sm" title="Tambah Data">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                            <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-sign-out"></i> Struktur Pemerintahan
                        </h3>
                        <div class="pull-right">
                            <a href="{{ url('/page/admin/pemerintahan/struktur_pemerintahan/show') }}" class="btn btn-social btn-default btn-flat btn-sm" title="Lihat Struktur">
                                <i class="fa fa-search"></i> Lihat Struktur Pemerintahan
                            </a>
                            <a href="{{ url('/page/admin/pemerintahan/struktur-organisasi') }}" target="_blank" class="btn btn-social btn-info btn-flat btn-sm pull-right" style="margin-left: 5px" title="Lihat">
                                <i class="fa fa-eye"></i> Preview
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Jabatan</th>
                                        <th>Pegawai</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_struktur as $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $data->getJabatan->nama_jabatan }}</td>
                                        <td>{{ $data->getPegawai->nama }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/page/admin/pemerintahan/struktur_pemerintahan/'.$data->id) }}/edit" class="btn btn-warning btn-sm" title="Ubah data">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ url('/page/admin/pemerintahan/struktur_pemerintahan/'.$data->id) }}" method="POST" style="display: inline;">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Data">
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
    </section>
    @else
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <i class="fa fa-bullhorn"></i>
                        <h3 class="box-title">Perhatian</h3>
                    </div>
                    <div class="box-body">
                        <div class="callout callout-danger">
                            <h4>Tidak Bisa Menginputkan Data</h4>

                            <p>
                                Karena <b> Data Pegawai </b> Masih Kosong. <a href="{{ url('/page/admin/pemerintahan/pegawai') }}">Silahkan Inputkan Data Pegawai Terlebih Dahulu</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @else
    @if ($data_pegawai->count())
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <i class="fa fa-bullhorn"></i>
                        <h3 class="box-title">Perhatian</h3>
                    </div>
                    <div class="box-body">
                        <div class="callout callout-danger">
                            <h4>Tidak Bisa Menginputkan Data</h4>

                            <p>
                                Karena <b> Data Jabatan </b> Masih Kosong. <a href="{{ url('/page/admin/pemerintahan/jabatan') }}">Silahkan Inputkan Data Jabatan Terlebih Dahulu</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <i class="fa fa-bullhorn"></i>
                        <h3 class="box-title">Perhatian</h3>
                    </div>
                    <div class="box-body">
                        <div class="callout callout-danger">
                            <h4>Tidak Bisa Menginputkan Data</h4>

                            <p>
                                Karena <b> Data Jabatan </b> Masih Kosong. <a href="{{ url('/page/admin/pemerintahan/jabatan') }}">Silahkan Inputkan Data Jabatan Terlebih Dahulu</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @endif

    @endsection

    @section('page_scripts')
    <script>
        (function($,W,D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL =
            {
                setupFormValidation: function()
                {
                    $("#tambahStruktur").validate({
                        ignore: "",
                        rules: {
                            jabatan_id: {
                                required: true
                            },
                            pegawai_id: {
                                required: true
                            },
                        },

                        messages: {
                            jabatan_id: {
                                required: "Jabatan harap di isi!"
                            },
                            pegawai_id: {
                                required: "Pegawai harap di isi!"
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
