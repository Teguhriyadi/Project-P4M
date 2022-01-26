@extends('admin.layouts.main')

@section('title', 'Program Bantuan '.$detail->nama)

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/page/admin') }}"><i class="fa fa-home"></i> Home </a></li>
        <li><a href="{{ url('/page/admin/program_bantuan') }}">Daftar Program Bantuan</a></li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    @if ($detail->tanggal_berakhir > now())
                    <a href="{{ url('/page/admin/program_bantuan/'.$detail->id.'/tambah_peserta') }}" class="btn btn-social btn-primary btn-flat btn-sm" title="Tambah Peserta Baru">
                        <i class="fa fa-plus"></i> Tambah Peserta Baru
                    </a>
                    @else

                    @endif
                    <a href="" class="btn btn-social bg-purple btn-flat btn-sm" title="Cetak Data">
                        <i class="fa fa-upload"></i> Cetak
                    </a>
                    <a href="{{ url('/page/admin/program_bantuan') }}" class="btn btn-social btn-info btn-flat btn-sm" title="Kembali Ke Daftar Program Bantuan">
                        <i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Program Bantuan
                    </a>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>
                                <b>Rincian Program</b>
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="20%">Nama Program</td>
                                            <td width="1%">:</td>
                                            <td>
                                                {{ $detail->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sasaran Peserta</td>
                                            <td>:</td>
                                            <td>
                                                @if ($detail->sasaran == 1)
                                                Penduduk Perorangan
                                                @elseif ($detail->sasaran == 2)
                                                Keluarga - KK
                                                @elseif ($detail->sasaran == 3)
                                                Rumah Tangga
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Masa Berlaku</td>
                                            <td>:</td>
                                            <td>
                                                {{ $detail->tanggal_mulai }} - {{ $detail->tanggal_berakhir }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>
                                                {{ $detail->deskripsi }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <h5>
                                        <b>Daftar Peserta</b>
                                    </h5>
                                </div>
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" width="100%">
                                            <thead class="bg-gray">
                                                <tr>
                                                    <th rowspan="2" width="1%">No.</th>
                                                    <th rowspan="2">Aksi</th>
                                                    <th rowspan="2">NIK</th>
                                                    <th rowspan="2">No. KK</th>
                                                    <th rowspan="2">Nama Penduduk</th>
                                                    <th colspan="7" class="text-center">Identitas Di Kartu Peserta</th>
                                                </tr>
                                                <tr>
                                                    <th>No.Kartu Peserta</th>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Alamat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($daftar_peserta as $data)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                                    <td class="text-center">
                                                        <button onclick="editDataPeserta({{$data->id}})" type="button" data-toggle="modal" data-target="#ubahData" class="btn btn-warning btn-flat btn-sm" title="Ubah Data">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <form action="{{ url('/page/admin/program_bantuan/'.$data->id.'/rincian/hapus_data_peserta') }}" method="POST" style="display: inline">
                                                            @method("DELETE")
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-flat btn-sm" title="Hapus Data">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('/page/admin/program_bantuan/'.$detail->id.'/profil/'.$data->kartu_nik) }}">
                                                            {{ $data->kartu_nik }}
                                                        </a>
                                                    </td>
                                                    <td></td>
                                                    <td>{{ $data->kartu_nama }}</td>
                                                    <td class="text-center">{{ $data->no_id_kartu }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Edit Data -->
<div class="modal fade" id="ubahData">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i> Edit Data Peserta
                </h4>
            </div>
            <form action="{{ url('/page/admin/program_bantuan/simpan_data_peserta') }}" method="POST" class="form-horizontal">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm pull-left" title="Reset" data-dismiss="modal">
	                    <i class="fa fa-refresh"></i> Reset
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

@endsection

@section('page_scripts')

<script type="text/javascript">

    function editDataPeserta(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/program_bantuan/edit_data_peserta') }}",
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
