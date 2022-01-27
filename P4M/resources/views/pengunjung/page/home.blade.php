@extends('pengunjung/layouts/main')

@section('page_content')
<div class="single_category wow fadeInDown">
    <div class="archive_style_1">
        <div class="business_category_left wow fadeInDown">
            <ul class="fashion_catgnav">
                <li style="border-bottom: none">
                    <div class="catgimg2_container2">
                        <div class="row">
                            <div class="col-md-12">
                                @if ($data_profil)
                                <img src="{{ $data_profil ? url('/storage/'.$data_profil->gambar) : url('/frontend/img/logo-desa.png') }}" width="300" class="img-fluid img-thumbnail" style="float:left; margin:5px 20px 20px 0;" />
                                <div style="text-align: justify; margin-bottom: 2rem;">
                                    {!! $data_profil->deskripsi !!}
                                </div>
                                @else
                                <img src="{{ url('/frontend/img/no-images.png') }}" width="300" class="img-fluid img-thumbnail" style="float:left; margin:5px 20px 20px 0;" />
                                <div style="text-align: justify; margin-bottom: 2rem;">
                                    Belum ada deskripsi
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection
