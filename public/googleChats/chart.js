google.charts.load('visualization', "1", {packages: ['corechart']});
google.charts.setOnLoadCallback(drawChart);
var jsonData;
var jsonDataHora;
//OBTIENE EL ESTADOS DE LOS CAJONES
obtenerEstadisticasArea();
desplegarCapacidad();
window.setInterval("obtenerEstadisticasArea()", 6000);
window.setInterval("desplegarCapacidad()", 500);

function obtenerEstadisticasArea(){
    var xml = new XMLHttpRequest();
    xml.open('GET', 'estadisticas/estadisticasGrafica', false);
    xml.addEventListener('load', function(){
    jsonData = JSON.parse(xml.responseText);
    obtenerEstadisticasHora();
    drawChart();
  });
  xml.send();
}

//OBTIENE LAS HORAS DE LAS ESTADISTICAS
function obtenerEstadisticasHora(){
    var xml = new XMLHttpRequest();
    xml.open('GET', 'estadisticas/estadisticasGraHor', true);
    xml.addEventListener('load', function(){
    jsonDataHora = JSON.parse(xml.responseText);
  });
  xml.send();
}

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Horas', 'Disponibles', 'Ocupados', 'Reservados'],
        [jsonDataHora[6].hora,  jsonData[6].disponibles, jsonData[6].ocupados, jsonData[6].reservados],
        [jsonDataHora[5].hora,  jsonData[5].disponibles, jsonData[5].ocupados, jsonData[5].reservados],
        [jsonDataHora[4].hora,  jsonData[4].disponibles, jsonData[4].ocupados, jsonData[4].reservados],
        [jsonDataHora[3].hora,  jsonData[3].disponibles, jsonData[3].ocupados, jsonData[3].reservados],
        [jsonDataHora[2].hora,  jsonData[2].disponibles, jsonData[2].ocupados, jsonData[2].reservados],
        [jsonDataHora[1].hora,  jsonData[1].disponibles, jsonData[1].ocupados, jsonData[1].reservados],
        [jsonDataHora[0].hora,  jsonData[0].disponibles, jsonData[0].ocupados, jsonData[0].reservados],
      ]);

    var options = {
        'title':'Drawers status per hour',
        'colors': ['#64D4C7', '#F99797', '#B07CDA'],
        'height': 370,
        hAxis: {title: 'Horario', minValue: 0, maxValue: 4},
        vAxis: {title: 'Cajones Utilizados',  minValue: 0,
            //ticks: [0, 2, 4, 6, 8, 10, 12]}
            ticks: [0, 1, 2, 3, 4, 5]}
        
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

/*$(window).resize(function(){
    drawChart();
});*/

function desplegarCapacidad(){
  var formData = new FormData();
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'estadisticas/estadisticasCapacidad');
  xhr.addEventListener('load', function(){
    //var jsonData = JSON.parse(xhr.responseText);
    var jsonData = xhr.responseText;
    document.getElementById('lblCapacity').textContent = jsonData + '%';
  });
  xhr.send(formData);
}
