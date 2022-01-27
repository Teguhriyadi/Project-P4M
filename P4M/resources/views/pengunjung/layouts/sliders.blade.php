@php
use App\Models\Model\Artikel;
$artikel = Artikel::latest()->paginate(6);
@endphp

<style type="text/css">
    .slick_slider img {
        width: 100%;
    }
    .slick_slider, .cycle-slideshow {
        max-height: 350px;
        border: 5px solid #e5e5e500;
        display: block;
        position: relative;
        /*margin: 0px auto;*/
        overflow: hidden;
    }
    .textgambar{
        position: absolute;
        left: 20px;
        top: 280px;
        color: black;
        font-weight: bold;
        font-family: Oswald;

        background-color: #ffffff;
        border: 1px solid black;
        border-radius: 3px;
        padding: 5px;
        opacity: 0.6;
        filter: alpha(opacity=60); /* For IE8 and earlier */
    }
</style>
<div class="slick_slider" style="margin-bottom:5px;">
    @foreach ($artikel as $a)
    <div class="single_iteam" data-artikel="168"  onclick="location.href='{{ url('artikel/'.$a->slug) }}'" >
        <img class="tlClogo" src="{{ url('/storage/'.$a->image) }}">
        <div class="textgambar hidden-xs">{{ $a->judul }} </div>
    </div>
    @endforeach
</div>
