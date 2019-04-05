
function GuardarReservado(){

  var _token = document.getElementById('_token');
  var txtUsuario = document.getElementById('txtUsuario');
  var txtCajon = document.getElementById('txtCajon');
  var txthora = document.getElementById('txthora');
  var txtTiempo = document.getElementById('txtTiempo');
  if(txtTiempo.value != 'Seleccione Tiempo'){
    var cajon = txtCajon.value;
    cajon = cajon.split(' ')[1];
    var form = new FormData();
  form.append('_token', _token.value);
  form.append('usuario', 1);
  form.append('cajon', cajon);
  form.append('tiempo', txtTiempo.value);
  form.append('hora', txthora.value);
  
  var xml = new XMLHttpRequest();
  xml.open('POST', 'home/GuardarReservado', true);
  xml.addEventListener('load', function(){
    var jsonData = JSON.parse(xml.responseText);  
  });
  xml.send(form);  
  }
}

function obtenerReservados(id){
  var _token = document.getElementById('_token');
  var form = new FormData();
  form.append('id', id);
  form.append('_token', _token.value);

  var xml = new XMLHttpRequest();
  xml.open('POST', 'home/reservado', true);
  xml.addEventListener('load', function(){
    var jsonData = JSON.parse(xml.responseText);  
    document.getElementById('txtTiempo').selectedIndex = jsonData[0].res_tiempoReservado;
    document.getElementById('txtTiempo').setAttribute('disabled', true);
    var horaTemp = jsonData[0].res_hora.split(':');
    var hora =  horaTemp[0] + ':' + horaTemp[1];
    document.getElementById('txthora').value = hora;
  });
  xml.send(form);
}

function show(cajonid){

 var id = cajonid;
  var _token = document.getElementById('_token');
  var form = new FormData();
  form.append('id', id);
  form.append('_token', _token.value);
  var xml = new XMLHttpRequest();
  xml.open('POST', 'home/cajon', true);
  xml.addEventListener('load', function(){
    var jsonData = JSON.parse(xml.responseText);
    var titleModal = document.getElementById('titleModal');
    if(jsonData[0].caj_status_id == 1){
      titleModal.textContent = 'Disponible';
      var txttiempo = document.getElementById('txtTiempo');
      txttiempo.setAttribute('readonly', 'readonly');
      txttiempo.removeAttribute('disabled');
      txttiempo.removeAttribute('readonly');
      document.getElementById('btnConfirmar').removeAttribute('disabled');
      document.getElementById('txthora').value = obtenerHoraActual();
      document.getElementById('txthora').removeAttribute('disabled', true);
    }else if(jsonData[0].caj_status_id == 2){
      titleModal.textContent = 'Ocupado';
      var txttiempo = document.getElementById('txtTiempo');
      txttiempo.setAttribute('readonly', 'readonly');
      txttiempo.setAttribute('disabled', true);
      document.getElementById('btnConfirmar').setAttribute('disabled', true);
      document.getElementById('txthora').value = obtenerHoraActual();
      document.getElementById('txthora').setAttribute('disabled', true);
    }else if(jsonData[0].caj_status_id == 3){
      titleModal.textContent = 'Reservado';
      document.getElementById('btnConfirmar').setAttribute('disabled', true);
      document.getElementById('txthora').setAttribute('disabled', true);
      obtenerReservados(id);
    }
  });
  xml.send(form);

	$("#myModal").modal();
	 $('#txtTiempo').empty();
	$('#myModal [name="txtUsuario"]').val("Administrador");
	$('#myModal [name="txtCajon"]').val( 'cajon ' + cajonid);
	$("#txtTiempo").append("<option selected disabled>Seleccione Tiempo</option>");
      for (var i = 0; i < 3; i++) {
      	if(i==0){
      		$("#txtTiempo").append("<option value='" + (i+1) +"'>1 hora</option>" );	
      	}
      	if(i==1){
      		$("#txtTiempo").append("<option value='" + (i+1) +"'> 3 horas</option>" );	
      	}
      	if(i==2){
      		$("#txtTiempo").append("<option value='" + (i+1) +"'> 5 horas</option>" );	
      	}
      }
  }

  //var btnCerrar = document.getElementById('btnCerrar');
function LimpiarModal(){
	document.getElementById("txtUsuario").value = '';
	document.getElementById("txtCajon").value = '';
	document.getElementById("txtTiempo").option = '0';

}

function obtenerHoraActual(){
var horaActual = new Date();
var hora = horaActual.getHours();
hora = (hora < 10) ? ('0'+hora) : hora;
var minutos = horaActual.getMinutes();
minutos = (minutos < 10) ? ('0'+minutos) : minutos;
var horacompleta = hora + ":" + minutos;
return horacompleta;
}