@extends('admin.layouts.main')

@section('title', 'Data Arsip Layanan Surat')

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
                    <a href="{{ url('/page/admin/surat/arsip/perorangan') }}" class="btn btn-social btn-success btn-flat btn-sm" title="Rekam Surat Perorangan">
                        <i class="fa fa-archive"></i> Rekam Surat Perorangan
                    </a>
                    <a href="" class="btn btn-social btn-warning btn-flat btn-sm" title="Pie Surat Keluar">
                        <i class="fa fa-pie-chart"></i> Pie Chart
                    </a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Aksi</th>
                                    <th>Kode Surat</th>
                                    <th>No. Urut</th>
                                    <th>Jenis Surat</th>
                                    <th>Nama Penduduk</th>
                                    <th>Ditandatangani Oleh</th>
                                    <th class="text-center">Tanggal</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_arsip as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">
                                        <button onclick="ubahData({{ $data->id }})" type="button" data-toggle="modal" data-target="#ubah-data" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        @if ($data->getPenduduk != NULL)
                                        <a href="https://api.whatsapp.com/send?phone={{ $data->getPenduduk->telepon }}&text=Test%20With%20API%20WhatsApp" target="_blank" class="btn btn-success btn-sm">
                                            <i class="fa fa-whatsapp"></i>
                                        </a>
                                        @endif
                                        <a href="{{ url('arsip/'.$data->getPenduduk->nama.' - '.$data->getPenduduk->nik.'.docx') }}" target="_blank" class="btn btn-sm bg-purple"><i class="fa fa-file-word-o"></i></a>
                                        <form action="{{ url('/page/admin/surat/arsip/'.$data->id) }}" method="POST" style="display: inline">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{ $data->getSuratFormat->kode_surat }}</td>
                                    <td>{{ $data->no_surat }}</td>
                                    <td>{{ $data->getSuratFormat->getKlasifikasi->nama }}</td>
                                    <td>{{ $data->getPenduduk->nama }}</td>
                                    @if (empty($data->getPegawai->getPenduduk->nama))
                                    <td>{{ $data->getPegawai->nama }}</td>
                                    @else
                                    <td>{{ $data->getPegawai->getPenduduk->nama }}</td>
                                    @endif
                                    <td class="text-center">{{ $data->tanggal }}</td>
                                    <td>{{ $data->getUser->name }}</td>
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

<script type="text/javascript">
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
