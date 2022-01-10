@php
    use App\Models\Model\Berita;
    $berita = Berita::latest()->paginate(6);
@endphp
<div id="widget">
    <div class="widget">
        <div class="widget_title">Berita Terbaru</div>
        <div class="widget_body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($berita as $b)
                            <a href="{{ url('/berita/'.$b->slug) }}">
                                <ul class="list-group log-information bubble-sheet">
                                    <li class="list-group-item">
                                        <p>
                                            <span class="text-dark">{!! $b->judul !!}</span>
                                            <br>
                                            <small class="content-color-secondary"><i class="fa fa-calendar"></i> Posting: {{ $b->created_at->formatLocalized("%d %B %Y") }}</small>
                                        </p>
                                    </li>
                                </ul>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>