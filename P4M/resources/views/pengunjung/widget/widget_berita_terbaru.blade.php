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
                                <a href="{{ url('/berita/'.$berita->slug) }}">
                                    <img src="{{ url('storage/'.$berita->image) }}" alt="" style="width: 100%; margin: 0 auto; height: 150px">
                                </a>
                            </div>
                            <div style="height:60px">
                                <h4><a href="{{ url('/berita/'.$berita->slug) }}"  class="post-title" style="font-size: 18px">{{ $berita->judul }}</a></h4>
                                @php
                                    setlocale(LC_ALL, 'id_ID', 'id', 'ID');
                                @endphp
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