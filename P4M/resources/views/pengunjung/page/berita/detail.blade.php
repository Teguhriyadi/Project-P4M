@extends('pengunjung/layouts/main')

@section('title', 'Detail Berita')

@section('page_content')

<div id="main">
    <div class="main">
        <div class="main_title h2 mb-5"></div>
        <div class="main_body">
            <div class="academy-blog-posts">
                <div class="row">
                    <div class="col-md-8">
                        <div class="single-blog-post wow fadeInUp" data-wow-delay="300ms">
                            <div class="blog-post-thumb mb-15">
                                <img src="{{ url('storage/'.$berita->image) }}" alt="" style="width: 100%; margin: 0 auto; height: 700px">
                            </div>
                            <h2 class="font-weight-bold">{{ $berita->judul }}</h2>
                            <div class="post-meta">
                                <p>Posting: {{ date('d F Y', strtotime($berita->created_at)) }}</p>
                            </div>
                            {{ $berita->body }}

                        </div>
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
            </div>
        </div>
    </div>
</div>

@endsection
