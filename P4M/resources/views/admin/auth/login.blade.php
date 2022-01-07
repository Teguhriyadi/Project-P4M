

<style type="text/css">
</style>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title> Sistem Informasi Desa Arahan Lor </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="/frontend/css/login-style.css">
    <link rel="stylesheet" href="/frontend/css/login-form-elements.css">
  </head>
  <body class="login">
    <div class="top-content">
      <div class="inner-bg">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4 form-box">
              <div class="form-top">
                <a href="/"><img src="/frontend/img/logo-desa.png" alt="Arahan Lor" class="img-responsive" /></a>
                <div class="login-footer-top">
                  <h1>Desa Arahan Lor</h1>
                  <h3>Desa Arahan Lor, kecamatan Arahan, Indramayu, Jawa Barat, Indonesia.</h3>
                  </div>
                  <hr />
                </div>
                <div class="form-bottom">
                  <form id="validasi" class="login-form" action="/page/post_login" method="post" >
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
                  <div class="login-footer-bottom"><a href="/">Karya TI.C</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>