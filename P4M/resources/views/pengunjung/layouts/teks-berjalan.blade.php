@php
    use App\Models\Model\Artikel;
    $teks = Artikel::all();
@endphp

<div style="margin-top:10px;">
    <marquee onmouseover="this.stop()" onmouseout="this.start()">
        <span class="teks" style="font-family: Oswald; padding-right: 50px;">
            @foreach ($teks as $t)
            <a href="/artikel/{{ $t->slug }}" rel="noopener noreferrer" title="Baca Selengkapnya">{!! $t->judul !!}</a>
            @endforeach
        </span>
    </marquee>
</div>