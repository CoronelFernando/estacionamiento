//#7CB342 verde
//#E64A19 rojo
//#FFFF00 amarillo
//#FFFFFF blanco
//#9E9E9E gris
//#000000 negro
var container = document.getElementById('container');
//contenedor.style.height = '100%';
var ns = 'http://www.w3.org/2000/svg';


//ES EL SVG QUE SE UTILIZA PARA DIBUJAR
//NOS RETORNA UN ELEMENTO SVG
function svgs(){
  var svg = document.createElementNS(ns, 'svg');
  svg.setAttributeNS(null, 'width', '100%');
  svg.setAttributeNS(null, 'height', '100%');

  return svg;
}

//FUNCION QUE GENERA UN CAJON
//NOS RETORNA UN DIV
function drawer(width, height, id, status, orientation){
  var divDrawer = document.createElement('div');
  divDrawer.id = id;
  divDrawer.style.width = width;
  divDrawer.style.height = height;
  divDrawer.style.float = 'left';
  //divCajon.setAttribute('onClick', 'show(id),obtenerReservados(this)');
  divDrawer.setAttribute('onClick', 'show(id)');
  var svg = svgs();
  var drawer = document.createElementNS(ns, 'rect');
  drawer.setAttributeNS(null, 'width', '100%');
  drawer.setAttributeNS(null, 'height', '100%');
  drawer.setAttributeNS(null, 'fill', '#7c7575');
  //if(status == 1) drawer.setAttributeNS(null, 'fill', '#E4E4E4'); //verde/disponible
  //else if (status == 2) drawer.setAttributeNS(null, 'fill', '#ff6b6b'); //rojo/no disponible
  //else if (status == 3) drawer.setAttributeNS(null, 'fill', '#0984e3'); //Azul/no disponible
  drawer.setAttributeNS(null, 'rx', '0');
  drawer.setAttributeNS(null, 'ry', '0');
  svg.appendChild(drawer);
  

  // SVG CAR
  if(status == 1) svg.appendChild(drawCarLayout(id, '#B4B4B4', new Point(20,50)));
  if(status == 2) svg.appendChild(drawCarLayout(id, '#ff0000', new Point(20,50)));
  if(status == 3) svg.appendChild(drawCarLayout(id, '#0984e3', new Point(20,50)));
  svg.appendChild(drawPrincipalGlass('top', new Point(20,50)));
  svg.appendChild(drawPrincipalGlass('bottom', new Point(20,50)));
  svg.appendChild(drawLateralGlass('left', new Point(20,50)));
  svg.appendChild(drawLateralGlass('right', new Point(20,50)));
  drawFrontLights(svg,new Point(20,50));
  divDrawer.appendChild(svg, new Point(20,50));
  //divDrawer.appendChild(iconCar('prueba','#FFFF00',new Point(100,100),'100px','100px'));
  return divDrawer;
}

//FUNCION QUE GENERA EL LOGO DEL CAJON
//NOS RETORNA UN DIV
function logoCajon(estado, id, orientacion){
  var divLogoCajon = document.createElement('div');
  if(orientacion == 'top') divLogoCajon.style.marginTop = '-70px';
  if(orientacion == 'bottom') divLogoCajon.style.marginTop = '-90px';
  divLogoCajon.style.marginLeft = '17px';
  divLogoCajon.id = id;
  var image = document.createElement('img');
  image.style.width = '45px';
  image.style.height = '45px';
  if(estado == 1) image.src = 'croquis/image/vacio3.png';
  else if(estado == 2) image.src = 'croquis/image/ocupado2.png';
  else if(estado == 3) image.src = 'croquis/image/reservado.png';
  divLogoCajon.appendChild(image);

  return divLogoCajon;
}

function iconCar(id, color, startPoint, width, height,){
  var divIconCar = document.createElement('div');
  divIconCar.style.width = width;
  divIconCar.style.height = height;
  divIconCar.style.float = 'left';
  var svg = svgs();
  svg.appendChild(drawCarLayout(id, color, startPoint));
  svg.appendChild(drawPrincipalGlass('top', startPoint));
  svg.appendChild(drawPrincipalGlass('bottom',startPoint));
  svg.appendChild(drawLateralGlass('left', startPoint));
  svg.appendChild(drawLateralGlass('right',startPoint));
  drawFrontLights(svg,startPoint);

  divIconCar.appendChild(svg);

  return divIconCar;

}

