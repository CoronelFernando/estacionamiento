<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('theme.head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>
  <body>
    <header class="row" style="width:100%">
      @include('theme.header')
      <div id="alerta"></div>
    </header>

    <div class="col-sm-2" style="height:600px;  background-color: #5c636e;">
      @include('theme.sidebar')
    </div>
    <div class="col-sm-10">
      <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
      @section('content')
        @yield('content')
    </div>

    <footer class="row" style="width:100%">
          @include('theme.footer')
    </footer>

  </body>
</html>
