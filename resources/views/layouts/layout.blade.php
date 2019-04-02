<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('theme.head')
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
  </head>
  <body id="page-top">
      @include('theme.header')
      <div id="alerta"></div>
        <div style="float: left">
          @include('theme.sidebar')
          </div>
          
          <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            @section('content')
            @yield('content')
          <footer class="sticky-footer">
            @include('theme.footer')
          </footer>
        
      </div>
  </body>
</html>
