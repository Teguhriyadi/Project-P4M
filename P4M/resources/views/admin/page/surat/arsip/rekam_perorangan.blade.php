@extends('admin.layouts.main')

@section('title', 'Rekam Surat Perorangan')

@section('page_content')

@php
    use App\Models\Model\LogSurat;
@endphp

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/page/admin') }}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <a href="{{ url('/page/admin/surat/arsip') }}" class="btn btn-social btn-info btn-flat btn-sm" title="Kembali ke Arsip Layanan Surat">
                        <i class="fa fa-arrow-left"></i> Kembali ke Arsip Layanan Surat
                    </a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
                                <form id="main" name="main" method="POST">
                                    @method("PUT")
                                    @csrf
                                    <tr>
                                        <td style="padding-top: 10px; padding-bottom: 10px; width: 15%"> Nama Penduduk </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="col-sm-6 col-lg-6">
                                                    <select name="id_penduduk" id="id_penduduk" class="form-control input-sm select2" id="nik" name="nik" onchange="formAction('main')">
                                                        <option value="">- Pilih -</option>
                                                        @foreach ($data_penduduk as $data)
                                                            @php
                                                                $data_log_surat = LogSurat::where("id_penduduk", $data->id)
                                                                ->first();
                                                            @endphp

                                                            @if ($data_log_surat)
                                                                @if (empty($detail))
                                                                <option value="{{ $data->id }}">
                                                                    NIK : {{ $data->nik }} - {{ $data->nama }}
                                                                </option>
                                                                @else
                                                                    @if ($data->id == $detail->id_penduduk)
                                                                    <option value="{{ $data->id }}" selected>
                                                                        NIK : {{ $data->nik }} - {{ $data->nama }}
                                                                    </option>
                                                                    @else
                                                                    <option value="{{ $data->id }}">
                                                                        NIK : {{ $data->nik }} - {{ $data->nama }}
                                                                    </option>
                                                                    @endif
                                                                @endif
                                                            @endif

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @if (empty($detail))

                                    @else
                                    <tr>
                                        <td style="width: 20%"> Tempat / Tanggal Lahir</td>
                                        <td>
                                            {{ $detail->getPenduduk->tempat_lahir }}
                                            / {{ $detail->getPenduduk->tgl_lahir }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Alamat </td>
                                        <td>{{ $detail->getPenduduk->alamat_sekarang }}</td>
                                    </tr>
                                    <tr>
                                        <td> Pendidikan </td>
                                        <td>{{ $detail->getPenduduk->getPekerjaan->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Warganegara / Agama</td>
                                        <td>
                                            {{ $detail->getPenduduk->getWarganegara->nama }}
                                            / {{ $detail->getPenduduk->getAgama->nama }}
                                        </td>
                                    </tr>
                                    @endif
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover" width="100%">
                            <thead class="bg-gray">
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Aksi</th>
                                    <th>Kode Surat</th>
                                    <th>No Urut</th>
                                    <th>Jenis Surat</th>
                                    <th>Nama Penduduk</th>
                                    <th>Ditandatangani Oleh</th>
                                    <th class="text-center">Tanggal</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($detail))

                                @else
                                @php
                                    $ambilData = LogSurat::where("id_penduduk", $id)->get();
                                @endphp
                                @foreach ($ambilData as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">
                                        <button onclick="ubahData({{ $data->id }})" type="button" data-toggle="modal" data-target="#ubah-data" class="btn btn-warning btn-sm" title="Ubah Data">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <form action="{{ url('/page/admin/surat/arsip/'.$data->id) }}" method="POST" style="display: inline">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus Data">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{ $data->getSuratFormat->kode_surat }}</td>
                                    <td>{{ $data->no_surat }}</td>
                                    <td>{{ $data->getSuratFormat->getKlasifikasi->nama }}</td>
                                    <td>{{ $data->getPenduduk->nama }}</td>
                                    <td>{{ $data->getPegawai->nama }}</td>
                                    <td class="text-center">{{ $data->tanggal }}</td>
                                    <td>{{ $data->getUser->name }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ubah Data -->
<div class="modal fade" id="ubah-data">
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
            <form action="{{ url('/page/admin/surat/arsip/ubah_data') }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm pull-left" title="Reset" data-dismiss="modal">
                        <i class="fa fa-refresh"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-success btn-flat btn-sm" title="Simpan Data">
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
    function formAction(idForm, action, target = '')
    {
        if (target != '')
        {
            $('#'+idForm).attr('target', target);
        }
        $('#'+idForm).attr('action', action);
        console.log();
        $('#'+idForm).submit();
    }

    function ubahData(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/surat/arsip/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }
</script>

@endsection
