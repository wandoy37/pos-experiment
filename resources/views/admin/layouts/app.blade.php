<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POST Experiment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    {{-- Fontawesome --}}
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    {{-- SweetAlert --}}
    <link rel='stylesheet' href='{{ asset('assets/sweetalert/sweetalert2.min.css') }}'>

  </head>
  <body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">POS Experiment</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item me-4">
                    <a class="nav-link active" href="{{ route('dashboard') }}">Dashboaord</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link" href="{{ route('product') }}">Products</a>
                </li>
                </ul>
                <div class="d-flex">
                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                        @csrf
                    </form>
                    <button class="btn btn-outline-primary" type="submit" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
                </div>
            </div>
        </div>
      </nav>
    {{-- /navbar --}}

    {{-- content --}}
    @yield('content')
    {{-- /content --}}


    {{-- SweetAlert --}}
    <script src="{{ asset('assets/sweetalert/sweetalert2.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    @stack('scripts')
  </body>
</html>
