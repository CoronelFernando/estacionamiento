//#7CB342 verde
//#E64A19 rojo
//#FFFF00 amarillo
//#FFFFFF blanco
//#9E9E9E gris
//#000000 negro
var contenedor = document.getElementById('contenedor');
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
function cajones(width, height, id, estado, orientacion){
  var divCajon = document.createElement('div');
  divCajon.id = id;
  divCajon.style.width = width;
  divCajon.style.height = height;
  divCajon.style.float = 'left';
  //divCajon.setAttribute('onClick', 'show(id),obtenerReservados(this)');
  divCajon.setAttribute('onClick', 'show(id)');
  var svg = svgs();
  var cajon = document.createElementNS(ns, 'rect');
  cajon.setAttributeNS(null, 'width', '100%');
  cajon.setAttributeNS(null, 'height', '100%');
  if(estado == 1) cajon.setAttributeNS(null, 'fill', '#10ac84'); //verde/disponible
  else if (estado == 2) cajon.setAttributeNS(null, 'fill', '#ff6b6b'); //rojo/no disponible
  else if (estado == 3) cajon.setAttributeNS(null, 'fill', '#0984e3'); //Azul/no disponible
  cajon.setAttributeNS(null, 'rx', '0');
  cajon.setAttributeNS(null, 'ry', '0');
  svg.appendChild(cajon);
  divCajon.appendChild(svg);
  divCajon.appendChild(logoCajon(estado, 'logo', orientacion));
  divCajon.appendChild(tituloCajon(('Cajon ' + id)));

  return divCajon;
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

//FUNCION QUE NOS RETORNA EL ID DEL CAJON
//NOS RETORNA UN DIV
function tituloCajon(texto){
  var div = document.createElement('div');
  div.style.textAlign = 'center';
  div.style.top = '-100px';
  div.style.display = 'block';
  var label = document.createElement('label');
  label.textContent = texto;
  label.style.fontSize = '10pt';
  div.appendChild(label);
  return div;
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
  lineaAmarilla.setAttributeNS(null, 'fill', '#feca57');
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
  divbanqueta.style.float = 'left';
  divbanqueta.id = id;
  var svg = svgs();
  var banqueta = document.createElementNS(ns, 'rect');
  banqueta.setAttributeNS(null, 'width', '100%');
  banqueta.setAttributeNS(null, 'height', '100%');
  banqueta.setAttributeNS(null, 'fill', '#95a5a6');
  svg.appendChild(banqueta);
  divbanqueta.appendChild(svg);

  return divbanqueta;
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
  calle.setAttributeNS(null, 'fill', '#34495e');
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
