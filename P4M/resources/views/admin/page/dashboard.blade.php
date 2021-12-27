@extends('admin.layouts.main')

@section('page_content')

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
</section>

@endsection
