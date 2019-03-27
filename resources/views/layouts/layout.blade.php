<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('theme.head')
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
  </head>
  <body>
    <header>
      @include('theme.header')
      <div id="alerta"></div>
    </header>

      <div style="float: left;">
        @include('theme.sidebar')
      </div>

      <div>
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
          @section('content')
          @yield('content')
      </div>
      <footer>
          @include('theme.footer')
      </footer>

  </body>
</html>
