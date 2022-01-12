@php
use App\Models\Model\Peta;
$kantor = Peta::select('lokasi_kantor')->first();
@endphp

<style>
    #mapKantor iframe {
        width: 100%;
        height: 300px;
    }
</style>

@if (!empty($kantor))
<div class="single_bottom_rightbar">
    <h2><i class="fa fa-map-marker"></i> Lokasi Kantor Desa</h2>
    <div class="box-body">
        <div id="mapKantor">
            @if ($kantor->lokasi_kantor != NULL)
            {!! $kantor->lokasi_kantor !!}
            @else
            Belum upload
            @endif
        </div>
    </div>
</div>
@endif