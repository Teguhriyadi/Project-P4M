@extends('pengunjung/layouts/main')

@section('title', 'Wilayah Desa')

@section('page_content')

<div id="printableArea">
    <h4 class="catg_titile" style="font-family: Oswald"><font color="#FFFFFF">Profil Wilayah Desa Arahan Lor</font></h4>
    <div class="post_commentbox">
        <span class="meta_date">
            <i class="fa fa-user"></i>Administrator&nbsp;
            <i class="fa fa-eye"></i>0 Kali Dibaca&nbsp;
        </span>
    </div>
    <div class="single_page_content" style="margin-bottom:10px;">
        
        <p align="justify">
            Catatan Sejarah Desa Arahan Lor semenjak masa jabatan sesepuh kampung yang bernama SUDIRAH menjadi kuwu Arahan Lor dari tahun 1944 s/d 1970, TARSIJAH menjabat Pejabat sementara dari tahun 1971 s/d 1973, WASTEJA menjabat dari tahun 1974 s/d 1993, SUDIRMAN menjabat dari tahun 1994 s/d 2001, TARKIDI menjabat dari tahun 2002 s/d 2011, ROPIDIN menjabat dari tahun 2012 s/d 2018, WAHYUDI menjabat dari tahun 2018 sampai sekarang.
            Desa Arahan Lor pernah dipimpin dengan periode pimpinan sebagai berikut :
        </p>
        <ol>
            <li>Kuwu SUDIRAH (1944 – 1970)</li>
            <li>Kuwu TARSIJAH (1971 – 1974)</li>
            <li>Kuwu WASTEJA (1975 – 1993)</li>
            <li>Kuwu SUDIRMAN (1994 – 2001)</li>
            <li>Kuwu TARKIDI (2002 – 2011)</li>
            <li>Kuwu ROPIDIN (2012 – 2018)</li>
            <li>Kuwu WAHYUDI (2018 – 2024)</li>
        </ol>
        
        
    </div>
</div>


{{-- <div class="row mt-5">
    <div class="col-md-12">
        <div id="main">
            <div class="main">
                <div class="main_body">
                    @foreach ($data_geografis as $geografis)
                    {!! $geografis->deskripsi !!}
                    @endforeach
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Batas</th>
                                    <th>Desa/Kelurahan</th>
                                    <th>Kecamatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_wgeografis as $wilayah_geografis)
                                <tr>
                                    <td>{{ $wilayah_geografis->batas }}</td>
                                    <td>{{ $wilayah_geografis->desa }}</td>
                                    <td>{{ $wilayah_geografis->kecamatan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15861.119451467082!2d108.26136122408106!3d-6.357809876387517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb9bba6edf671%3A0x51a5177a20cb6fea!2sArahan%20Lor%2C%20Arahan%2C%20Kabupaten%20Indramayu%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1641038805549!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    
                </div>
            </div>
        </div>
        <hr/>
    </div>
    
</div> --}}

@endsection
