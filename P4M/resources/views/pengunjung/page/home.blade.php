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
                            <img class="img-fluid kepala-desa" src="{{ url('/storage/'.$profil->gambar) }}" alt="" width="250" align="left" style="margin:5px 20px 20px 0px">
                            {!! $profil->deskripsi !!}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div id="main">
            <div class="main">
                <div class="main_title">Berita Terbaru</div>
                <div class="main_body">
                    <div class="academy-blog-posts">
                        <div class="row">
                            @foreach ($data_berita as $berita)
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="single-blog-post wow fadeInUp" data-wow-delay="300ms">
                                    <div class="blog-post-thumb mb-15">
                                        <img src="{{ url('storage/'.$berita->image) }}" alt="" style="width: 100%; margin: 0 auto;">
                                    </div>
                                    <div style="height:110px">
                                        <h4><a href="#"  class="post-title" style="font-size: 18px">{{ $berita->judul }}</a></h4>
                                        <div class="post-meta"><p>Posting: {{ $berita->created_at->formatLocalized("%d %B %Y") }} </p></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div id="main">
            <div class="main">
                <div class="main_title">Galeri</div>
                <div class="main_body">
                    <div class="row gallery clearfix">
                        @foreach ($data_galeri as $galeri)
                        <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                            <div style="margin-bottom:20px;">
                                <a href="" title="Munjungan">
                                    <img src="{{ url('storage/'.$galeri->gambar) }}" alt="Munjungan" width="100%">
                                    <p>Munjungan</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </div>
    <div class="col-md-4">
        <div id="widget">
            <div class="widget">
                <div class="widget_title">Kontak</div>
                <div class="widget_body">

                    <b>Alamat :</b>
                    <p>Arahan Lor kecamatan Arahan, Indramayu, Jawa Barat, Indonesia.</p>
                    <b><i class="fa fa-phone"></i> Telepon :</b>
                    <p>0000000</p>
                    <b><i class="fa fa-desktop"></i> Website :</b>
                    <p>arahanlor.go.id</p></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
