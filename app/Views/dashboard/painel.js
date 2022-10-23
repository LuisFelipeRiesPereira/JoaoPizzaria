google.charts.load("current", {packages:["timeline"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {

    var container = document.getElementById('registroTipo');
    var chart = new google.visualization.Timeline(container);
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn({ type: 'string', id: 'Tipo' });
    dataTable.addColumn({ type: 'string', id: 'Modo' });
    dataTable.addColumn({ type: 'date', id: 'DataStart' });
    dataTable.addColumn({ type: 'date', id: 'DataEnd' });
    moviments.forEach((item)=>{
        dataTable.addRows([
        [item.type, item.description, new Date(2022, 1, 1), new Date(2023, 1, 1)]
      
    ])});

    chart.draw(dataTable);
  }