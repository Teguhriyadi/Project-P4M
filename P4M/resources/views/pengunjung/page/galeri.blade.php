@extends('pengunjung/layouts/main')

@section('page_content')

<div class="row">
    <div class="col-md-8">
        <div id="main">
            <div class="main">
                <div class="main_title"></div>
                <div class="main_body"></div>
            </div>
        </div>
        <div id="main">
            <div class="main">
                <div class="main_title">Galeri</div>
                <div class="main_body">
                    <div class="academy-blog-posts">
                        <div class="row">
                            @foreach ($data_galeri as $galeri)
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="single-blog-post wow fadeInUp" data-wow-delay="300ms">
                                    <div class="blog-post-thumb mb-15">
                                        <img src="{{ url('/storage/'.$galeri->gambar) }}" alt="" style="width: 100%; margin: 0 auto;">
                                    </div>
                                    <div style="height:110px">
                                        <h4><a href="#"  class="post-title" style="font-size: 18px">Kebersihan Lingkungan</a></h4>
                                        <div class="post-meta"><p>Posting: {{ $galeri->created_at->formatLocalized("%d %B %Y") }} </p></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{ $data_galeri->links() }}
                        </div>
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
