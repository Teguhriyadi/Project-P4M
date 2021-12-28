@extends('pengunjung/layouts/main')

@section('page_content')

<div id="main">
    <div class="main">
        <div class="main_title h2 mb-5">Berita</div>
        <div class="main_body">
            <div class="academy-blog-posts">
                <div class="row">
                    @foreach ($data_berita as $berita)
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="single-blog-post wow fadeInUp" data-wow-delay="300ms">
                            <div class="blog-post-thumb mb-15">
                                <span class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, .7)">{{ $berita->getCategory->nama }}</span>
                                <img src="{{ url('storage/'.$berita->image) }}" alt="{{ $berita->judul }}" style="width: 100%; margin: 0 auto; height: 300px">
                            </div>
                            <div id="deskripsi">
                                <h4><a href="#"  class="post-title" style="font-size: 18px">{{ $berita->judul }}</a></h4>
                                <div class="post-meta">
                                    <p>Posting: {{ $berita->created_at->formatLocalized("%d %B %Y") }}</p>
                                    <p class="text-dark">{{ $berita->kutipan }} ...</p>
                                    <button class="mt-3 btn btn-primary">
                                        <i class="fa fa-search"></i> Selengkapnya
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
