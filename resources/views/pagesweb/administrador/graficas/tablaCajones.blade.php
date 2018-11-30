<head>
  @include('theme.head')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
  <!--<table id="dtestadisticasCajon" class="table table-striped table-hover table-bordered table-sm nowrap">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
    <caption>Estado de cajones
      <select name="selSecciones" id="selSecciones"  onchange="desplegarCajones(this)">
        <option disabled selected>Seleccione seccion</option>
        <option value="">Todos</option>
        @foreach($secciones as $seccion)
          <option value="{{ $seccion->sec_id }}">{{$seccion->sec_descripcion}}</option>
        @endforeach
      </select>
      <label class="text-left">Seleccione grafica:</label>
      <select name="selGrafica" id="selGrafica" onchange="desplegarGraficas(this)">
        <option disabled selected>Seleccione Grafica</option>
        <!--<option value="1">Todos</option>
        <option value="2">Estadisticas: lugares ocupados/Hora</option>
        <option value="3">Estadisticas: lugares Desocupados/Hora</option>
      </select>
    </caption>
    <thead>
      <tr>
        <th>#</th>
        <th>Cajón</th>
        <th>Sección</th>
        <!--<th>fecha</th>
        <th>hora</th>
        <th>Disponibilidad</th>
        <th>Apartar</th>
      </tr>
    </thead>-->
    <tbody id="tbodyEstadisticas"></tbody>
  <!--</table>-->
  <script type="text/javascript" src="js/global.js"></script>
  <script type="text/javascript" src="js/global/estadisticas.js"></script>
  <script type="text/javascript">
    loadDocument();
  </script>
</body>
