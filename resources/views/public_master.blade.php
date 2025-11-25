<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChocoTaboada | Tienda</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{ url('/') }}" class="navbar-brand">
        <span class="brand-text font-weight-light">ChocoTaboada</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">Inicio</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('shop.cart') }}" class="nav-link">
              <i class="fas fa-shopping-cart"></i> Carrito
              <span class="badge badge-warning navbar-badge">{{ count((array) session('cart')) }}</span>
            </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-sm ml-2">Zona Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="content">
      <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        
        @yield('content')
        
      </div>
    </div>
    </div>
  <footer class="main-footer">
    <div class="container">
        <div class="float-right d-none d-sm-inline">
          Sabor Artesanal
        </div>
        <strong>Copyright &copy; 2025 <a href="#">ChocoTaboada</a>.</strong> All rights reserved.
    </div>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>