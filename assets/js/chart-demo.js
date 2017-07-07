 var lineChartOptions = {
    //Boolean - If we should show the scale at all
    showScale: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: false,
    //String - Colour of the grid lines
    scaleGridLineColor: "green",
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - Whether the line is curved between points
    bezierCurve: true,
    //Number - Tension of the bezier curve between points
    bezierCurveTension: 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot: false,
    //Number - Radius of each point dot in pixels
    pointDotRadius: 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius: 20,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke: true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth: 2,
    //Boolean - Whether to fill the dataset with a color   
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true,
    datasetFill:false,
    legend:{
      labels :{      
      fontSize:20
    }
    },
     scales: {
            xAxes: [{
                ticks: {
                    beginAtZero:true, 
                    autoSkip:true,
                    stepSize: 0.3
                }
            }],
            yAxes: [{
                ticks: {
                  fontSize:20,
            beginAtZero: true,
            callback: function(value, index, values) {
              if(parseInt(value) > 1000){
                return '$' + value.toString();//.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
              } else {
                return '$' + value;
              }
            }
          }
            }]
        }
  };
  // Bar chart options
   var barChartOptions = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: true,
    //String - Colour of the grid lines
    scaleGridLineColor: "rgba(55, 160, 57, 0.8)",
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - If there is a stroke on each bar
    barShowStroke: true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth: 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing: 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing: 1,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    //Boolean - whether to make the chart responsive
    responsive: true,
    maintainAspectRatio: false,
    legend:{
      labels :{      
      fontSize:20
    }
    },
    scales: {
            yAxes: [{
                ticks: {
                  fontSize:20,
            beginAtZero: true,
            callback: function(value, index, values) {
              if(parseInt(value) > 1000){
                return '$' + value.toString();//.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
              } else {
                return '$' + value;
              }
            }
          }
            }],
            xAxes: [{
                ticks: {
                    fontSize: 20
                }
            }]
        }
  };
$(function () {
  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  //--------------
  //- AREA CHART -
  //--------------

  // Get context with jQuery - using jQuery's .get() method.
  // var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
  // This will get the first returned node in the jQuery collection.
  // var areaChart = new Chart(areaChartCanvas);

 
 

  //Create the line chart
  //  areaChart.Line(areaChartData, areaChartOptions);
  //-------------
  //- LINE CHART -
  //--------------
  if($('body').find($('#lineChart')).length){
  var lineChartCanvas = $("#lineChart").get(0).getContext('2d');
  var lineChartData_X = $("#lineChart").data("x");
  var lineChartData_Y = $("#lineChart").data("y");
  var dataLabel = $("#lineChart").data("label");
  var data = {
    labels: lineChartData_X.split(","),
    datasets: [
      {
        label: dataLabel,
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(0, 0, 255,1)",
            borderColor: "rgba(0, 0, 255,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(0, 0, 255,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
        data: lineChartData_Y.split(",")       
      }
    ]
  };  
  var lineChart=new Chart(lineChartCanvas, {
    type: 'line',
    data: data,
    options: lineChartOptions
});
          
}

 if($('body').find($('.lineChart')).length){
	 $('.lineChart').each(function(index, element) {
        
    
  var lineChartCanvas = $(this).get(0).getContext('2d');
  var lineChartData_X = $(this).data("x");
  var lineChartData_Y = $(this).data("y");
  var dataLabel = $(this).data("label");
  var data = {
    labels: lineChartData_X.split(","),
    datasets: [
      {
        label: dataLabel,
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(0, 0, 255,1)",
            borderColor: "rgba(0, 0, 255,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(0, 0, 255,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
        data: lineChartData_Y.split(",")       
      }
    ]
  };  
  var lineChart=new Chart(lineChartCanvas, {
    type: 'line',
    data: data,
    options: lineChartOptions
});
       });   
}
  //-------------
  //- BAR CHART -
  //-------------
 if($('body').find($('#barChart')).length){
  var barChartCanvas = $("#barChart").get(0).getContext('2d');
 var barChartData_X = $("#barChart").data("x");
  var barChartData_Y = $("#barChart").data("y");
  var barChartDataLabel = $("#barChart").data("label");
  var barChartData = {
    labels: barChartData_X.split(","),
   datasets: [
        {
            label: barChartDataLabel,
            backgroundColor: 'green',
        data: barChartData_Y.split(","),
      }
    ]
  };  
 
  barChartOptions.datasetFill = true;

  var barchart=new Chart(barChartCanvas, {
    type: 'bar',
    data: barChartData,
    options: barChartOptions
});         
} 

if($('body').find($('.barChart')).length){
	$('.barChart').each(function(index, element) {
		  var barChartCanvas = $(this).get(0).getContext('2d');
		 var barChartData_X = $(this).data("x");
		  var barChartData_Y = $(this).data("y");
		  var barChartDataLabel = $(this).data("label");
		  var barChartData = {
			labels: barChartData_X.split(","),
		   datasets: [
				{
					label: barChartDataLabel,
					backgroundColor: 'green',
				data: barChartData_Y.split(","),
			  }
			]
		  };  
		 
		  barChartOptions.datasetFill = true;
		
		  var barchart=new Chart(barChartCanvas, {
			type: 'bar',
			data: barChartData,
			options: barChartOptions
		});         
	});   
}
});
  