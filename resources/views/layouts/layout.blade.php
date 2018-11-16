<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('theme.head')
  </head>
  <body>
    <header>
      @include('theme.header')
      @include('theme.sidebar')
    </header>

    @section('content')
    <div class="">
      @yield('content')
    </div>
    @endsection

    <footer>
          @include('theme.footer')
    </footer>

  </body>
</html>
