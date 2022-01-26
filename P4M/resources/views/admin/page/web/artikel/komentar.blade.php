@extends('admin.layouts.main')

@section('title', 'Komentar Artikel')

@section('page_content')

@php
use Carbon\Carbon;
@endphp

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
                    <h3 class="box-title">
                        <i class="fa fa-comment-o"></i> @yield('title')
                    </h3>
                    <button class="btn btn-warning btn-sm pull-right" onclick="history.back(-1)"><i class="fa fa-arrow-left"></i> Kembali</button>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="beritaTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="">No.</th>
                                    <th class="">Pengirim</th>
                                    <th class="">Isi Komentar</th>
                                    <th class="">No. Hp</th>
                                    <th class="">Email</th>
                                    <th class="">Judul Artikel</th>
                                    <th class="">Dibuat Pada</th>
                                    <th class="">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($komentar as $k)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $k->nama }}</td>
                                    <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-default" data-pesan="{{ $k->pesan }}" id="lihat"><i class="fa fa-eye"></i></button></td>
                                    <td>{{ $k->telepon }}</td>
                                    <td>{{ $k->email }}</td>
                                    <td><a href="/artikel/{{ $artikel->slug }}" target="_blank">{{ $artikel->judul }}</a></td>
                                    <td>{{ Carbon::createFromFormat('Y-m-d H:i:s', $k->created_at)->isoFormat('D MMMM Y') }}</td>
                                    <td class="text-center">
                                        <form action="{{ url('page/admin/web/artikel/'.$artikel->slug.'/komentar/'.$k->id.'/hapus') }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm btn-delete"><i class="fa fa-trash"></i></button>
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
</section>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="fa fa-eye"></i> Isi Pesan
                </h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div id="isiPesan"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info pull-right" data-dismiss="modal">
                    <i class="fa fa-arrow-left"></i> Kembali
                </button>
            </div>
        </div>
    </div>
</div>

@endsection


@section('page_scripts')
<script>
    $(function (){
        $('body').on('click', '#lihat', function () {
            let pesan = $(this).data('pesan');

            $("#isiPesan").html(pesan);
        })

        $('#beritaTable').DataTable({
            columnDefs: [
            { orderable: false, targets: [0,7] }
            ],
        })
    })
</script>
@endsection
