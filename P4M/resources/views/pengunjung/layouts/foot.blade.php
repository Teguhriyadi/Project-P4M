<footer id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="single_footer_top wow fadeInRight">
                        <h2>{{ $profil ? 'Desa '.$profil->nama_desa : 'Anonymous' }}</h2>
                        <p>{{ $profil ? ''.$profil->nama_desa : 'Anonymous' }}, {{ $profil ? 'Kec. '.$profil->kecamatan : 'Anonymous' }}, {{ $profil ? 'Kab. '.$profil->kabupaten : 'Anonymous' }}, {{ $profil ? 'Prov. '.$profil->provinsi : 'Anonymous' }}, {{ $profil ? ''.$profil->negara : 'Anonymous' }}.</p>
                        <p><br /></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
