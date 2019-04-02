obtenerCajones();
window.setInterval("obtenerCajones()", 10000);


function obtenerCajones(){
  var xml = new XMLHttpRequest();
  xml.open('GET', 'home/cajones', true);
  xml.addEventListener('load', function(){
    var jsonData = JSON.parse(xml.responseText);
    estacionamiento1(jsonData);
    //console.log(jsonData);
  });
  xml.send();
}

//estacionamiento1();

function estacionamiento1(jsonData){
  document.getElementById('contenedor').innerHTML = '';
  //Primera oleada de cajones
  var nCajones = 6;
  for (var i = 0; i < nCajones; i++) {
    var lineaAmarilla = lineasAmarillas('0.5%', '100px', 'lineaAmarilla' + i);
    contenedor.appendChild(lineaAmarilla);
    //console.log(jsonData[i]);
    var cajon = cajones('10%','100px', jsonData[i].caj_id, jsonData[i].caj_status_id, 'top');
    contenedor.appendChild(cajon);

    if((nCajones - i) == 1){
      var lineaAmarilla = lineasAmarillas('0.5%', '100px', 'lineaAmarilla' + i);
      contenedor.appendChild(lineaAmarilla);
    }    
  }

  var banqueta = banquetas('4%', '100px', 'banqueta1', 'top');
  contenedor.appendChild(banqueta);
  var calle0 = calles('32.5%', '100px', 'calle0', 'top');
  contenedor.appendChild(calle0);
  //var banqueta2 = banquetas('19.1%', '100px', 'banqueta2', 'top');
  //contenedor.appendChild(banqueta2);  

 //calle central
var calle1 = calles('100%', '80px', 'calle1', 'horizontal');
contenedor.appendChild(calle1);
//var banqueta3 = banquetas('19.1%', '80px', 'banqueta3', 'horizontal');
//contenedor.appendChild(banqueta3);

//segundo bloque de cajones
var ncajones2 = 12;
for (var i = 6; i < ncajones2; i++) {
    var lineaAmarilla = lineasAmarillas('0.5%', '100px', 'lineaAmarilla' + i);
    contenedor.appendChild(lineaAmarilla);

    var cajon = cajones('10%', '100px',jsonData[i].caj_id, jsonData[i].caj_status_id, 'top');
    contenedor.appendChild(cajon);

    if((ncajones2 - i) == 1){
      var lineaAmarilla = lineasAmarillas('0.5%', '100px', 'lineaAmarilla' + i);
      contenedor.appendChild(lineaAmarilla);
    }
  }

  var banqueta4 = banquetas('4%', '100px', 'banqueta4', 'top');
  contenedor.appendChild(banqueta4);
  var calle2 = calles('32.5%', '100px', 'calle', 'top');
  contenedor.appendChild(calle2);
  //var banquetax = banquetas('4.39%', '100px', 'baquetax', 'top');
  //contenedor.appendChild(banquetax);
  /*var banqueta5 = banquetas('49.5%', '28px', 'banqueta5', 'top');
  contenedor.appendChild(banqueta5);
  var calle4 = calles('46%', '28px', 'calle4', 'top');
  contenedor.appendChild(calle4);
  var banquetay = banquetas('4.38%', '28px', 'baquetay', 'top');
  contenedor.appendChild(banquetay);

  //tercera oleada de cajones
  var ncajones2 = 6;
  for (var i = 0; i < ncajones2; i++) {
    var lineaAmarilla = lineasAmarillas('0.5%', '100px', 'lineaAmarilla' + i);
    contenedor.appendChild(lineaAmarilla);

    var cajon = cajones('7%','100px', ('cajon' + i), true, 'bottom');
    contenedor.appendChild(cajon);

    if((ncajones2 - i) == 1){
      var lineaAmarilla = lineasAmarillas('0.5%', '100px', 'lineaAmarilla' + i);
      contenedor.appendChild(lineaAmarilla);
    }
  }

  var banqueta6 = banquetas('4%', '150px', 'banqueta6', 'top');
  contenedor.appendChild(banqueta6);
  var calle5 = calles('46%', '150px', 'calle5', 'top');
  contenedor.appendChild(calle5);
  var banquetaz = banquetas('4.38%', '150px', 'baquetaz', 'top');
  contenedor.appendChild(banquetaz);
 
  
//calle central
var calle7 = calles('80.84%', '120px', 'calle17', 'horizontal');
contenedor.appendChild(calle7);
var banqueta7 = banquetas('19.1%', '120px', 'banqueta7', 'horizontal');
contenedor.appendChild(banqueta7);

//cuarta fila de cajones
 //Primera oleada de cajones
 var nCajones = 6;
 for (var i = 0; i < nCajones; i++) {
   var lineaAmarilla = lineasAmarillas('0.5%', '150px', 'lineaAmarilla' + i);
   contenedor.appendChild(lineaAmarilla);
   
   var cajon = cajones('7%','150px', ('cajon' + i), true, 'top');
   contenedor.appendChild(cajon);

   if((nCajones - i) == 1){
     var lineaAmarilla = lineasAmarillas('0.5%', '150px', 'lineaAmarilla' + i);
     contenedor.appendChild(lineaAmarilla);
   }    
 }

var banqueta10 = banquetas('5.38%', '150px', 'banqueta10', 'top');
 contenedor.appendChild(banqueta10);
 var calle10 = calles('30%', '150px', 'calle10', 'top');
 contenedor.appendChild(calle10);
 var banqueta20 = banquetas('19%', '150px', 'banqueta20', 'top');
 contenedor.appendChild(banqueta20);  


  // la banqueta de abajo primera parte
  //var banqueta2 = banquetas('60.7%', '50px', 'banqueta2', 'parcial', '0.9%');
  //contenedor.appendChild(banqueta2);
  // la banqueta de abajo segunda parte
  //var banqueta2 = banquetas('28.0%', '50px', 'banqueta2', 'parcial', '71.4%');
  //contenedor.appendChild(banqueta2);*/
}
