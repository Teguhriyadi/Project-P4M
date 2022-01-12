@php
    use App\Models\Model\Peta;
    $kantor = Peta::select('lokasi_kantor')->first();
@endphp

@if (!empty($kantor))
<div class="single_bottom_rightbar">
    <h2><i class="fa fa-map-marker"></i> Lokasi Kantor Desa</h2>
    <div class="box-body">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d270.6773201029707!2d108.27295759802254!3d-6.36267761805672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb9b021226b9f%3A0x6c7c4ea37fe38303!2sKantor%20Kuwu%20Arahan%20Lor!5e1!3m2!1sid!2sid!4v1641788165057!5m2!1sid!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
@endif