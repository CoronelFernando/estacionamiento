//TABLA
//var tHead = document.getElementById('dtHistorial').children[0]; var tBody = document.getElementById('dtHistorial').children[1];
//SELECTS
var selSearchSeccion = document.getElementById('selSearchSeccion'); var selSearchCajon = document.getElementById('selSearchCajon');
var selSearchStatus = document.getElementById('selSearchStatus');
/*loadDocument();

function loadDocument(){
var refreshId =  setInterval( function(){
     dtHisAnt = $('#dtHistorialCajon').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ url('antivirus-historial/list') }}",
      columns: [
          {data: 'estCaj_cajon_id'},
          {data: 'estCaj_cajon_id'},
          {data: 'antivirus_paquete'},
          {data: 'antivirus_serial'},
          {data: 'antivirus_fecini'},
          {data: 'antivirus_fecfin'},
          {data: 'antivirus_dias_restantes'},
          {data: 'cliente_descripcion'}
      ]
  });
  }, 36000);
}*/

$(document).ready(function() {
    dtHisAnt = $('#dtHistorialCajon').DataTable({
      processing: true,
      serverSide: true,
      method: "GET",
      ajax: "historial/list",
      columns: [
          {data: 'estCaj_cajon_id',},
          {data: 'sec_descripcion'},
          {data: 'estCaj_disponible'},
          {data: 'estCaj_fechaFin'},
          {data: 'estCaj_horaFin'},
          {data: 'estCaj_disponible'}
      ]
  });
});

//desplegarHistorial(1);

function desplegarHistorial(page){
  var formData = new FormData();
  formData.append('_token', token);

  formData.append('page', page);
  if(selSearchCajon.value != 'Seleccione cajón') formData.append('cajon', selSearchCajon.value);
  else formData.append('cajon', "");
  if(selSearchSeccion.value != 'Seleccione Sección') formData.append('seccion', selSearchSeccion.value);
  else formData.append('seccion', "");
  formData.append('status', selSearchStatus.value);


  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'historial/allHistorial');
  xhr.addEventListener('load', function(){
    var jsonData = JSON.parse(xhr.responseText);
    console.log(jsonData);
    fillTabla(jsonData);
    if(selSearchCajon.value == '') selSearchCajon.selectedIndex = 0;
    if(selSearchSeccion.value == '') selSearchSeccion.selectedIndex = 0;
    if(selSearchStatus.value == '') selSearchStatus.selectedIndex = 0;
  });
  xhr.send(formData);
}

function fillTabla(jsonData){
  tBody.innerHTML = "";
  if(jsonData.length > 0){
    for(var i = 0; i < jsonData.length; i++){
      var tr = document.createElement('tr');
      var tdId = document.createElement('td');
      tdId.textContent = jsonData[i].estCaj_id;
      tr.appendChild(tdId);
      var tdDes = document.createElement('td');
      tdDes.textContent = jsonData[i].caj_descripcion;
      tr.appendChild(tdDes);
      var tdSec = document.createElement('td');
      tdSec.textContent = jsonData[i].sec_descripcion;
      tr.appendChild(tdSec);
      var tdEst = document.createElement('td');
      if(jsonData[i].est_id == 1){
        tdEst.innerHTML = '<label class = "text-success">' + jsonData[i].est_descripcion + '</label>';
        //tdEst.classList.add('text-success');
      }else if(jsonData[i].est_id == 2){
        tdEst.textContent = jsonData[i].est_descripcion;
        tdEst.innerHTML = '<label class = "text-danger">' + jsonData[i].est_descripcion + '</label>';
      }
      else if(jsonData[i].est_id == 3){
        tdEst.textContent = jsonData[i].est_descripcion;
        tdEst.innerHTML = '<label class = "text-warning">' + jsonData[i].est_descripcion + '</label>';
      }
      tr.appendChild(tdEst);
      var tdHora = document.createElement('td');
      tdHora.textContent = jsonData[i].estCaj_hora;
      tr.appendChild(tdHora);
      var tdFecha = document.createElement('td');
      tdFecha.textContent = jsonData[i].estCaj_fecha;
      tr.appendChild(tdFecha);

      //var tdSel = document.createElement('td');
      //tdSel.textContent = "aqui ira una imagen para seleccionar";
      //tr.appendChild(tdSel);
      tBody.appendChild(tr);
    }

  }
}

  function validarSelects(select){
    var selects = document.getElementsByTagName('select');
    for(var i = 0; i< selects.length; i++){
        if(selects[i].id != select.id) selects[i].value = '';
    }
  }
