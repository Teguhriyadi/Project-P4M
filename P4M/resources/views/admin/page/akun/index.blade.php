@extends('admin.layouts.main')

@section('page_content')

<section class="content-header">
    <h1>
        Akun
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">Data Akun</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Data Akun
                    </h3>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Hak Akses</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_akun as $akun)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>{{ $akun->name }}</td>
                                    <td>{{ $akun->username }}</td>
                                    <td class="text-center">{{ $akun->email }}</td>
                                    <td class="text-center">{{ $akun->getHakAkses->nama_hak_akses }}</td>
                                    <td class="text-center">
                                        <button onclick="editDataAkun({{$akun->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default-edit">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        @if ($akun->username == auth()->user()->username)

                                        @else
                                        <form action="" method="POST" style="display: inline;">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                        @endif
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

<!-- Tambah Data -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-plus"></i> Tambah Data Akun
                </h4>
            </div>
            <form action="{{ url('/page/admin/akun') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name"> Name </label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username"> Username </label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email"> Email </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password"> Password </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="hak_akses"> Hak Akses </label>
                                <select name="hak_akses_id" class="form-control select2" id="hak_akses_id" style="width: 100%;">
                                    <option value="" selected>- Pilih -</option>
                                    @foreach ($data_hak_akses as $hak_akses)
                                    <option value="{{ $hak_akses->id }}">
                                        {{ $hak_akses->nama_hak_akses }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="gambar"> Gambar </label>
                                <img class="gambar-preview" style="width: 300px;">
                                <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                        <i class="fa fa-refresh"></i> Batal
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

<!-- Edit Data -->
<div class="modal fade" id="modal-default-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-plus"></i> Edit Data Akun
                </h4>
            </div>
            <form action="{{ url('/page/admin/akun') }}" method="POST">
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">
                        <i class="fa fa-refresh"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

<script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function() {
        fetch('/page/admin/kategori/checkSlug?nama=' + nama.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    })

</script>

@endsection

@section('page_scripts')

<script type="text/javascript">

    function editDataAkun(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/akun/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        })
    }

    function previewImage()
    {
        const gambar = document.querySelector("#gambar");
        const gambarPreview = document.querySelector(".gambar-preview");

        gambarPreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent) {
            gambarPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
