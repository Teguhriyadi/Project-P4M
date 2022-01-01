@extends('pengunjung/layouts/main')

@section('title', 'Visi Misi')

@section('page_content')

<div class="row mt-5">
    <div class="col-md-8">
        <div id="main">
            <div class="main">
                <div class="main_body">
                    @foreach ($data_visimisi as $visimisi)
                        {!! $visimisi->visi !!}
                        <br>
                        {!! $visimisi->misi !!}
                    @endforeach
                </div>
            </div>
        </div>
        <hr/>
    </div>
    
    @include('pengunjung/page/pemerintahan_desa/submenu')
</div>

@endsection
