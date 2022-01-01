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
            <div class="box" id="">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-plus"></i> Tambah Data Hak Akses
                    </h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama_hak_akses"> Hak Akses </label>
                        <input type="text" class="form-control" name="nama_hak_akses" id="nama_hak_akses" placeholder="Masukkan Hak Akses">
                        <label class="error hidden" for="nama_hak_akses">Hak akses harap di isi!</label>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="tambah">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm" id="reset">
                        <i class="fa fa-refresh"></i> Batal
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Data Hak Akses
                    </h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <div class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control input-sm" placeholder="" id="search"></label>
                        </div>
                        <table class="table table-bordered table-striped" width="100%" id="tableHakAkses">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Hak Akses</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    loadHakAkses();

    $(document).ready(function() {
        $("body").on('click', '#tambah', function() {
            let nama = $("#nama_hak_akses").val().trim();

            if (nama == "") {
                $(".error").removeClass('hidden');
            } else {
                $.ajax({
                    url: "{{ url('/page/admin/hak_akses') }}",
                    type: "POST",
                    data: {nama_hak_akses: nama},
                    success: function (response) {
                        if (response == 1) {
                            swal("Selamat!", 'Data anda berhasil ditambahkan', 'success');
                            loadHakAkses();
                            $("#nama_hak_akses").val('')
                        } else {
                            swal("Maaf!", 'Data anda gagal ditambahkan', 'error');
                        }
                    }
                })
            }
        })

        $("tbody tr").each(function() {
            $(this).attr('searchData', $(this).text().toLowerCase());
        })

        $("#search").on('keyup', function() {
            let val = $(this).val().toLowerCase();

            $("tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(val) > -1);
            })
        })
    })

    function loadHakAkses() {
        let table = document.getElementById('tableHakAkses').getElementsByTagName('tbody')[0];
        table.innerHTML = '';

        $.ajax({
            url: '{{ url("page/admin/hak_akses/show") }}',
            type: "get",
            success: function(response) {
                let no = 1;
                for(let key in response) {
                    if(response.hasOwnProperty(key)) {
                        let val = response[key];

                        let newRow = table.insertRow(-1);
                        let noCell = newRow.insertCell(0);
                        let aksesCell = newRow.insertCell(1);
                        let aksiCell = newRow.insertCell(2);

                        noCell.innerHTML = no++;
                        aksesCell.innerHTML = val['nama'];
                        aksiCell.innerHTML = val['nama'];
                    }
                }
            }
        })
    }
</script>

@endsection
