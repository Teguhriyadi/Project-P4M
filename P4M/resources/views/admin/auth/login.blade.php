@php
    use App\Models\Model\Profil;
    $profil = Profil::first();
@endphp
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title> Sistem Informasi Desa Arahan Lor </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('') }}/frontend/css/login-style.css">
    <link rel="stylesheet" href="{{ url('') }}/frontend/css/login-form-elements.css">
    <link rel="icon" href="{{ url('') }}{{ $profil ? '/storage/'.$profil->gambar : '/frontend/img/logo-desa.png' }}">
  </head>
  <body class="login">
    <div class="top-content">
      <div class="inner-bg">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4 form-box">
              <div class="form-top">
                <a href="{{ url('') }}/"><img src="{{ url('') }}{{ $profil ? '/storage/'.$profil->gambar : '/frontend/img/logo-desa.png' }}" alt="Arahan Lor" class="img-responsive" height="200" /></a>
                <div class="login-footer-top">
                  <h1>Desa {{ $profil ? $profil->nama_desa : 'Anonymous' }}</h1>
                  <h3>Desa {{ $profil ? $profil->nama_desa : 'Anonymous' }}, kecamatan {{ $profil ? $profil->kecamatan : 'Anonymous' }}, {{ $profil ? $profil->kabupaten : 'Anonymous' }}, {{ $profil ? $profil->provinsi : 'Anonymous' }}, {{ $profil ? $profil->negara : 'Anonymous' }}.</h3>
                  </div>
                  <hr />
                </div>
                <div class="form-bottom">
                  <form id="validasi" class="login-form" action="{{ url('') }}/page/post_login" method="post" >
                      @csrf
                    <div class="form-group">
                      <input name="email" type="email" placeholder="Email"  value="" class="form-username form-control required">
                    </div>
                    <div class="form-group">
                      <input name="password" id="password" type="password" placeholder="Password"  value="" class="form-username form-control required">
                    </div>
                    <hr />
                    <button type="submit" class="btn">MASUK</button>
                  </form>
                  <hr/>
                  <div class="login-footer-bottom"><a href="{{ url('') }}/">Kembali</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>
