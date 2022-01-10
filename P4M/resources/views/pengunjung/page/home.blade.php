@extends('pengunjung/layouts/main')

@section('page_content')
<style>
    @media only screen and (max-width: 378px) {
        .kepala-desa {
            width: 100%;
            /* background-color: rgb(67, 70, 252);
            linear-gradient(to right, rgb(0, 4, 255), rgb(67, 70, 252)); */
        }
    }
</style>

<div class="row">
    <div class="col-md-8">
        <div id="main">
            <div class="main">
                <h3 class="main_title mb-3">Prakata Kepala Desa</h3>
                <div class="main_body">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($data_profil as $profil)
                            <img class="img-fluid kepala-desa" src="{{ url('/storage/'.$profil->gambar) }}" alt="" width="300" align="left" style="margin:5px 20px 20px 0px">
                            {!! $profil->deskripsi !!}
                            @endforeach
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        
        @include('pengunjung/widget/widget_berita')
        <hr/>
        
        @include('pengunjung/widget/widget_galeri_terbaru')
        <hr/>
    </div>
    <div class="col-md-4">
        @include('pengunjung/widget/widget_berita_terbaru')
        @include('pengunjung/widget/widget_kontak')
    </div>
</div>

@endsection
