@php
    use App\Models\Model\Peta;
    $desa = Peta::select('wilayah_desa')->first();
@endphp

@if (!empty($desa))
<div class="single_bottom_rightbar">
    <h2><i class="fa fa-map-marker"></i> Wilayah Desa</h2>
    <div class="box-body">
            
        {!! $desa->wilayah_desa !!}
    </div>
</div>
@endif