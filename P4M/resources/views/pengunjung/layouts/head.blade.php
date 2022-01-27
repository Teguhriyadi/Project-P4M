<header id="header">

    <div class="row" style="margin-bottom:3px; margin-top:5px;">
        <div class="col-lg-12 col-md-12">
            <div class="header_top">
                <div class="header_top_left"style="margin-bottom:0px;">
                    <ul class="top_nav">
                        <li>
                            <table>
                                <tr>
                                    <td class="hidden-xs">
                                        <img class="" src="{{ $profil ? url('/storage/'.$profil->gambar) : url('/frontend/img/logo-desa.png') }}" width="30" valign="top" alt="Arahan Lor"/>
                                    </td>
                                    <td>
                                        <a href="">
                                            <font size="4">{{ $profil ? 'Desa '.$profil->nama_desa : 'Anonymous' }}</font><br />
                                            <font size="2">{{ $profil ? 'Kec. '.$profil->kecamatan : 'Anonymous' }} {{ $profil ? 'Kab. '.$profil->kabupaten : 'Anonymous' }} {{ $profil ? 'Prov. '.$profil->provinsi : 'Anonymous' }}</font>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </li>
                    </ul>
                </div>
                <div class="navbar-right" style="margin-right: 0px; margin-top: 15px; margin-bottom: 3px;">
                    <form method="post" action="{{ url('/artikel/cari') }}" class="form-inline">
                        @csrf
                        <table align="center">
                            <tr>
                                <td>
                                    @if (Request::is('artikel'))
                                    <input type="text" name="cari" maxlength="50" class="form-control" value="" placeholder="Cari Artikel" onkeyup="search()" id="cari">
                                    @else
                                    <input type="text" name="cari" maxlength="50" class="form-control" value="" placeholder="Cari Artikel" id="cari">
                                    @endif
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
