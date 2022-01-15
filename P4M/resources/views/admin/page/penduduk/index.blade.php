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

@endsection