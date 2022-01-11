<style>
    .slimScrollBar {
        background: #3c8dbc !important;
        opacity: .7 !important;
    }
</style>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('gambar/gambar_user.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p class="text-capitalize">{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <li>
                <a href="{{ url('/page/admin/dashboard') }}">
                    <i class="fa fa-tachometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>Info Desa</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/info/profil') }}">
                            <i class="fa fa-circle-o"></i> Profil Desa
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/info/administratif') }}">
                            <i class="fa fa-circle-o"></i> Wilayah Administratif
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-archive"></i> <span>Data Desa</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/data/pendidikan') }}">
                            <i class="fa fa-circle-o"></i> Data Pendidikan
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/data/pekerjaan') }}">
                            <i class="fa fa-circle-o"></i> Data Pekerjaan
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/data/agama') }}">
                            <i class="fa fa-circle-o"></i> Data Agama
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/data/jenis-kelamin') }}">
                            <i class="fa fa-circle-o"></i> Data Jenis Kelamin
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/data/warga-negara') }}">
                            <i class="fa fa-circle-o"></i> Data Warga Negara
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-balance-scale "></i> <span>Pemerintahan Desa</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/pemerintahan/jabatan') }}">
                            <i class="fa fa-circle-o"></i> Jabatan
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/pemerintahan/pegawai') }}">
                            <i class="fa fa-circle-o"></i> Pegawai
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/pemerintahan/struktur_pemerintahan') }}">
                            <i class="fa fa-circle-o"></i> Struktur Pemerintahan
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Kependudukan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/kependudukan/penduduk') }}">
                            <i class="fa fa-circle-o"></i> Penduduk
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Layanan Surat</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/surat/pengaturan') }}">
                            <i class="fa fa-circle-o"></i> Pengaturan Surat
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/surat/permohonan') }}">
                            <i class="fa fa-circle-o"></i> Permohonan Surat
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/surat/arsip') }}">
                            <i class="fa fa-circle-o"></i> Arsip Surat
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-institution"></i> <span>Sumber Daya</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/sumber/alam') }}">
                            <i class="fa fa-circle-o"></i> Sumber Daya Alam
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/sumber/manusia') }}">
                            <i class="fa fa-circle-o"></i> Sumber Daya Manusia
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/sumber/kelembagaan') }}">
                            <i class="fa fa-circle-o"></i> Sumber Daya Kelembagaan
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-map-signs"></i> <span>Sarana Prasarana</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/sarana/pendidikan') }}">
                            <i class="fa fa-circle-o"></i> Sarana Pendidikan
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/sarana/keagamaan') }}">
                            <i class="fa fa-circle-o"></i> Sarana Keagamaan
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/sarana/tempat-usaha') }}">
                            <i class="fa fa-circle-o"></i> Sarana Tempat Usaha
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/sarana/olahraga') }}">
                            <i class="fa fa-circle-o"></i> Sarana Olahraga
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-map"></i> <span>Pemetaan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/peta/desa') }}">
                            <i class="fa fa-circle-o"></i> Peta Desa
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/peta/kantor') }}">
                            <i class="fa fa-circle-o"></i> Peta Kantor Desa
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-desktop"></i> <span>Admin WEB</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/web/kategori') }}">
                            <i class="fa fa-circle-o"></i> Kategori
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/web/artikel') }}">
                            <i class="fa fa-circle-o"></i> Artikel
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/web/komentar') }}">
                            <i class="fa fa-circle-o"></i> Komentar
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/web/galeri') }}">
                            <i class="fa fa-circle-o"></i> Galeri
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/web/slider') }}">
                            <i class="fa fa-circle-o"></i> Slider
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/web/teks-berjalan') }}">
                            <i class="fa fa-circle-o"></i> Teks Berjalan
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/web/pengunjung') }}">
                            <i class="fa fa-circle-o"></i> Pengunjung
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-inbox"></i> <span>Kotak Pesan</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i> <span>Pengaturan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/akun') }}">
                            <i class="fa fa-circle-o"></i> Pengaturan Akun
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/hak_akses') }}">
                            <i class="fa fa-circle-o"></i> Hak Akses
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/terakhir_login') }}">
                            <i class="fa fa-circle-o"></i> Catatan Login
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
