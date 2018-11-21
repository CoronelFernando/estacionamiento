<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('theme.head')
  </head>
  <body>
    <header>
      @include('theme.header')
      <div id="alerta"></div>
    </header>

    <div class="col-sm-2">
      @include('theme.sidebar')
    </div>
    <div class="col-sm-10">
      <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
      @section('content')
        @yield('content')
    </div>

    <footer>
          @include('theme.footer')
    </footer>

  </body>
</html>
