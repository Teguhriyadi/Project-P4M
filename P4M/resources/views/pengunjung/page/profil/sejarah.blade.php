@extends('pengunjung/layouts/main')

@section('title', 'Sejarah Desa')

@section('page_content')

<div id="printableArea">
    <h4 class="catg_titile" style="font-family: Oswald"><font color="#FFFFFF">@yield('title')</font></h4>
    <div class="post_commentbox">
        <span class="meta_date">
            <i class="fa fa-user"></i>Administrator&nbsp;
        </span>
    </div>
    <div class="single_category wow fadeInDown">
        <div class="archive_style_1">
            <div class="business_category_left wow fadeInDown">
                <ul class="fashion_catgnav">
                    <li style="border-bottom: none">
                        <div class="catgimg2_container2">
                            <div class="row">
                                <div class="col-md-12">
                                    @if ($sejarah)
                                    <img src="{{ $sejarah->gambar ? url('/storage/'.$sejarah->gambar) : url('/frontend/img/no-images.png') }}" width="300" onerror="this.onerror=null; this.src={{ url('/frontend/img/no-images.png') }}" class="img-fluid img-thumbnail" style="float:left; margin:5px 20px 20px 0;" />
                                    <div style="text-align: justify; margin-bottom: 2rem;">
                                        {!! $sejarah->sejarah !!}
                                    </div>
                                    @else
                                    <img src="{{ url('/frontend/img/no-images.png') }}" width="300" class="img-fluid img-thumbnail" style="float:left; margin:5px 20px 20px 0;" />
                                    <div style="text-align: justify; margin-bottom: 2rem;">
                                        Belum ada sejarah
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
</div>


{{-- <div class="row mt-5">
    <div class="col-md-12">
        <div id="main">
            <div class="main">
                <div class="main_body">
                    @foreach ($data_geografis as $geografis)
                    {!! $geografis->deskripsi !!}
                    @endforeach

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Batas</th>
                                    <th>Desa/Kelurahan</th>
                                    <th>Kecamatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_wgeografis as $wilayah_geografis)
                                <tr>
                                    <td>{{ $wilayah_geografis->batas }}</td>
                                    <td>{{ $wilayah_geografis->desa }}</td>
                                    <td>{{ $wilayah_geografis->kecamatan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15861.119451467082!2d108.26136122408106!3d-6.357809876387517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb9bba6edf671%3A0x51a5177a20cb6fea!2sArahan%20Lor%2C%20Arahan%2C%20Kabupaten%20Indramayu%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1641038805549!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                </div>
            </div>
        </div>
        <hr/>
    </div>

</div> --}}

@endsection
