@extends('admin.layouts.main')

@section('title', 'Keluarga')

@section('page_content')

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
            <div class="box box-info">
                <div class="box-header">
                    <a href="{{ url('/page/admin/kependudukan/keluarga') }}" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Penduduk">
                        <i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Keluarga
                    </a>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="nomor_kk"> Nomor KK </label>
                                <input type="text" id="no_kk" name="no_kk" class="form-control input-sm nik" placeholder="Nomor KK">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4"></div>
        <div class="col-md-8"></div>
        </form>
    </div>
</section>

@endsection
