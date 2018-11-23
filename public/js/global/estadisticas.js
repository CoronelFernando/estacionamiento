var theadEstCaj = document.getElementById('dtestadisticasCajon').children[1];
var tbodyEstCaj = document.getElementById('dtestadisticasCajon').children[2];
var barraLlena = document.getElementById('barraLlena');
var barraVacia = document.getElementById('barraVacia');

function loadDocument(){
  desplegarCajones();
}

function desplegarCajones(select){
  var formData = new FormData();
  if(select != undefined) formData.append('seccion', select.value);
  else formData.append('seccion', "");
  formData.append('status', 1);
  formData.append('_token', token);

  xhr = new XMLHttpRequest();
  xhr.open('POST', "estadisticas/DesplegarCajones");
  xhr.addEventListener('load', function(){
    var jsonData = JSON.parse(xhr.responseText);
    console.log(xhr.responseText);

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
      if(jsonData[i].est_id = 1){
        tdEst.innerHTML = '<label class = "text-success">' + jsonData[i].est_descripcion + '</label>';
        //tdEst.classList.add('text-success');
      }else if(jsonData[i].est_id = 2){
        tdEst.textContent = jsonData[i].est_descripcion;
        tdEst.innerHTML = '<label class = "text-error">' + jsonData[i].est_descripcion + '</label>';
      }
      else if(jsonData[i].est_id = 3){
        tdEst.textContent = jsonData[i].est_descripcion;
        tdEst.innerHTML = '<label class = "text-warning">' + jsonData[i].est_descripcion + '</label>';
      }
      tr.appendChild(tdEst);
      var tdSel = document.createElement('td');
      tdSel.textContent = "aqui ira una imagen para seleccionar";
      tr.appendChild(tdSel);
      tbodyEstCaj.appendChild(tr);
    }

  }
}
//@element recibe como parametro una opcion de un select
function desplegarGraficas(element){
  if(element != undefined){
    if(element.vaue == 1)
    barraLlena.setAttribute('visible', 'visible');
    barraVacia.setAttribute('visible', 'visible');
  }else if(element.vaue == 2) {
    barraLlena.setAttribute('visible', 'visible');
    barraVacia.setAttribute('visible', 'hidden');
  }else if(element.vaue == 3) {
    barraLlena.setAttribute('visible', 'hidden');
    barraVacia.setAttribute('visible', 'visible');
  }
}
