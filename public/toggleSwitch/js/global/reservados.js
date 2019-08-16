/*function loadDocument(){
 setInterval( function(){
    dtHisAnt = $('#tbReservados').DataTable().draw();
  }, 5000);
}*/

$(document).ready(function(){
    dtHisAnt = $('#tbReservados').DataTable({
      processing: true,
      serverSide: true,
      method: "GET",
      ajax: "reservados/list",
      columns: [
          {data: 'usu_matricula'},
          {data: 'caj_descripcion'},
          {data: 'res_dia'},
          {data: 'res_hora'},
          {data: 'TieRes_time'},
          {data: 'est_descripcion'}
      ]
  });
});
