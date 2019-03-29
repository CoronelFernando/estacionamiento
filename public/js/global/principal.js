




function show(cajonid){
	$("#myModal").modal();
	 $('#txtTiempo').empty();
	$('#myModal [name="txtUsuario"]').val("Administrador");
	$('#myModal [name="txtCajon"]').val(cajonid);
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
