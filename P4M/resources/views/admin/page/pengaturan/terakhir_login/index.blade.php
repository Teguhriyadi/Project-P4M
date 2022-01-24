@extends('admin.layouts.main')

@section('title', 'Catatan Login')

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
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-book"></i> Catatan Pengguna Sistem
                    </h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Nama</th>
                                <th class="text-center">Terakhir Login</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_terakhir_login as $terakhir_login)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>{{ $terakhir_login->nama }}</td>
                                    <td class="text-center">{{ Carbon::createFromFormat('Y-m-d H:i:s', $terakhir_login->terakhir_login)->isoFormat('LLLL') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
