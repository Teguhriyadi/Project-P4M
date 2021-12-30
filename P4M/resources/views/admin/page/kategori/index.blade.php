@extends('admin.layouts.main')

@section('page_content')

<section class="content-header">
    <h1>
        Kategori
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">Data Kategori</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                {{-- <form id="tambahKategori" action="{{ url('/page/admin/kategori/') }}" method="POST"> --}}
                    <div class="box-header">
                        <h3 class="box-title">
                            <i class="fa fa-plus"></i> Form Tambah Kategori
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama"> Nama Kategori </label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Kategori">
                            <input type="hidden" class="form-control" name="slug" id="slug" placeholder="Masukkan Slug" readonly>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button id="tambahKategori" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
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
        fetch('/page/admin/kategori/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    $(document).ready(function() {
        $("#kategoriTable").dataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/page/admin/kategori/showall') }}",
            columns: [
                {data: 'no'},
                {data: 'nama'},
                {data: 'aksi'},
            ]
        });

        $("body").on('click', "#tambahKategori", function() {
            let nama = $("#nama").val().trim();
            let slug = $("#slug").val().trim();

            $.ajax({
                url: "{{ url('/page/admin/kategori') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    nama: nama,
                    slug: slug,
                },
                success: function(response) {
                    if (response == 1) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                }
            })
        });
    });
</script>

@endsection
