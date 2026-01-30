<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert/package/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/selectFX/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('template/vendors/jqvmap/dist/jqvmap.min.css') }}"> -->


    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Tiara"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('beranda') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="">
                        <a href="{{ route('layanan.main') }}" aria-expanded="false"> <i
                                class="menu-icon fa fa-laptop"></i>Layanan Service</a>
                    </li>
                    <li class="">
                        <a href="{{ route('pelanggan.main') }}" aria-expanded="false"> <i
                                class="menu-icon fa fa-table"></i>Pelanggan</a>
                    </li>
                    <li class="">
                        <a href="{{ route('transaksi.main') }}" aria-expanded="false"> <i
                                class="menu-icon fa fa-th"></i>Transaksi Service</a>
                    </li>
                    <!-- 
                    <h3 class="menu-title">Icons</h3>/.menu-title -->

                    <li class="">
                        <a href="{{ route('laporan.main') }}" aria-expanded="false"> <i
                                class="menu-icon fa fa-tasks"></i>Laporan Service</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <h3 class="text-dark align-middle">Sibentor - Tiaraa</h3>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span
                                    class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true"
                            aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>@yield('title1', 'Dashboard')</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb float-end">
                            <li class="active">@yield('title2', 'Dashboard')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="top-card">
                @yield('top-card')
            </div>
            <!--/.col-->

            @yield('content')

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ asset('template/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('sweetalert/package/dist/sweetalert2.all.min.js') }}"></script>
    <!-- <script src="{{ asset('template/vendors/popper.js/dist/umd/popper.min.js') }}"></script> -->
    <!-- <script src="{{ asset('template/assets/js/main.js') }}"></script> -->


    <!-- <script src="{{ asset('template/vendors/chart./js/dist/Chart.bundle.min.js') }}"></script> -->
    <!-- <script src="{{ asset('template/assets/js/dashboard.js') }}"></script> -->
    <!-- <script src="{{ asset('template/assets/js/widgets.js') }}"></script> -->
    <!-- <script src="{{ asset('template/vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script> -->
    <!-- <script src="{{ asset('template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script> -->
    <!-- <script src="{{ asset('template/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script> -->
    @stack('scripts')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "berhasil",
                text: "{{ (session('success')) }}"
            })
        </script>
    @elseif($errors->any())
        <script>
            Swal.fire({
                icon: "warning",
                title: "Gagal",
                text: "{{ $errors->first() }}"
            })
        </script>
    @endif
    <script>
        const hapus = document.querySelectorAll('.konfirmasiHapus')
        hapus.forEach((form) => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: "Apakah kamu yakin",
                    text: "Data tidak akan bisa dipulihkan",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya! Hapus"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        $('#menuToggle').on('click', function (event) {
            $('body').toggleClass('open');
        });
    </script>
    <script>
        (function ($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
</body>

</html>