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
            <div class="box">
                <div class="box-header">
                    <a href="{{ url('page/admin/kependudukan/penduduk/create') }}" class="btn btn-social btn-flat btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Penduduk</a>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
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
                                <tr style="height: 500px">
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
                                                    <a href="#" data-toggle="modal" data-target="#modalStatusDasar" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-sign-out"></i> Ubah Status Dasar</a>
                                                </li>
                                                <li>
                                                    <form action="{{ url('page/admin/kependudukan/penduduk/'.$p->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-trash-o"></i> Hapus</button>
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
            <form action="" method="POST" id="formEditDusun">
                <div class="modal-body" id="modal-content-edit">
                    <div class="form-group">
                        <label for="status">Status Dasar Baru</label>
                        <input type="text" class="form-control input-sm" name="status" id="status">
                    </div>
                    <div class="form-group">
                        <label for="tempat_meninggal">Tempat Meninggal</label>
                        <input type="text" class="form-control input-sm" name="tempat_meninggal" id="tempat_meninggal">
                    </div>
                    <div class="form-group">
                        <label for="tujuan_pindah">Tujuan Pindah</label>
                        <input type="text" class="form-control input-sm" name="tujuan_pindah" id="tujuan_pindah">
                    </div>
                    <div class="form-group">
                        <label for="alamat_tujuan">Alamat Tujuan Pindah</label>
                        <input type="text" class="form-control input-sm" name="alamat_tujuan" id="alamat_tujuan">
                    </div>
                    <div class="form-group">
                        <label for="tgl_peristiwa">Tanggal Peristiwa</label>
                        <input type="date" class="form-control input-sm" name="tgl_peristiwa" id="tgl_peristiwa">
                    </div>
                    <div class="form-group">
                        <label for="tgl_laporan">Tanggal Laporan</label>
                        <input type="date" class="form-control input-sm" name="tgl_laporan" id="tgl_laporan">
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea name="catatan" id="catatan" class="form-control input-sm"></textarea>
                    </div>
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
