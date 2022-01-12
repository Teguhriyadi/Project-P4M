@php
    use App\Models\Model\TeksBerjalan;
    $teks = TeksBerjalan::all();
@endphp

<div style="margin-top:10px;">
    <marquee onmouseover="this.stop()" onmouseout="this.start()">
        <span class="teks" style="font-family: Oswald; padding-right: 50px;">
            @foreach ($teks as $t)
            <a href="/artikel/slug-{{ $loop->iteration }}" rel="noopener noreferrer" title="Baca Selengkapnya">{!! $t->teks !!}</a>
            @endforeach
        </span>
    </marquee>
</div>