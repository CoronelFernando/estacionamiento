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
        ['6 - 7',  3,      4],
        ['7 - 8',  1,      6],
        ['8 - 9',  0,      2],
        ['9 - 10',  2,      0],
        ['10 - 11',  3,      4],
        ['11 - 12',  1,      0],
        ['12 - 13',  0,      2]
      ]);

    var options = {
        'title':'Cantida de Cajones por Hora',
        'colors': ['#85E3FF', '#BFFCC6'],
        'height': 500,
        hAxis: {title: 'Horario', minValue: 0},
        vAxis: {title: 'Cajones Utilizados'}
        
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

$(window).resize(function(){
    drawChart();
})

