<div id="main">
    <div class="main">
        <div class="main_title">Galeri</div>
        <div class="main_body">
            <div class="row gallery clearfix">
                @foreach ($data_galeri as $galeri)
                <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                    <div style="margin-bottom:20px;">
                        <a href="" title="{{ $galeri->judul }}">
                            <img src="{{ url('storage/'.$galeri->gambar) }}" alt="{{ $galeri->judul }}" width="100%" style="height:150px">
                            <p>{{ $galeri->judul }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>