<style>
    .slimScrollBar {
        background: gray !important;
        opacity: .5 !important;
    }
    .skin-green .sidebar-menu>li.active>a {
        border-left-color: #008d4c;
    }
    .skin-green .sidebar-menu>li>.treeview-menu {
        padding-left: 0;
        margin-right: 0;
    }
    .skin-green .sidebar-menu>li>.treeview-menu>li.active>i {
        padding-left: 100px;
    }
    .skin-green .sidebar-menu>li>.treeview-menu>li.active {
        background-color: #008d4c;
    }
    .skin-green .sidebar-menu>li>.treeview-menu>li a {
        margin-left: 3px;
    }
</style>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('gambar/gambar_user.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p class="text-capitalize">{{ Auth::user() ? Auth::user()->name : '' }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <li class="{{ Request::is('page/admin/dashboard') ? 'active' : '' }}">
                <a href="{{ url('/page/admin/dashboard') }}">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="treeview {{ Request::segment(3)=='info' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>Info Desa</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('page/admin/info/profil') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/info/profil') }}">
                            <i class="fa fa-circle-o"></i> Profil Desa
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/info/visi-misi') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/info/visi-misi') }}">
                            <i class="fa fa-circle-o"></i> Visi Misi
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/info/sejarah-desa') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/info/sejarah-desa') }}">
                            <i class="fa fa-circle-o"></i> Sejarah Desa
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/info/geografis') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/info/geografis') }}">
                            <i class="fa fa-circle-o"></i> Letak Geografis
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/info/wilayah_geografis') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/info/wilayah_geografis') }}">
                            <i class="fa fa-circle-o"></i> Wilayah Geografis
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ Request::segment(3)=='data' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-archive"></i> <span>Data Desa</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('page/admin/data/dusun') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/data/dusun') }}">
                            <i class="fa fa-circle-o"></i> Data Dusun
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/data/rw') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/data/rw') }}">
                            <i class="fa fa-circle-o"></i> Data RW
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/data/rt') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/data/rt') }}">
                            <i class="fa fa-circle-o"></i> Data RT
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/data/pendidikan') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/data/pendidikan') }}">
                            <i class="fa fa-circle-o"></i> Data Pendidikan
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/data/pekerjaan') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/data/pekerjaan') }}">
                            <i class="fa fa-circle-o"></i> Data Pekerjaan
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/data/agama') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/data/agama') }}">
                            <i class="fa fa-circle-o"></i> Data Agama
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/data/jenis-kelamin') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/data/jenis-kelamin') }}">
                            <i class="fa fa-circle-o"></i> Data Jenis Kelamin
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/data/warga-negara') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/data/warga-negara') }}">
                            <i class="fa fa-circle-o"></i> Data Warga Negara
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/data/golongan-darah') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/data/golongan-darah') }}">
                            <i class="fa fa-circle-o"></i> Data Golongan Darah
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/data/cacat') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/data/cacat') }}">
                            <i class="fa fa-circle-o"></i> Data Cacat
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/data/sakit-menahun') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/data/sakit-menahun') }}">
                            <i class="fa fa-circle-o"></i> Data Sakit Menahun
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ Request::segment(3)=='kependudukan' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Kependudukan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::segment(4)=='penduduk' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/kependudukan/penduduk') }}">
                            <i class="fa fa-circle-o"></i> Penduduk
                        </a>
                    </li>
                    <li class="{{ Request::segment(4)=='keluarga' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/kependudukan/keluarga') }}">
                            <i class="fa fa-circle-o"></i> Keluarga
                        </a>
                    </li>
                    <li class="{{ Request::segment(4)=='rtm' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/kependudukan/rtm') }}">
                            <i class="fa fa-circle-o"></i> Rumah Tangga
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ Request::segment(3)=='pemerintahan' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-balance-scale "></i> <span>Pemerintahan Desa</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::segment(4)=='jabatan' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/pemerintahan/jabatan') }}">
                            <i class="fa fa-circle-o"></i> Jabatan
                        </a>
                    </li>
                    <li class="{{ Request::segment(4)=='pegawai' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/pemerintahan/pegawai') }}">
                            <i class="fa fa-circle-o"></i> Pegawai
                        </a>
                    </li>
                    <li class="{{ Request::segment(4)=='struktur_pemerintahan' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/pemerintahan/struktur_pemerintahan') }}">
                            <i class="fa fa-circle-o"></i> Struktur Pemerintahan
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ Request::segment(3)=='surat' || Request::segment(3)=='cetak_surat' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Layanan Surat</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::segment(4)=='klasifikasi' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/surat/klasifikasi') }}">
                            <i class="fa fa-circle-o"></i> Klasifikasi Surat
                        </a>
                    </li>
                    <li class="{{ Request::segment(4)=='ref_syarat' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/surat/ref_syarat') }}">
                            <i class="fa fa-circle-o"></i> Referensi Syarat Surat
                        </a>
                    </li>
                    <li class="{{ Request::segment(4)=='format' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/surat/format') }}">
                            <i class="fa fa-circle-o"></i> Format Surat
                        </a>
                    </li>
                    <li class="{{ Request::segment(4)=='permohonan' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/surat/permohonan') }}">
                            <i class="fa fa-circle-o"></i> Permohonan Surat
                        </a>
                    </li>
                    <li class="{{ Request::segment(4)=='masuk' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/surat/masuk') }}">
                            <i class="fa fa-circle-o"></i> Surat Masuk
                        </a>
                    </li>
                    <li class="{{ Request::segment(4)=='keluar' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/surat/keluar') }}">
                            <i class="fa fa-circle-o"></i> Surat Keluar
                        </a>
                    </li>
                    <li class="{{ Request::segment(3)=='cetak_surat' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/cetak_surat') }}">
                            <i class="fa fa-circle-o"></i> Cetak Surat
                        </a>
                    </li>
                    <li class="{{ Request::segment(4)=='arsip' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/surat/arsip') }}">
                            <i class="fa fa-circle-o"></i> Arsip Surat
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ Request::segment(3)=='sumber' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-institution"></i> <span>Sumber Daya</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('page/admin/sumber/alam') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/sumber/alam') }}">
                            <i class="fa fa-circle-o"></i> Sumber Daya Alam
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/sumber/manusia') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/sumber/manusia') }}">
                            <i class="fa fa-circle-o"></i> Sumber Daya Manusia
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/sumber/kelembagaan') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/sumber/kelembagaan') }}">
                            <i class="fa fa-circle-o"></i> Sumber Daya Kelembagaan
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ Request::segment(3)=='sarana' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-map-signs"></i> <span>Sarana Prasarana</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('page/admin/sarana/pendidikan') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/sarana/pendidikan') }}">
                            <i class="fa fa-circle-o"></i> Sarana Pendidikan
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/sarana/keagamaan') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/sarana/keagamaan') }}">
                            <i class="fa fa-circle-o"></i> Sarana Keagamaan
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/sarana/tempat-usaha') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/sarana/tempat-usaha') }}">
                            <i class="fa fa-circle-o"></i> Sarana Tempat Usaha
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/sarana/olahraga') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/sarana/olahraga') }}">
                            <i class="fa fa-circle-o"></i> Sarana Olahraga
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ Request::segment(3)=='peta' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-map"></i> <span>Pemetaan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('page/admin/peta/desa') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/peta/desa') }}">
                            <i class="fa fa-circle-o"></i> Peta Desa
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/peta/kantor') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/peta/kantor') }}">
                            <i class="fa fa-circle-o"></i> Peta Kantor Desa
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ Request::segment(3)=='web' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-desktop"></i> <span>Admin WEB</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::segment(4)=='kategori' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/web/kategori') }}">
                            <i class="fa fa-circle-o"></i> Kategori
                        </a>
                    </li>
                    <li class="{{ Request::segment(4) == 'artikel' ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/web/artikel') }}">
                            <i class="fa fa-circle-o"></i> Artikel
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/web/galeri') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/web/galeri') }}">
                            <i class="fa fa-circle-o"></i> Galeri
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/web/pengunjung') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/web/pengunjung') }}">
                            <i class="fa fa-circle-o"></i> Pengunjung
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('page/admin/kotak-pesan') ? 'active' : '' }}">
                <a href="{{ url('/page/admin/kotak-pesan') }}">
                    <i class="fa fa-inbox"></i> <span>Kotak Pesan</span>
                </a>
            </li>
            <li class="{{ Request::is('page/admin/program_bantuan') ? 'active' : '' }}">
                <a href="{{ url('/page/admin/program_bantuan') }}">
                    <i class="fa fa-heart"></i> <span>Bantuan</span>
                </a>
            </li>
            @can("admin")
            <li class="treeview {{ Request::segment(3)=='pengaturan' ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Pengaturan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('page/admin/pengaturan/akun') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/pengaturan/akun') }}">
                            <i class="fa fa-circle-o"></i> Pengaturan Akun
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/pengaturan/hak_akses') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/pengaturan/hak_akses') }}">
                            <i class="fa fa-circle-o"></i> Hak Akses
                        </a>
                    </li>
                    <li class="{{ Request::is('page/admin/pengaturan/terakhir_login') ? 'active' : '' }}">
                        <a href="{{ url('/page/admin/pengaturan/terakhir_login') }}">
                            <i class="fa fa-circle-o"></i> Catatan Login
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
        </ul>
    </section>
</aside>