//FUNCION QUE GENERA LAS LINEAS AMARILAS
//NOS RETORNA UN DIV
function lineasAmarillas(width, height, id){
  var divLineaAmarilla = document.createElement('div');
  divLineaAmarilla.style.width = width;
  divLineaAmarilla.style.height = height;
  divLineaAmarilla.style.float = 'left';
  //divLineaAmarilla.style.marginLeft = '0%';
  //divLineaAmarilla.style.marginRight = '0%';
  divLineaAmarilla.id = id;
  var svg = svgs();
  var lineaAmarilla = document.createElementNS(ns, 'rect');
  lineaAmarilla.setAttributeNS(null, 'width', '100%');
  lineaAmarilla.setAttributeNS(null, 'height', '100%');
  lineaAmarilla.setAttributeNS(null, 'fill', '#ffb961');
  //lineaAmarilla.setAttributeNS(null, 'rx', '0');
  //lineaAmarilla.setAttributeNS(null, 'ry', '0');
  svg.appendChild(lineaAmarilla);
  divLineaAmarilla.appendChild(svg);

  return divLineaAmarilla;
}

//FUNCION QUE GENERA LA BANQUETA
//NOS RETORNA UN DIV
function banquetas(width, height, id){
  var divbanqueta = document.createElement('div');
  divbanqueta.style.width = width;
  divbanqueta.style.height = height;
  divbanqueta.style.marginTop = '-7px';
  divbanqueta.style.float = 'left'; 
  divbanqueta.id = id;
  var svg = svgs();
  var banqueta = document.createElementNS(ns, 'rect');
  banqueta.setAttributeNS(null, 'width', '100%');
  banqueta.setAttributeNS(null, 'height', '100%');
  banqueta.setAttributeNS(null, 'fill', '#B9BDBE');  
  svg.appendChild(banqueta);
  divbanqueta.appendChild(svg);

  return divbanqueta;
}

function banqueta(width, height, id){
  var divbanqueta = document.createElement('div');
  divbanqueta.style.width = width;
  divbanqueta.style.height = height;
  divbanqueta.style.marginTop = '-7px';
  divbanqueta.style.float = 'left'; 
  divbanqueta.id = id;
  var svg = svgs();
  var banqueta = document.createElementNS(ns, 'rect');
  banqueta.setAttributeNS(null, 'width', '100%');
  banqueta.setAttributeNS(null, 'height', '100%');
  banqueta.setAttributeNS(null, 'fill', '#ffb961');  
  svg.appendChild(banqueta);
  divbanqueta.appendChild(svg);

  return divbanqueta;
}

function edificio(width, height, id){
  var divedificio = document.createElement('div');
  divedificio.style.width = width;
  divedificio.style.height = height;
  divedificio.style.float = 'left';
  divedificio.id = id;
  var svg = svgs();
  var edificio = document.createElementNS(ns, 'rect');
  edificio.setAttributeNS(null, 'width', '100%');
  edificio.setAttributeNS(null, 'height', '100%');
  edificio.setAttributeNS(null, 'fill', '#dfd3c3');
  svg.appendChild(edificio);
  divedificio.appendChild(svg);

  return divedificio;
}


