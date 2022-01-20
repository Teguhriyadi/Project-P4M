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
                    <div class="btn-group btn-group-vertical">
                        <a class="btn btn-social btn-flat btn-primary btn-sm" data-toggle="dropdown">
                            <i class="fa fa-plus"></i> Tambah KK Baru
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/page/admin/kependudukan/keluarga/form_tambah_penduduk_masuk') }}" class="btn btn-social btn-flat btn-block btn-sm" title="Tambah Data Penduduk Masuk"><i class="fa fa-plus"></i> Tambah Penduduk Masuk</a>
                            </li>
                            <li>
                                <a class="btn btn-social btn-flat btn-block btn-sm" data-toggle="modal" data-target="#modal-default-penduduk">
                                    <i class="fa fa-plus"></i> Dari Penduduk Sudah Ada
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Nomor KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Jumlah Anggota</th>
                                    <th class="text-center">Tanggal Terdaftar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_keluarga as $keluarga)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">
                                        @if ($keluarga->foto == NULL)
                                        <img src="{{ url('/gambar/gambar_kepala_user.png') }}" width="50">
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $keluarga->no_kk }}</td>
                                    <td>{{ $keluarga->getDataPenduduk->nama }}</td>
                                    <td class="text-center">{{ $keluarga->getDataPenduduk->nik }}</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">{{ $keluarga->tgl_daftar }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/page/admin/kependudukan/keluarga/'.$keluarga->id) }}/rincian_keluarga" class="btn bg-purple btn-flat btn-sm" title="Rincian Anggota Keluarga (KK)">
                                            <i class="fa fa-list-ol"></i>
                                        </a>
                                        <a class="btn btn-success btn-flat btn-sm" title="Tambah Anggota Keluarga" data-toggle="dropdown">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ url('/page/admin/kependudukan/'.$keluarga->id) }}/anggota_keluarga_lahir" class="btn btn-social btn-block btn-flat btn-sm" title="Anggota Keluarga Lahir">
                                                    <i class="fa fa-plus"></i> Anggota Keluarga Lahir
                                                </a>
                                                <a href="{{ url('/page/admin/kependudukan/'.$keluarga->id) }}/anggota_keluarga_masuk" class="btn btn-social btn-block btn-flat btn-sm" title="Anggota Keluarga Masuk">
                                                    <i class="fa fa-plus"></i> Anggota Keluarga Masuk
                                                </a>
                                            </li>
                                        </ul>
                                        <button onclick="editData({{ $keluarga->id }})" type="button" class="btn btn-warning btn-flat btn-sm" data-toggle="modal" data-target="#modal-default">
                                            <i class="fa fa-edit"></i>
                                        </button>
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
            <form action="{{ url('/page/admin/kependudukan/keluarga/tambah_kepala_keluarga') }}" method="POST">
                @csrf
                <div class="modal-body" id="modal-penduduk-keluarga">
                    <div class="form-group">
                        <label for="nik_kepala"> Nomor Kartu Keluarga (KK) </label>
                        <select name="nik_kepala" id="nik_kepala" class="form-control input-sm">
                            <option value="">- Pilih -</option>
                            @php
                                use App\Models\Model\Penduduk;
                                $data_penduduk = Penduduk::get()
                            @endphp

                            @foreach ($data_penduduk as $data)
                                @php
                                    $data_keluarga = DB::table("tb_keluarga")
                                                ->where("nik_kepala" , $data->id)
                                                ->first();
                                @endphp

                                @if (empty($data_keluarga))
                                    <option value="{{ $data->id }}">
                                        {{ $data->nama }}
                                    </option>
                                @endif

                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_kk"> Nomor Kartu Keluarga (KK) </label>
                        <input type="text" name="no_kk" id="no_kk" class="form-control input-sm" placeholder="Nomor KK">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left btn-flat btn-sm" data-dismiss="modal">
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
            <form action="" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat btn-sm" data-dismiss="modal">
                        <i class="fa fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-success btn-flat btn-sm">
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
</script>

@endsection
