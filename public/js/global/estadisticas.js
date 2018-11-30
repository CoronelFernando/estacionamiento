var theadEstCaj = document.getElementById('dtestadisticasCajon').children[1];
var tbodyEstCaj = document.getElementById('dtestadisticasCajon').children[2];
var barraLlena = document.getElementById('barraLlena'); var barraVacia = document.getElementById('barraVacia');
barraLlena.style.display = 'none'; //barraVacia.style.display = 'none';
var selectGrafica = document.getElementById('selGrafica');

function loadDocument(){
  desplegarCajones();
  var refreshId =  setInterval( function(){
    //if(selectGrafica.value == 2)
    $('#barraLlena').load('estadisticas/autosPorHora');//actualizas el div
    //if(selectGrafica.value == 3)
    $('#barraVacia').load('estadisticas/vaciosPorHora');//actualizas el div
    //$('#tbodyEstadisticas').load('estadisticas/tablaCajones');
  }, 5000 );
    window.setInterval("desplegarCajones()", 5000);
}

function desplegarCajones(select){
  var formData = new FormData();
  if(select != undefined) formData.append('seccion', select.value);
  else formData.append('seccion', "");
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
      barraVacia.style.display = 'block';
    }else if(element.value == 2) {
      barraLlena.style.display = 'block';
      barraVacia.style.display = 'none';
    }else if(element.value == 3) {
      barraLlena.style.display = 'none';
      barraVacia.style.display = 'block';
    }
  }
}

/*function Carga(url,id){
var objeto = new XMLHttpRequest();
objeto.onreadystatechange=function()
{
cargarobjeto(objeto,id)
}
objeto.open('GET', 'estadisticas/autosPorHora', true)
objeto.send(null)
}

function cargarobjeto(objeto, id)
{
if (objeto.readyState == 4)
document.getElementById(id).innerHTML=objeto.responseText
else
document.getElementById(id).innerHTML='load';
}*/
