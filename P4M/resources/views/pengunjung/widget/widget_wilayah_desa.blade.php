@php
use App\Models\Model\Peta;
$desa = Peta::select('wilayah_desa')->first();
@endphp

@if (!empty($desa))

<style>
    #mapDesa iframe {
        width: 100%;
        height: 250px;
    }
</style>

<div class="single_bottom_rightbar">
    <h2><i class="fa fa-map-marker"></i> Wilayah Desa</h2>
    <div class="box-body">
        <div id="mapDesa">
            @if ($desa->wilayah_desa != NULL)
            {!! $desa->wilayah_desa !!}
            @else
            Belum upload
            @endif
        </div>
    </div>
</div>
@endif