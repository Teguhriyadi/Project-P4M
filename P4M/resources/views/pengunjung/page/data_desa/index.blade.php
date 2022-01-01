@extends('pengunjung/layouts/main')

@section('title', 'Data Desa')

@section('page_content')

<div class="row mt-5">
    <div class="col-md-8">
        <div id="main">
            <div class="main">
                <div class="main_body">
                    
                </div>
            </div>
        </div>
        <hr/>
    </div>
    <div class="col-md-4">
        @include('pengunjung/page/data_desa/submenu')
        
        @include('pengunjung/widget/widget_kontak')
    </div>
</div>

@endsection
