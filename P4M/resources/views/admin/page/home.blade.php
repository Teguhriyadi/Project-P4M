@extends('admin.layouts.main')

@section('page_title', 'Dashboard')

@section('page_content')
<link rel="stylesheet" href="{{ url('/backend/template') }}/bower_components/orgchart/css/jquery.orgchart.css">

<style type="text/css">
    #ul-data { display: none; width: 40%; vertical-align: top; }
    #chart-container { display: inline-block; width: 100%; }
    #ul-data li { font-size: 1.5rem; }
    #chart-container {
        position: relative;
        height: 420px;
        border: 1px solid #aaa;
        margin: 0.5rem;
        overflow: auto;
        text-align: center;
    }

    .orgchart .node .title {
        font-size: 1.3rem;
        width: 200px;
        height: 2em;
    }

    .orgchart { background: #fff; }
    .orgchart td.left, .orgchart td.right, .orgchart td.top { border-color: #aaa; }
    .orgchart td>.down { background-color: #aaa; }
    .orgchart .middle-level .title { background-color: #006699; }
    .orgchart .middle-level .content { border-color: #006699; }
    .orgchart .product-dept .title { background-color: #009933; }
    .orgchart .product-dept .content { border-color: #009933; }
    .orgchart .rd-dept .title { background-color: #993366; }
    .orgchart .rd-dept .content { border-color: #993366; }
    .orgchart .pipeline1 .title { background-color: #996633; }
    .orgchart .pipeline1 .content { border-color: #996633; }
    .orgchart .frontend1 .title { background-color: #cc0066; }
    .orgchart .frontend1 .content { border-color: #cc0066; }
</style>

<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">Blank page</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="ion ion-ios-gear-outline"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        Data Users
                    </span>
                    <span class="info-box-number">
                        90 <small>&</small>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="ion ion-ios-gear-outline"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        Data Users
                    </span>
                    <span class="info-box-number">
                        90 <small>&</small>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="ion ion-ios-gear-outline"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        Data Users
                    </span>
                    <span class="info-box-number">
                        90 <small>&</small>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="ion ion-ios-gear-outline"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        Data Users
                    </span>
                    <span class="info-box-number">
                        90 <small>&</small>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <ul id="ul-data">
                @foreach ($data_struktur as $struktur)
                <li>
                    @if ($struktur->getJabatan->nama_jabatan == "Kuwu")
                    {{ $struktur->getPegawai->nama }} ({{ $struktur->getJabatan->nama_jabatan }})
                    @else
                    <ul>
                        <li class="middle-level">
                            {{ $struktur->getPegawai->nama }} ({{ $struktur->getJabatan->nama_jabatan }})
                        </li>
                    </ul>
                    @endif
                </li>
                @endforeach
            </ul>
            <div id="chart-container"></div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Terakhir Login
                    </h3>
                    <div class="pull-right">
                        <a href="{{ url('/page/admin/terakhir_login') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-search"></i> Selengkapnya
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Name</th>
                                    <th class="text-center">Terakhir Login</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_terakhir_login as $terakhir_login)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $terakhir_login->nama }}</td>
                                        <td class="text-center">{{ $terakhir_login->terakhir_login }}</td>
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

<script src="{{ url('/backend/template') }}/bower_components/orgchart/js/jquery.orgchart.js"></script>

<script>
    $(function() {

        $('#chart-container').orgchart({
        'data' : $('#ul-data')
        });

    });
</script>

@endsection

@section('page_scripts')


@if (session("success"))

<script type="text/javascript">

    swal({
        title: "Berhasil!",
        text: "{{ session('success') }}",
        icon: "success",
        button: "OK",
    });

</script>

@endif

@endsection
