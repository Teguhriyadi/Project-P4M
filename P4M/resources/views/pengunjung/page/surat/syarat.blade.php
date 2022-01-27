<div class="alert alert-danger">
    <h4><b>Keterangan Syarat Surat</b></h4>
    <ol>
        @foreach ($surat as $s)
        <li>{{ $s->getSyarat->ref_syarat_nama }}</li>
        @endforeach
    </ol>
</div>
