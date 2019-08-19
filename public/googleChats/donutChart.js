google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChartPie);
var jsonData;
obtenerEstadisticas();
window.setInterval("obtenerEstadisticas()", 8000);
function obtenerEstadisticas(){
    var xml = new XMLHttpRequest();
    xml.open('GET', 'home/pieChart', true);
    xml.addEventListener('load', function(){
    jsonData = JSON.parse(xml.responseText);
    //drawChartPie();
  });
  xml.send();
}

function drawChartPie() {
  var data = google.visualization.arrayToDataTable([
    ['Status', 'Quantity'],
    ['Disponibles',     jsonData[0].disponibles],
    ['Ocupados',      jsonData[0].ocupados],
    ['Reservados',  jsonData[0].reservados]
  ]);

  var options = {
    title: 'Smart Parking',
    colors: ['#10ac84', "#ff6b6b", "#0984e3"],
    height: 320,
    width: 390,
    pieHole: 0.4,
  };

  var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
  chart.draw(data, options);
}