//FUNCION QUE GENERA LA CALLE
//NOS RETORNA UN DIV
function calles(width, height, id, estado){
  var divCalles = document.createElement('div');
  divCalles.style.width = width;
  divCalles.style.height = height;
  divCalles.style.float = 'left';
  divCalles.id = id;
  var svg = svgs();
  var calle = document.createElementNS(ns, 'rect');
  calle.setAttributeNS(null, 'width', '100%');
  calle.setAttributeNS(null, 'height', '100%');
  calle.setAttributeNS(null, 'fill', '#7c7575');
  svg.appendChild(calle);
  divCalles.appendChild(svg);

  //lineas centrales de la calle
  var divLineas = document.createElement('div');
  if(estado == 'horizontal'){
    divLineas.style.position = 'absolute';
    divLineas.style.marginTop = '-7.5%';
    var lineasCentrales = 10;
    for(var j = 0; j < lineasCentrales; j++){
      divLineas.appendChild(lineasPunteadas('5%','10px'));
    }
  }
  if(estado == 'vertical'){
    divLineas.style.position = 'absolute';
    divLineas.style.marginLeft = '12%';
    var lineasCentrales = 1;
    for(var j = 0; j < lineasCentrales; j++){
      divLineas.appendChild(lineasPunteadas('10px','100%'));
    }
  }

  divCalles.appendChild(divLineas);

  return divCalles;
}
function lineasPunteadas(width, height, id){
  var divLineaPunteada = document.createElement('div');
  divLineaPunteada.style.width = width;
  divLineaPunteada.style.height = height;
  divLineaPunteada.style.float = 'left';
  divLineaPunteada.style.marginLeft = '2%';
  divLineaPunteada.style.marginRight = '2%';
  divLineaPunteada.id = id;
  var svg = svgs();
  var lineaPunteada = document.createElementNS(ns, 'rect');
  lineaPunteada.setAttributeNS(null, 'width', '100%');
  lineaPunteada.setAttributeNS(null, 'height', '100%');
  lineaPunteada.setAttributeNS(null, 'fill', '#feca57');
  svg.appendChild(lineaPunteada);
  divLineaPunteada.appendChild(svg);

  return divLineaPunteada;
}

//--------------------------------------------------------------------------------------------------
//ICONO CAJON
//--------------------------------------------------------------------------------------------------

//FUNCION QUE DIBUJA EL LAYOUT DEL AUTO
//@id INDICA EL ID DEL AUTO
//@color INDICA EL COLOR DEL AUTO
//@startPoint INDICA EL PUNTO DONDE SE VA A EMPEZAR A DIBUJAR
function drawCarLayout(id,color, startPoint){
  var carLayout = document.createElementNS(ns, 'path');
  carLayout.id = id;
  carLayout.style.fill = color;

  var path = 'M' + startPoint.x + ',' + startPoint.y; + ' '; // INICIA
  path += 'A3,1 0 0,1 ' + (startPoint.x + 100) + ',' + startPoint.y + ' '; // DERECHA SE CREA ARCO
  path += 'L ' + (startPoint.x + 100) + ',' + (startPoint.y + 35) + ' '; // BAJA
  path += 'L ' + (startPoint.x + 110) + ',' + (startPoint.y + 35) + ' '; // DERECHA SE CREA ESPEJO RETROVISOR
  path += 'L ' + (startPoint.x + 110) + ',' + (startPoint.y + 40) + ' '; // BAJA SE CREA ESPEJO RETROVISOR
  path += 'L ' + (startPoint.x + 100) + ',' + (startPoint.y + 40) + ' '; // IZQUIERDA SE CREA ESPEJO RETROVISOR
  path += 'L ' + (startPoint.x + 100) + ',' + (startPoint.y + 130) + ' '; // BAJA
  path += 'A3,1 0 1,1  ' + startPoint.x + ',' + (startPoint.y + 130) + ' '; // IZQUIERA SE CREA ARCO
  path += 'L ' + (startPoint.x) + ',' + (startPoint.y + 35) + ' '; // SUBE
  path += 'L ' + (startPoint.x - 10) + ',' + (startPoint.y + 35) + ' '; // IZQUIERDA SE CREA ESPEJO RETROVISOR
  path += 'L ' + (startPoint.x - 10) + ',' + (startPoint.y + 40) + ' '; // SUBE SE CREA ESPEJO RETROVISOR
  path += 'L ' + (startPoint.x) + ',' + (startPoint.y + 40) + ' Z'; // DERECHA SE CREA ESPEJO RETROVISOR
  
  carLayout.setAttribute('d', path);

  return carLayout;
}

