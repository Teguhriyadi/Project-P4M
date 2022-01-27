@extends('admin.layouts.main')

@section('title', 'Daftar Anggota Rumah Tangga')

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
        <li>

        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-info">
                <div class="box-header">
                    <a onclick="tambahAnggotaRTM({{ $edit->id }})" type="button" data-toggle="modal" data-target="#modalBox" class="btn btn-social btn-success btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah Anggota
                    </a>
                    <a href="{{ url('/page/admin/kependudukan/rtm/kartu_rtm/'.$edit->id) }}" class="btn bg-purple btn-flat btn-sm">
                        <i class="fa fa-book"></i> Kartu Rumah Tangga
                    </a>
                    <a href="{{ url('/page/admin/kependudukan/rtm') }}" class="btn btn-info btn-flat btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali ke Daftar Rumah Tangga
                    </a>
                </div>
                <div class="box-body">
                    <h5>
                        <b>Rincian Keluarga</b>
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
                                <tr>
                                    <td width="20%">Nomor Rumah Tangga (RT)</td>
                                    <td width="1%">:</td>
                                    <td>
                                        {{ $edit->no_kk }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kepala Rumah Tangga</td>
                                    <td>:</td>
                                    <td>
                                        {{ $edit->getDataPenduduk->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>
                                        {{ $edit->getDataPenduduk->alamat }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Program Bantuan</td>
                                    <td>:</td>
                                    <td>
                                        @foreach ($program_bantuan as $program)
                                            {{ $program->nama }}
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-body">
                    <h5>
                        <b>Daftar Anggota</b>
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Aksi</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Hubungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                use App\Models\Model\Penduduk;

                                $getData = Penduduk::where("id_rtm", $edit->no_kk)->get();

                                @endphp
                                @foreach ($getData as $data)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">
                                        <button onclick="ubahHubungan({{ $data->id }})" data-toggle="modal" data-target="#ubahHubungan" class="btn btn-warning btn-sm" title="Ubah Hubungan Rumah Tangga">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <a href="" class="btn btn-danger btn-flat btn-sm">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                    <td>{{ $data->nik }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td class="text-center">{{ $data->getKelamin->nama }}</td>
                                    <td></td>
                                    <td>{{ $data->getHubunganRtm->nama }}</td>
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

<!-- Tambah Anggota -->
<div class="modal fade" id="modalBox">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-plus"></i> Tambah Anggota Rumah Tangga
                </h4>
            </div>
            <form action="{{ url('/page/admin/kependudukan/rtm/tambah_data_anggota') }}" method="POST">
                @csrf
                <div class="modal-body" id="isian-modal">

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger pull-left btn-flat btn-sm">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-flat btn-sm" title="Tambah Data">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Ubah Hubungan -->
<div class="modal fade" id="ubahHubungan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i> Ubah Hubungan Rumah Tangga
                </h4>
            </div>
            <form action="{{ url('/page/admin/kependudukan/rtm/ubah_hubungan') }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body" id="content-isi">

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-warning pull-left btn-flat btn-sm">
                        <i class="fa fa-refresh"></i> Batal
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
    function tambahAnggotaRTM(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/kependudukan/rtm/tambah_data_anggota_rtm') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#isian-modal").html(data);
                return true;
            }
        });
    }

    function ubahHubungan(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/kependudukan/rtm/ubah_hubungan_rumah_tangga') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#content-isi").html(data);
                return true;
            }
        });
    }
</script>

@endsection
