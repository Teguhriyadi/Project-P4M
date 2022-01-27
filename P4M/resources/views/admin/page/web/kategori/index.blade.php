@extends('admin.layouts.main')

@section('title', 'Data Kategori')

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
        <div class="col-md-4">
            <div class="box box-info" id="">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-plus"></i> Form Tambah Kategori
                    </h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama"> Nama Kategori </label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Kategori">
                        <label class="error hidden" for="judul">Judul harap di isi!</label>
                        <input type="hidden" class="form-control" name="slug" id="slug" placeholder="Masukkan Slug" readonly>
                    </div>
                </div>
                <div class="box-footer">
                    <button id="tambahKategori" class="btn btn-social btn-primary btn-flat btn-sm" title="Tambah Data">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                    <button type="reset" class="btn btn-social btn-warning btn-flat btn-sm" title="Reset">
	    	            <i class="fa fa-refresh"></i> Reset
                	 </button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        Data Kategori
                    </h3>
                </div>
                <div class="box-body">
                    <table id="kategoriTable" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama Kategori</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function() {
        $(".error").addClass('hidden');
        fetch('/page/admin/kategori/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    $(document).ready(function() {
        $("#kategoriTable").dataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/page/admin/kategori/showall') }}",
            columnDefs: [
                { orderable: false, targets: [0,2] }
            ],
            order: [[ 1, 'asc' ]],
            columns: [
                {data: 'no'},
                {data: 'nama'},
                {data: 'aksi'},
            ],
        });

        $("body").on('click', "#tambahKategori", function() {
            let nama = $("#nama").val().trim();
            let slug = $("#slug").val().trim();

            if (nama == "") {
                $(".error").removeClass('hidden');
            } else {
                $.ajax({
                    url: "{{ url('/page/admin/kategori') }}",
                    type: "POST",
                    data: {
                        nama: nama,
                        slug: slug,
                    },
                    success: function(response) {
                        if (response == 1) {
                            swal({
                                title: "Selamat!",
                                text: "Data anda berhasil ditambahkan!",
                                icon: "success",
                            }).then((success) => {
                                location.reload();
                            });
                        } else {
                            location.reload();
                        }
                    }
                })
            }
        });

        $("body").on('click', "#hapusKategori", function() {
            let id = $(this).data("id");

            swal({
                title: "Apakah anda yakin?",
                text: "Data ini akan dihapus!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ url('/page/admin/kategori') }}/"+id,
                        type: "post",
                        data: { _method: 'delete', id: id },
                        success: function(response) {
                            if (response == 1) {
                                swal({
                                    title: "Selamat!",
                                    text: "Data anda berhasil dihapus!",
                                    icon: "success",
                                }).then((success) => {
                                    location.reload();
                                });
                            } else {
                                location.reload();
                            }
                        }
                    })
                } else {
                    swal("Data tidak jadi dihapus!");
                }
            });
        });
    });
</script>

@endsection