//FUNCION QUE DIBUJA LAS VENTANASPRINCIPALES DEL AUTO
//@orientacion INDICA HACIA DONDE ESTA MIRANDO EL AUTO
//@startPoint INDICA EL PUNTO DONDE SE VA A EMPEZAR A DIBUJAR
function drawPrincipalGlass(orientacion, startPoint){
  var principalGlass = document.createElementNS(ns, 'path');
  principalGlass.style.fill = '#000';
  //principalGlass.id = id;
  var path = '';
  if(orientacion == 'top'){
      //path = 'M120,140 A3,1 0 0,1 180,140 L170,155 L130,155 Z';
      path = 'M' + (startPoint.x + 21) + ',' + (startPoint.y + 40) + ' ';
      path += 'A3,1 0 0,1 ' + (startPoint.x + 81) + ',' + (startPoint.y + 40) + ' ';
      path += 'L' + (startPoint.x + 71) + ',' + (startPoint.y + 55) +  '';
      path += 'L' + (startPoint.x + 31) + ',' + (startPoint.y + 55) +  ' Z';
  }
  
  if(orientacion == 'bottom'){
      //path = 'M120,220 A3,1 0 1,0 180,220 L170,205 L130,205 Z';
      path = 'M' + (startPoint.x + 21) + ',' + (startPoint.y + 120) + ' ';
      path += 'A3,1 0 1,0 ' + (startPoint.x + 82) + ',' + (startPoint.y + 120) + ' ';
      path += 'L' + (startPoint.x + 71) + ',' + (startPoint.y + 105) +  '';
      path += 'L' + (startPoint.x + 31) + ',' + (startPoint.y + 105) +  ' Z';
  }

  principalGlass.setAttribute('d', path);

  return principalGlass;
}

//FUNCION QUE DIBUJA LAS VENTANAS LATERALES DEL AUTO
//@orientacion INDICA HACIA DONDE ESTA MIRANDO EL AUTO
//@startPoint INDICA EL PUNTO DONDE SE VA A EMPEZAR A DIBUJAR
function drawLateralGlass(orientacion, startPoint){
  var lateralGlass = document.createElementNS(ns, 'path');
  lateralGlass.style.fill = '#000';
  //principalGlass.id = id;
  var path = '';
  if(orientacion == 'left'){
      //path = 'M185,155 L185,205 L175,200 L175,160 Z';
      path = 'M' + (startPoint.x + 86) + ',' + (startPoint.y + 55) + ' '; // INICIA
      path += 'L' + (startPoint.x + 86) + ',' + (startPoint.y + 105) + ' '; // BAJA
      path += 'L' + (startPoint.x + 76) + ',' + (startPoint.y + 95) + ' '; // IZQUIERDA
      path += 'L' + (startPoint.x + 76) + ',' + (startPoint.y + 65) + ' Z'; // SUBE
  }
  
  if(orientacion == 'right'){
      //path = 'M115,155 L115,205 L125,200 L125,160 Z';
      //path = 'M' + (startPoint.x + 15) + ',' + (startPoint.y + 55) + ' L115,205 L125,200 L125,160 Z';
      path = 'M' + (startPoint.x + 16) + ',' + (startPoint.y + 55) + ' '; // INICIA
      path += 'L' + (startPoint.x + 16) + ',' + (startPoint.y + 105) + ' '; // BAJA
      path += 'L' + (startPoint.x + 26) + ',' + (startPoint.y + 95) + ' '; // DERECHA
      path += 'L' + (startPoint.x + 26) + ',' + (startPoint.y + 65) + ' Z'; // SUBE
  }
  
  lateralGlass.setAttribute('d', path);

  return lateralGlass;
}

// FUNCION QUE DIBUJA LAS LUCES DELANTERAS DEL AUTO
//@svg RECIBE EL SBG DONDE SE VA A DIBUJAR
//@startPoint INDICA EL PUNTO DONDE SE VA A EMPEZAR A DIBUJAR
function drawFrontLights(svg,startPoint){

  var x = startPoint.x + 15;

  for(var i = 0; i < 2; i++){
      var frontLightsLeft = document.createElementNS(ns, 'path');
      frontLightsLeft.style.fill = '#FFFF00';
      var path = '';
      path = 'M' + (x) + ',' + (startPoint.y - 10) + ' ';
      path += 'h10 ';
      path += 'a5,5 0 0 1 2,2 ';
      path += 'v5 ';
      path += 'a5,5 0 0 1 -2,2 ';
      path += 'h-10 ';
      path += 'a5,5 0 0 1 -2,-2 ';
      path += 'v-5 ';
      path += 'a5,5 0 0 1 2,-2 z';
  
      frontLightsLeft.setAttribute('d', path);
    
      svg.append(frontLightsLeft);
      
      x += 60;
  }
}

function Point(x, y) {
if (typeof x !== 'undefined') this.x = x;
if (typeof y !== 'undefined') this.y = y;
}