google.charts.load('visualization', "1", {packages: ['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Horas', 'Vacios', 'Ocupados'],
        ['1 - 2',  2,      0],
        ['2 - 3',  3,      4],
        ['3 - 4',  1,      2],
        ['4 - 5',  0,      2],
        ['5 - 6',  2,      0],
        ['7 - 8',  1,      4]
      ]);

    var options = {
        'title':'Cantida de Cajones por Hora',
        'colors': ['#85E3FF', '#BFFCC6'],
        'height': 250,
        hAxis: {title: 'Horario', minValue: 0, maxValue: 4},
        vAxis: {title: 'Cajones Utilizados',  minValue: 0,
            ticks: [0, 2, 4]}
        
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

$(window).resize(function(){
    drawChart();
})

