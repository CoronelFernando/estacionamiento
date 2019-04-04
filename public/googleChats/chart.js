google.charts.load('visualization', "1", {packages: ['corechart']});
google.charts.setOnLoadCallback(drawChart);
var jsonData;
obtenerEstadisticasArea();
window.setInterval("obtenerEstadisticasArea()", 10000);
function obtenerEstadisticasArea(){
    var xml = new XMLHttpRequest();
    xml.open('GET', 'estadisticas/estadisticasGrafica', true);
    xml.addEventListener('load', function(){
    jsonData = JSON.parse(xml.responseText);
    drawChart();
  });
  xml.send();
}

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Horas', 'Disponibles', 'Ocupados', 'Reservados'],
        [jsonData[0].hora,  jsonData[0].disponibles, jsonData[0].ocupados, jsonData[0].reservados],
        [jsonData[1].hora,  jsonData[1].disponibles, jsonData[1].ocupados, jsonData[0].reservados],
        [jsonData[2].hora,  jsonData[2].disponibles, jsonData[2].ocupados, jsonData[0].reservados],
        [jsonData[3].hora,  jsonData[3].disponibles, jsonData[3].ocupados, jsonData[0].reservados],
        [jsonData[4].hora,  jsonData[4].disponibles, jsonData[4].ocupados, jsonData[0].reservados],
      ]);

    var options = {
        'title':'Cantida de Cajones por Hora',
        'colors': ['#B07CDA', '#64D4C7', '#000000'],
        'height': 370,
        hAxis: {title: 'Horario', minValue: 0, maxValue: 4},
        vAxis: {title: 'Cajones Utilizados',  minValue: 0,
            ticks: [0, 2, 4, 6, 8, 10, 12]}
        
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

/*$(window).resize(function(){
    drawChart();
});*/

