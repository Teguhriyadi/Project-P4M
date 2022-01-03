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
            <li class="header">Dashboard</li>
            <li>
                <a href="{{ url('/page/admin/dashboard') }}">
                    <i class="fa fa-tachometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header">Daftar Menu</li>
            <li>
                <a href="{{ url('/page/admin/kategori/') }}">
                    <i class="fa fa-th"></i> <span>Kategori</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/page/admin/berita/') }}">
                    <i class="fa fa-newspaper-o"></i> <span>Berita</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/page/admin/galeri') }}">
                    <i class="glyphicon glyphicon-picture"></i> <span>Galeri</span>
                </a>
            </li>
            <li class="header">Penduduk</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Data Penduduk</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/rt_rw') }}">
                            <i class="fa fa-circle-o"></i> Data RT / RW
                        </a>
                    </li>
                </ul>
            </li>
            <li class="header">Pengaturan</li>
            <li>
                <a href="{{ url('/page/admin/tahun') }}">
                    <i class="fa fa-users"></i> <span>Tahun</span>
                </a>
            </li>
            <li class="header">Petugas</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle"></i> <span>Data Petugas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/jabatan') }}">
                            <i class="fa fa-circle-o"></i> Jabatan
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/pegawai') }}">
                            <i class="fa fa-circle-o"></i> Pegawai
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/struktur_pemerintahan') }}">
                            <i class="fa fa-circle-o"></i> Struktur Pemerintahan
                        </a>
                    </li>
                </ul>
            </li>
            <li class="header">Hubungi Kami</li>
            <li>
                <a href="{{ url('/page/admin/kontak') }}">
                    <i class="fa fa-phone"></i>
                    <span>Kontak</span>
                </a>
            </li>
            <li class="header">Pengaturan</li>
            <li>
                <a href="{{ url('/page/admin/profil') }}">
                    <i class="fa fa-home"></i>
                    <span>Pengaturan Desa</span>
                </a>
            </li>
            @can("admin")
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle"></i> <span>Pengaturan Akun</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/akun') }}">
                            <i class="fa fa-circle-o"></i> Users
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/terakhir_login') }}">
                            <i class="fa fa-circle-o"></i> Terakhir Login
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/hak_akses') }}">
                            <i class="fa fa-circle-o"></i> Hak Akses
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
        </ul>
    </section>
</aside>
