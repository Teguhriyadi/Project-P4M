<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/page/admin/dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>{{ $profil ? $profil->nama_desa : 'Anonymous' }}</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{{ $profil ? $profil->nama_desa : 'Anonymous' }}</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="{{ url('/backend/template') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        @if (empty(auth()->user()->gambar))
                        <img src="{{ url('gambar/gambar_user.png') }}" class="user-image" alt="User Image">
                        @else
                        <img src="{{ url('storage/'.auth()->user()->gambar) }}" class="user-image" alt="User Image">
                        @endif
                        <span class="hidden-xs">{{ auth()->user() ? auth()->user()->name : '' }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            @if (empty(auth()->user()->gambar))
                            <img src="{{ url('gambar/gambar_user.png') }}" class="img-circle" alt="User Image">
                            @else
                            <img src="{{ url('storage/'.auth()->user()->gambar) }}" class="img-circle" alt="User Image">
                            @endif
                            <p>
                                {{ auth()->user() ? auth()->user()->name : '' }} - {{ auth()->user() ? auth()->user()->getHakAkses->nama_hak_akses : '' }}
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="">
                                <a href="{{ url('/page/admin/logout') }}" class="btn btn-danger btn-flat btn-block">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
