<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  {{--  Script pdf --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <title>@yield('title')</title>
</head>
<body>

  <style>
  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
  </style>


  {{-- Header --}}
  <header>
    <nav>
      <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href=""><i class="material-icons left">home</i>Inicio</a></li>
          <li><a href="{{route('producto.index')}}"><i class="material-icons left">grid_on</i>Dashboard</a></li>
          <li><a href="{{route('reportes.index')}}"><i class="material-icons left">grid_on</i>Reportes</a></li>
        </ul>
      </div>
    </nav>
  </header>
  {{-- Main --}}
  <main>
    @yield('content')
  </main>
  {{-- Footer --}}
  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
      © Derechos by Raul U! 
      {{-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a> --}}
      </div>
    </div>
  </footer>

  <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
  <script src="{{asset('js/materialize.min.js')}}"></script>

  @stack('scripts')

  <script>
    // $(document).ready(function(){
    //   $('.sidenav').sidenav();
    // });
  </script>
</body>
</html>