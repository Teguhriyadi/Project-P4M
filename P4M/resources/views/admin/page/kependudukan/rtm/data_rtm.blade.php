@extends('admin.layouts.main')

@section('title', 'Keluarga')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
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
                    <a type="button" data-toggle="modal" data-target="#modalBox" class="btn btn-social btn-success btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah Rumah Tangga
                    </a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Aksi</th>
                                    <th class="text-center">Foto</th>
                                    <th>Nomor Rumah Tangga</th>
                                    <th>Kepala Rumah Tangga</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Jumlah Anggota</th>
                                    <th class="text-center">Tanggal Terdaftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    use App\Models\Model\Penduduk;
                                    $getPenduduk = Penduduk::where("rtm_level", "!=", 2)
                                            ->get();
                                @endphp
                                @foreach ($getPenduduk as $penduduk)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/kependudukan/rtm/'.$penduduk->id.'/rincian_rtm') }}" class="btn bg-purple btn-flat btn-sm">
                                            <i class="fa fa-list-ol"></i>
                                        </a>
                                        <a type="button" data-toggle="modal" data-target="#modal-default-tambah" class="btn btn-success btn-flat btn-sm" title="Tambah Anggota Rumah Tangga">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a type="button" data-toggle="modal" data-target="#modal-default-ubah" class="btn btn-warning btn-flat btn-sm" title="Ubah Data">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-flat btn-sm" title="Hapus Data">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ url('/gambar/gambar_kepala_user.png') }}" width="50" >
                                    </td>
                                    <td>{{ $penduduk->id_rtm }}</td>
                                    <td></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
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

<!-- Tambah Rumah Tangga -->
<div class="modal fade" id="modalBox">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-plus"></i> Tambah Data Rumah Tangga Per Penduduk
                </h4>
            </div>
            <form action="{{ url('/page/admin/kependudukan/rtm/') }}" method="POST">
                @csrf
                <div class="modal-body" id="isian-modal">
                    <div class="form-group">
                        <label for="nik_kepala"> Kepala Rumah Tangga </label>
                        <select name="nik_kepala" id="nik_kepala" class="form-control input-sm select2" style="width: 100%">
                            <option value="">- Pilih -</option>
                            @php
                                $getDataPenduduk = DB::table("tb_penduduk")
                                                ->where("id_rtm", NULL)
                                                ->get();
                            @endphp
                            @foreach ($getDataPenduduk as $penduduk)
                            <option value="{{ $penduduk->id }}">
                                NIK : {{ $penduduk->nik }} - {{ $penduduk->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea cols="5" rows="3" class="form-control input-sm" disabled>Silakan cari nama / NIK dari data penduduk yang sudah terinput. Penduduk yang dipilih otomatis berstatus sebagai Kepala Rumah Tangga baru tersebut.
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-flat btn-sm pull-left">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Tambah -->
<div class="modal fade" id="modal-default-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-flat btn-sm pull-left">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- Ubah -->

<!-- END -->

@endsection

@section('page_scripts')

<script type="text/javascript">
    function tambahRumahTangga(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/kependudukan/keluarga/form_tambah_data_anggota_keluarga') }}",
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
