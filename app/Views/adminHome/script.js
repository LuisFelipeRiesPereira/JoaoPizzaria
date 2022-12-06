google.charts.load('current', {'packages':['corechart','line']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

var chartArrayPie = [];
var chartHeaderPie = ['Nome', 'Total'];
chartArrayPie.push(chartHeaderPie);
console.log(orders);
orders.forEach((item)=>{
  chartItem = [item.name, item.total];
  chartArrayPie.push(chartItem);
})
var data = google.visualization.arrayToDataTable(chartArrayPie);

var options = {
    title: 'Sabores que mais vendem'
};

var chart = new google.visualization.PieChart(document.getElementById('piechart'));

chart.draw(data, options);
} 