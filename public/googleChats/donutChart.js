google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Status', 'Quantity'],
          ['Vacant',     11],
          ['Occupied',      2],
          ['Reserved',  2]
         
        ]);

        var options = {
          title: 'Smart Parking',
          colors: ['#10ac84', "#ff6b6b", "#2e86de"],
          height: 320,
          width: 400,
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }