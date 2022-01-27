<div id="navarea">

    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="row visible-xs">
                    <div class="col-xs-6 visible-xs">
                        <img src="{{ url('/frontend/img/logo-desa.png') }}" class="cardz hidden-lg hidden-md" width="30" align="left" alt="Arahan Lor"/>
                    </div>
                    <div class="col-xs-6 visible-xs">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav custom_nav">
                    <li class=""><a href="{{ url('') }}/">Beranda</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="{{ url('') }}#">
                            Profil Desa <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('') }}/profil/sejarah-desa">Sejarah Desa</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}/profil/wilayah-desa">Profil Wilayah Desa</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="{{ url('') }}#">Pemerintahan Desa<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('') }}/pemerintahan/visi-misi">Visi dan Misi</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}/pemerintahan/struktur-organisasi">Struktur Organisasi</a>
                            </li>
                        </ul>
                    </li>
                    <li class=""><a href="{{ url('') }}/kependudukan">Kependudukan</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="{{ url('') }}#">Data Desa<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('') }}/data/wilayah-administratif">Data Wilayah Administratif</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}/data/pendidikan">Data Pendidikan</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}/data/pekerjaan">Data Pekerjaan</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}/data/agama">Data Agama</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}/data/jenis-kelamin">Data Jenis Kelamin</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}/data/warga-negara">Data Warga Negara</a>
                            </li>
                        </ul>
                    </li>
                    <li class=""><a href="{{ url('') }}/artikel">Artikel</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="{{ url('') }}#">Sarana/Prasarana<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('') }}/sarpras/pendidikan">Sarpras Pendidikan</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}/sarpras/agama">Sarpras Agama</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}/sarpras/tempat-usaha">Sarpras Tempat Usaha</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}/sarpras/olahraga">Sarpras Olahraga</a>
                            </li>
                        </ul>
                    </li>
                    <li class=""><a href="{{ url('') }}/surat">Permohonan Surat</a></li>
                    <li class=""><a href="{{ url('') }}/galeri">Galeri</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
