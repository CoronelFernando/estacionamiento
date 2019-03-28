//TABLA
var theadEstCaj = document.getElementById('dtestadisticasCajon').children[1]; var tbodyEstCaj = document.getElementById('dtestadisticasCajon').children[2];
var selectGrafica = document.getElementById('selGrafica');
//GRAFICAS
var barraLlena = document.getElementById('barraLlena'); var barraVacia = document.getElementById('barraVacia');
var areaChart = document.getElementById('areaChart');
barraLlena.style.display = 'none'; //barraVacia.style.display = 'none';

var inputSearch = document.getElementById('txtsearchCajon'); var lblOcupadosNumero = document.getElementById('lblOcupadosNumero');
var lblOcupadosHora = document.getElementById('lblOcupadosHora');

function loadDocument(){
  desplegarCajones();
  /*var refreshId =  setInterval( function(){
    //if(selectGrafica.value == 2)
    $('#barraLlena').load('estadisticas/autosPorHora');//actualizas el div
    //if(selectGrafica.value == 3)
    //$('#barraVacia').load('estadisticas/vaciosPorHora');//actualizas el div
    $('#areaChart').load('estadisticas/areaChart');//actualizas el div
    //$('#tbodyEstadisticas').load('estadisticas/tablaCajones');
  }, 5000 );*/
    //window.setInterval("desplegarCajones()", 1000);
    //window.setInterval("desplegarNumeroOcupados()", 1000);
}


function desplegarCajones(select){
  var formData = new FormData();
  if(select != undefined) formData.append('seccion', select.value);
  else formData.append('seccion', "");
  if(inputSearch != '') formData.append('cajon', inputSearch.value);
  else formData.append('cajon', "");
  formData.append('status', "");
  formData.append('_token', token);

  xhr = new XMLHttpRequest();
  xhr.open('POST', "estadisticas/DesplegarCajones");
  xhr.addEventListener('load', function(){
    var jsonData = JSON.parse(xhr.responseText);
    console.log(xhr.responseText);
    if(xhr.readyState == 4)
    fillTabla(jsonData);
  });
  xhr.send(formData);
}

function fillTabla(jsonData){
  tbodyEstCaj.innerHTML = "";
  if(jsonData.length > 0){
    for(var i = 0; i < jsonData.length; i++){
      var tr = document.createElement('tr');
      var tdId = document.createElement('td');
      tdId.textContent = jsonData[i].caj_id;
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
      //var tdSel = document.createElement('td');
      //tdSel.textContent = "aqui ira una imagen para seleccionar";
      //tr.appendChild(tdSel);
      tbodyEstCaj.appendChild(tr);
    }

  }

}
//@element recibe como parametro una opcion de un select
function desplegarGraficas(element){
  if(element != undefined){
    if(element.value == 1){
      barraLlena.style.display = 'block';
      //barraVacia.style.display = 'block';
      areaChart.style.display = 'block';
    }else if(element.value == 2) {
      barraLlena.style.display = 'block';
      //barraVacia.style.display = 'none';
      areaChart.style.display = 'none';
    }else if(element.value == 3) {
      barraLlena.style.display = 'none';
      //barraVacia.style.display = 'block';
      areaChart.style.display = 'block';
    }
  }
}

function desplegarNumeroOcupados(){
  var formData = new FormData();
  formData.append('_token', token);
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'estadisticas/numeroOcupados');
  xhr.addEventListener('load', function(){
    var jsonData = JSON.parse(xhr.responseText);
    lblOcupadosNumero.textContent = '#' + jsonData[0].estCaj_cajon_id;
    lblOcupadosHora.textContent = jsonData[0].estCaj_hora;
  });
  xhr.send(formData);
}
