@extends('pengunjung/layouts/main')

@section('title', 'Berita')

@section('page_content')

<div id="main" class="mt-5">
    <div class="main">
        <div class="main_body">
            <div class="academy-blog-posts">
                <div class="row">
                    @if ($data_berita->count())
                        @foreach ($data_berita as $berita)
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="single-blog-post wow fadeInUp" data-wow-delay="300ms">
                                <div class="blog-post-thumb mb-15">
                                    <span class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, .7)">{{ $berita->getCategory->nama }}</span>
                                    <a href="/berita/{{ $berita->slug }}">
                                        <img src="{{ url('storage/'.$berita->image) }}" alt="{{ $berita->judul }}" style="width: 100%; margin: 0 auto; height: 300px">
                                    </a>
                                </div>
                                <div id="deskripsi">
                                    <h4><a href="/berita/{{ $berita->slug }}"  class="post-title" style="font-size: 18px">{{ $berita->judul }}</a></h4>
                                    <div class="post-meta">
                                        <p>Posting: {{ $berita->created_at->formatLocalized("%d %B %Y") }}</p>
<<<<<<< HEAD
                                        <p class="text-dark">{{ $berita->kutipan }} ...</p>
                                        <a href="{{ url('/berita/'.$berita->slug) }}" class="mt-3 btn btn-primary text-white">
                                            <i class="fa fa-search"></i> Selengkapnya
                                        </a>
=======
                                        <p class="text-dark">{{ $berita->kutipan }}</p>
                                        
>>>>>>> be9a100be186ff5a95aa947db6076b0d3b03d3cf
                                    </div>
                                </div>
                                <a href="/berita/{{ $berita->slug }}" class="mt-3 btn btn-primary text-white">
                                    <i class="fa fa-search"></i> Selengkapnya
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-end">
                            {{ $data_berita->links() }}
                        </div>
                    @else
                    <h1 class="text-center">
                        Belum Ada Postingan
                    </h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
