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
            <li class="header">Home</li>
            <li>
                <a href="{{ url('/page/admin/dashboard') }}">
                    <i class="fa fa-book"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header">Menu</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bars"></i> <span>Daftar Menu</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('/page/admin/kategori/') }}">
                            <i class="fa fa-circle-o"></i> Kategori
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/blog/') }}">
                            <i class="fa fa-circle-o"></i> Berita
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/page/admin/galeri') }}">
                            <i class="fa fa-circle-o"></i> Galeri
                        </a>
                    </li>
                </ul>
            </li>
            <li class="header">Akun</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>Pengaturan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/page/admin/akun') }}"><i class="fa fa-circle-o"></i> Users </a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
