<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Desa Arahan Lor</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('admin/layouts/partials/css/style2')

    @yield('page_css')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('admin/layouts/partials/navbar/nav_header')

        <!-- Left side column. contains the sidebar -->
        @include('admin/layouts/partials/navbar/nav_sidebar')

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @yield("page_content")

        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2021-{{ date('Y') }} <a href="./">Arahan Lor</a>.</strong> All rights
            reserved.
        </footer>

        <div class="control-sidebar-bg"></div>

    </div>

    @include('admin/layouts/partials/js/style2')

    @yield('page_scripts')

</body>
</html>
