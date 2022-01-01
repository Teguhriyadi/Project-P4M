@extends('pengunjung/layouts/main')

@section('title', 'Pemerintahan Desa')

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
    
    @include('pengunjung/page/pemerintahan_desa/submenu')
</div>

@endsection
