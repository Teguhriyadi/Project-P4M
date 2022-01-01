<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('/backend/template') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p class="text-capitalize">{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
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
                    <i class="fa fa-th"></i> Kategori
                </a>
            </li>
            <li>
                <a href="{{ url('/page/admin/berita/') }}">
                    <i class="fa fa-newspaper-o"></i> Berita
                </a>
            </li>
            <li>
                <a href="{{ url('/page/admin/galeri') }}">
                    <i class="glyphicon glyphicon-picture"></i> Galeri
                </a>
            </li>
            <li class="header">Hubungi Kami</li>
            <li>
                <a href="{{ url('/page/admin/kontak') }}">
                    <i class="fa fa-phone"></i>
                    <span>Kontak</span>
                </a>
            </li>
            <li class="header">Pengaturan</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-home"></i> <span>Pengaturan Desa</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/profil') }}">
                            <i class="fa fa-circle-o"></i> Profil
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/visi_misi') }}">
                            <i class="fa fa-circle-o"></i> Visi & Misi
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/alamat') }}">
                            <i class="fa fa-circle-o"></i> Alamat
                        </a>
                    </li>
                </ul>
            </li>
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
        </ul>
    </section>
</aside>
