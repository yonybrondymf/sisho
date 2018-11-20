<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('images/icon.png')}}">

    <title>Sistema de Horneado</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert.css') }}">
    <style>
        body{
            padding-top: 70px;
        }

    </style>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">SISHO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item {{ Request::is('clientes/create') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('clientes.create') }}">Registrar Asados</a>
          </li>
          <li class="nav-item {{ Request::is('asados') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('asados.index') }}">Listado de  Asados</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">

        @yield('content')
    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
    
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert.js') }}"></script>
    <script>
        var base_url = "{{ url('/') }}";
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>
