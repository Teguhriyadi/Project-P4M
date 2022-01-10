@php
    use App\Models\Model\Alamat;
    $alamat = Alamat::paginate(1);
@endphp
<footer id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="single_footer_top wow fadeInRight">
                        @foreach ($alamat as $a)
                        <h2>Desa Arahan Lor</h2>
                        <p>{!! $a->alamat !!}</p>
                        <p><br /></p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>  
</footer>