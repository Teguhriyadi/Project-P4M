@extends('admin.layouts.main')

@section('page_title', 'Dashboard')

@section('page_content')

<section class="content-header">
    <h1>
        Data Struktur Pemerintahan
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">Blank page</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab"> Sumber Daya Alam </a>
                    </li>
                    <li>
                        <a href="#tab_2" data-toggle="tab"> Sumber Daya Manusia </a>
                    </li>
                    <li>
                        <a href="#tab_3" data-toggle="tab"> Sumber Daya Kelembagaan </a>
                    </li>
                    <li>
                        <a href="#tab_4" data-toggle="tab"> Lain - Lain </a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Sumber Daya Kelembagaan <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">
                                    Kelembagaan dan Organisasi
                                </a>
                                <a role="menuitem" tabindex="-1" href="#">
                                    Sarana Pendidikan
                                </a>
                                <a role="menuitem" tabindex="-1" href="#">
                                    Sarana Keagamaan
                                </a>
                                <a role="menuitem" tabindex="-1" href="#">
                                    Sarana Tempat Usaha
                                </a>
                                <a role="menuitem" tabindex="-1" href="#">
                                    Sarana Olahraga
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pull-right">
                        <a href="#" class="text-muted">
                            <i class="fa fa-gear"></i>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            <i class="fa fa-plus"></i> Tambah Data SDA
                                        </h3>
                                    </div>
                                    <form action="{{ url('/page/admin/jenis_sda') }}" method="POST">
                                        @csrf
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="jenis"> Jenis </label>
                                                <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Masukkan Data Jenis">
                                            </div>
                                            <div class="form-group">
                                                <label for="luas"> Luas </label>
                                                <input type="text" class="form-control" name="luas" id="luas" placeholder="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="lokasi"> Lokasi </label>
                                                <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Masukkan Data Lokasi">
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus"></i> Tambah
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-refresh"></i> Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            <i class="fa fa-bars"></i> Sumber Daya Alam
                                        </h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No.</th>
                                                        <th>Jenis</th>
                                                        <th>Luas</th>
                                                        <th>Lokasi</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data_sda as $sda)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td>{{ $sda->jenis }}</td>
                                                        <td>{{ $sda->luas }}</td>
                                                        <td>{{ $sda->lokasi }}</td>
                                                        <td class="text-center">
                                                            <button onclick="editDataSDA({{$sda->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <form action="{{ url('/page/admin/jenis_sda/'.$sda->id) }}" method="POST" style="display: inline;">
                                                                @method("DELETE")
                                                                @csrf
                                                                <button onclick="return confirm('Yakin ?')" type="submit" class="btn btn-danger btn-sm">
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
                    </div>
                    <div class="tab-pane" id="tab_2">
                        Mohammad
                    </div>
                    <div class="tab-pane" id="tab_3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            <i class="fa fa-plus"></i> Tambah Data SDK
                                        </h3>
                                    </div>
                                    <form action="{{ url('/page/admin/jenis_sdk') }}" method="POST">
                                        @csrf
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="jenis_organisasi"> Jenis Organisasi </label>
                                                <input type="text" class="form-control" name="jenis_organisasi" id="jenis_organisasi" placeholder="Jenis Organisasi">
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah_anggota"> Jumlah Anggota </label>
                                                <input type="number" class="form-control" name="jumlah_anggota" id="jumlah_anggota" placeholder="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="lokasi"> Lokasi </label>
                                                <input type="text" class="form-control" name="lokasi_sdk" id="lokasi" placeholder="Masukkan Data Lokasi">
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus"></i> Tambah
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-refresh"></i> Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            <i class="fa fa-bars"></i> Sumber Daya Kelembagaan
                                        </h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="example3" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No.</th>
                                                        <th>Organisasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th>Lokasi</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data_sdk as $sdk)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}.</td>
                                                            <td>{{ $sdk->jenis_organisasi }}</td>
                                                            <td class="text-center">{{ $sdk->jumlah_anggota }}</td>
                                                            <td>{{ $sdk->lokasi }}</td>
                                                            <td class="text-center">
                                                                <button onclick="editDataSDK({{$sdk->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-sdk">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <form action="{{ url('/page/admin/jenis_sdk/'.$sdk->id) }}" method="POST" style="display: inline;">
                                                                    @method("DELETE")
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger btn-sm">
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
                    </div>
                    <div class="tab-pane" id="tab_4">
                        Riyadi
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SDA -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i> Edit Data SDA
                </h4>
            </div>
            <form action="{{ url('/page/admin/jenis_sda/simpan') }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                        <i class="fa fa-refresh"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<!-- SDK -->
<div class="modal fade" id="modal-default-sdk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i> Edit Data SDK
                </h4>
            </div>
            <form action="{{ url('/page/admin/jenis_sdk/simpan') }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit-sdk">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                        <i class="fa fa-refresh"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-success">
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

    function editDataSDA(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/jenis_sda/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        })
    }

    function editDataSDK(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/jenis_sdk/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit-sdk").html(data);
                return true;
            }
        })
    }

</script>

@endsection
