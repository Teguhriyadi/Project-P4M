@extends('pengunjung/layouts/main')

@section('title', 'Struktur Organisasi')

@section('page_content')

<div class="row mt-5">
    <div class="col-md-8">
        <div id="main">
            <div class="main">
                <div class="main_body">
                  {{-- <ul>
                      @foreach ($data_organisasi as $struktur)
                        @if ($struktur->getJabatan->nama_jabatan == "Kuwu")
                        <li>{{ $struktur->getPegawai->nama }}</li>
                        @else
                        <ul>
                            <li>
                                {{ $struktur->getPegawai->nama }}
                            </li>
                        </ul>
                        @endif
                      @endforeach
                  </ul> --}}
                </div>
            </div>
        </div>
        <hr/>
    </div>
    
    @include('pengunjung/page/pemerintahan_desa/submenu')
</div>

@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Organization Chart Plugin</title>
  <link rel="icon" href="img/logo.png">
  <link rel="stylesheet" href="css/jquery.orgchart.css">
  <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
    #ul-data { display: inline-block; width: 40%; vertical-align: top; }
    #chart-container { display: inline-block; width: 50%; }
    #ul-data li { font-size: 1.5rem; }
  </style>
</head>
<body>
  <ul id="ul-data">
    <li>Lao Lao
      <ul>
        <li>Bo Miao</li>
        <li>Su Miao
          <ul>
            <li>Tie Hua</li>
            <li>Hei Hei
              <ul>
                <li>Pang Pang</li>
                <li>Xiang Xiang</li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
  <div id="chart-container"></div>

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.orgchart.js"></script>
  <script type="text/javascript">
    $(function() {

      $('#chart-container').orgchart({
        'data' : $('#ul-data')
      });

    });
  </script>
  </body>
</html> --}}