<div id="widget">
    <div class="widget">
        <div class="widget_title">Kontak</div>
        <div class="widget_body">
            @foreach($data_alamat as $alamat)
            <b>Alamat :</b>
            <p>{!! $alamat->alamat !!}</p>
            <b><i class="fa fa-phone"></i> Telepon :</b>
            <p>{{ $alamat->no_telepon }}</p>
            <b><i class="fa fa-desktop"></i> Website :</b>
            <p>{{ $alamat->website }}</p>
            @endforeach
        </div>
    </div>
</div>