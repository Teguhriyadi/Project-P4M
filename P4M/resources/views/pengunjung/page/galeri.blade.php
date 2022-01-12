@extends('pengunjung/layouts/main')

@section('title', 'Galeri')

@section('page_content')

<div class="row mt-5">
    <div class="col-md-8">
        <div id="main">
            <div class="main">
                <div class="main_body">
                    <div class="academy-blog-posts">
                        <div class="row">
                            @foreach ($data_galeri as $galeri)
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="single-blog-post wow fadeInUp" data-wow-delay="300ms">
                                    <div class="blog-post-thumb mb-15">
                                        <img src="{{ url('/storage/'.$galeri->gambar) }}" alt="" style="width: 100%; margin: 0 auto; height: 180px">
                                    </div>
                                    <div style="height:100px">
                                        <h4><a href="#"  class="post-title" style="font-size: 18px">Kebersihan Lingkungan</a></h4>
                                        <div class="post-meta">
                                            @php
                                                setlocale(LC_ALL, 'id_ID', 'id', 'ID');
                                            @endphp
                                            <p>Posting: {{ $galeri->created_at->formatLocalized("%d %B %Y") }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div style="display: flex; justify-content: end;">
                            {{ $data_galeri->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </div>
</div>

@endsection
