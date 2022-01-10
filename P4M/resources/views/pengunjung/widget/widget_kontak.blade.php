@php
    use App\Models\Model\Alamat;
    $alamat = Alamat::paginate(1)
@endphp
<div id="widget">
    <div class="widget">
        <div class="widget_title">Kontak</div>
        <div class="widget_body">
            @foreach($alamat as $a)
            <b>Alamat :</b>
            <p>{!! $a->alamat !!}</p>
            <b><i class="fa fa-phone"></i> Telepon :</b>
            <p>{{ $a->no_telepon }}</p>
            <b><i class="fa fa-desktop"></i> Website :</b>
            <p>{{ $a->website }}</p>
            @endforeach
        </div>
    </div>
</div>