@if (Request::is('/'))
<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <div class="single-hero-slide bg-img" style="background-image: url('{{ url('/frontend') }}/img/kantor-desa.jpeg');">
        </div>
    </div>
</section>
@else    
<div class="breadcumb-area bg-img" style="background-image:url('{{ url('/frontend') }}/img/kantor-desa.jpeg');">
    <div class="bradcumbContent">
        <h2>@yield('title')</h2>
    </div>
</div>
@endif