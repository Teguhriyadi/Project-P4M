@extends('pengunjung/layouts/main')

@section('title', 'Data Penduduk Arahan Lor')

@section('page_content')

<style>
    #petaDesa iframe {
        width: 100%;
        height: 400px;
    }
</style>

<div id="printableArea">
    <h4 class="catg_titile" style="font-family: Oswald"><font color="#FFFFFF">@yield('title')</font></h4>
    <div class="post_commentbox">
        <span class="meta_date">
            <i class="fa fa-user"></i>Administrator&nbsp;
        </span>
    </div>
    <br>
    <div class="alert alert-danger" style="text-align:center; margin-top: 50px;">
            <b> Jika Tidak Terdaftar Silahkan Datang ke Balai Desa Arahan Lor! </b>
        </div>
    <div class="box" style="margin-bottom:10px;">
        <div class="box-body">
            <table class="table table-bordered table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Dusun</th>
                        <th scope="col">RT</th>
                        <th scope="col">RW</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('page_scripts')
<link rel="stylesheet" href="/backend/template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="/backend/template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/backend/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
    $(function () {
        $('#dataTable').DataTable({
            processing: true,
        serverSide: true,
        ajax: '{{ url("") }}/data/penduduk',
        columns: [
        {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        },
        {
            data: 'nama',
            name: 'nama'
        },
        {
            data: 'get_kelamin.nama',
            name: 'jenis_kelamin'
        },
        {
            data: 'get_rt.get_rw.get_dusun.dusun',
            name: 'dusun'
        },
        {
            data: 'get_rt.rt',
            name: 'rt'
        },
        {
            data: 'get_rt.get_rw.rw',
            name: 'rw'
        }
        ]
        })
    })
</script>

@endsection
