<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChocoTaboada | Tienda</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <span class="brand-text font-weight-light">ChocoTaboada</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('shop.cart') }}" class="nav-link">Carrito <span
                                    class="badge badge-warning">{{ count((array) session('cart')) }}</span></a>
                            <!-- Content Wrapper. Contains page content -->
                            <div class="content-wrapper">
                                <!-- Main content -->
                                <div class="content">
                                    <div class="container mt-4">
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        @yield('content')
                                    </div>
                                </div>
                                <!-- /.content -->
                            </div>
                            <!-- /.content-wrapper -->

                            <!-- Main Footer -->
                            <footer class="main-footer">
                                <!-- To the right -->
                                <div class="float-right d-none d-sm-inline">
                                    Sabor Artesanal
                                </div>
                                <!-- Default to the left -->
                                <strong>Copyright &copy; 2025 <a href="#">ChocoTaboada</a>.</strong> All rights
                                reserved.
                            </footer>
                </div>
                <!-- ./wrapper -->

                <!-- jQuery -->
                <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
                <!-- Bootstrap 4 -->
                <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                <!-- AdminLTE App -->
                <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>

</html>