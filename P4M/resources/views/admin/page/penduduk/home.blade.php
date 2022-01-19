@extends('admin.layouts.main')

@section('title', 'Penduduk')

@section('page_content')

@php
setLocale(LC_ALL, 'id', 'ID')
@endphp

<style>
    table > thead > tr > th {
        text-align: center;
        white-space: nowrap;
        text-transform: uppercase;
    }

    table > tbody > tr > td {
        white-space: nowrap;
    }

    .table-min-height {
        min-height: 350px;
    }
</style>

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
            <div class="nav-tabs-custom">
                <div class="nav nav-tabs">
                    <ul class="nav nav-tabs">
                        @foreach ($data_status_dasar as $status_dasar)
                        <li {{ $status_dasar ? 'active' : '' }}>
                            <a href="#tab_{{ $status_dasar->id }}" data-toggle="tab">{{ $status_dasar->nama }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1" style="margin-top: 5px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-info">
                                        <div class="box-header">
                                            <a href="{{ url('page/admin/kependudukan/penduduk/create') }}" class="btn btn-social btn-flat btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Penduduk</a>
                                        </div>
                                        <div class="box-body">
                                            <div class="table-responsive table-min-height">
                                                <table id="example1" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th>Aksi</th>
                                                            <th>Nama</th>
                                                            <th>No. KK</th>
                                                            <th>Nama Ayah</th>
                                                            <th>Nama Ibu</th>
                                                            <th>Dusun</th>
                                                            <th>RW</th>
                                                            <th>RT</th>
                                                            <th>Status Hidup</th>
                                                            <th>Umur</th>
                                                            <th>Tanggal Terdaftar</th>
                                                            <th>Tanggal Diubah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($penduduk as $p)
                                                        <tr>
                                                            <th>{{ $loop->iteration }}</th>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-social btn-flat btn-info btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Pilih Aksi</button>
                                                                    <ul class="dropdown-menu" role="menu">
                                                                        <li>
                                                                            <a href="{{ url('page/admin/kependudukan/penduduk/'.$p->id) }}" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-list-ol"></i> Lihat Detail Biodata Penduduk</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="{{ url('page/admin/kependudukan/penduduk/'.$p->id.'/edit') }}" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-edit"></i> Ubah Biodata Penduduk</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="{{ url('page/admin/kependudukan/penduduk/'.$p->id.'/cetak') }}" target="_blank" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-print"></i> Cetak Biodata Penduduk</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" onclick="editStatusDasar({{ $p->id }})" data-remote="false" data-toggle="modal" data-target="#modalStatusDasar" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-sign-out"></i> Ubah Status Dasar</a>
                                                                        </li>
                                                                        <li>
                                                                            <form action="{{ url('page/admin/kependudukan/penduduk/'.$p->id) }}" method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button class="btn btn-social btn-flat btn-block btn-sm btn-delete"><i class="fa fa-trash-o"></i> Hapus</button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                            <td>{{ $p->nama }}</td>
                                                            <td>{{ $p->kk_sebelumnya }}</td>
                                                            <td>{{ $p->nama_ayah }}</td>
                                                            <td>{{ $p->nama_ibu }}</td>
                                                            <td>{{ $p->getDusun->dusun }}</td>
                                                            <td>{{ $p->getRw->rw }}</td>
                                                            <td>{{ $p->getRt->rt }}</td>
                                                            <td>{{ $p->getStatusHidup($p->status_hidup) }}</td>
                                                            <td>{{ date("y") - date('y', strtotime($p->tgl_lahir)) }}</td>
                                                            <td>{{ $p->created_at->formatLocalized("%d %B %Y") }}</td>
                                                            <td>{{ $p->updated_at->formatLocalized("%d %B %Y") }}</td>
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
                            Tab ke 2
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modalStatusDasar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-pencil"></i> Ubah Status Dasar
                </h4>
            </div>
            <form action="{{ url('/page/admin/kependudukan/penduduk/simpan_status_dasar') }}" method="POST" id="formEditDusun">
                @method("PUT")
                @csrf
                <div class="modal-body fetched-data" id="modal-content-edit">

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

@endsection

@section('page_scripts')

<script type="text/javascript">

    function editStatusDasar(id)
    {
        $.ajax({
            url : "{{ url('/page/admin/kependudukan/penduduk/edit_status_dasar') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }


    $('document').ready(function()
    {
        $('.table').on('show.bs.dropdown', function (e) {
            var table = $(this),
            menu = $(e.target).find('.dropdown-menu'),
            tableOffsetHeight = table.offset().top + table.height(),
            menuOffsetHeight = $(e.target).offset().top + $(e.target).outerHeight(true) + menu.outerHeight(true);

            // console.log(menuOffsetHeight);

            if (menuOffsetHeight > tableOffsetHeight)
            {
                table.css("padding-bottom", menuOffsetHeight - tableOffsetHeight);
                $('.table')[0].scrollIntoView(false);
            }

        });

        $('.table').on('hide.bs.dropdown', function () {
            $(this).css("padding-bottom", 0);
        })
    });
</script>

@endsection
