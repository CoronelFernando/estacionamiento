
function obtenerReservados(div){
  var id = div.id;
  var _token = document.getElementById('_token');
  var form = new FormData();
  form.append('id', id);
  form.append('_token', _token.value);

  var xml = new XMLHttpRequest();
  xml.open('POST', 'home/reservado', true);
  xml.addEventListener('load', function(){
    var jsonData = JSON.parse(xml.responseText);
    var titleModal = document.getElementById('titleModal');
    /*if(jsonData[0].res_status_id == 1){
      titleModal.textContent = 'Disponible';
    }else if(jsonData[0].res_status_id == 2){
      titleModal.textContent = 'Disponible';
    }*/
    
    //console.log(jsonData);
  });
  xml.send(form);
}


function show(cajonid){

 var id = div.id;
  var _token = document.getElementById('_token');
  var form = new FormData();
  form.append('id', id);
  form.append('_token', _token.value);
  var xml = new XMLHttpRequest();
  xml.open('POST', 'home/cajon', true);
  xml.addEventListener('load', function(){
    var jsonData = JSON.parse(xml.responseText);
    var titleModal = document.getElementById('titleModal');
    /*if(jsonData[0].res_status_id == 1){
      titleModal.textContent = 'Disponible';
    }else if(jsonData[0].res_status_id == 2){
      titleModal.textContent = 'Disponible';
    }*/
    
    //console.log(jsonData);
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
