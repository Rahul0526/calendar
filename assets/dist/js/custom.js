/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
      fontSize:15
    }
    },
     scales: {
            xAxes: [{
                ticks: {
                    beginAtZero:true,                                      
                }
            }],
            yAxes: [{
                ticks: {
                    fontSize: 15
                }
            }]
        }
  };
  
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
      fontSize:15
    }
    },
    scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    fontSize: 15
                }
            }],
            xAxes: [{
                ticks: {
                    fontSize: 15
                }
            }]
        }
  };
  
var previewChart=function(el){
  var formURL =$('#site_url').val()+'/charts/chartPreview';
  var form=$(el).closest('form');
  var dataLabel=$("select[name='dataLabel']").val();
  var xAxis=$("select[name='x_axis']").val();
  var yAxis=$("select[name='y_axis']").val();
  var labels=[dataLabel, xAxis, yAxis];  
  formData= form.serializeArray();  
  $.ajax({
     url: formURL,
    type: "POST",
    data: formData,
    dataType: 'json',
    success: function (data, status, jqXHR)
    {
      $('.modal-body').html('<canvas id="previewChart"></canvas>');
      if(formData[1].value!=='table'){
          createChart(formData[1].value, data);
      }
       else{
         table='<table  class="table table-bordered table-hover datatable" id="tablePreview"> <thead><tr><th>'+dataLabel.toUpperCase() +'</th><th>'+xAxis.toUpperCase() +'</th><th>'+yAxis.toUpperCase() +'</th> </tr> </thead> <tbody></tbody></table>';
         $('.modal-body').html(table);
         createTable(data, labels);
      }
     $('#myModal').modal('show');
       },
    error: function (error) {
      console.log(error);
    }

  });
}
var createChart = function (type, data) {
  var elem = $('#previewChart'); 
  
  var chartCanvas = $(elem).get(0).getContext('2d');

  var chartData_X = data.xAxis;
  var chartData_Y = data.yAxis;
  var dataLabel = data.dataLabel;
  var chartOptions= (type=='bar')?barChartOptions:lineChartOptions;
  var chartData = {
    labels: chartData_X,
    datasets: [
      {
        label: dataLabel,
        fill: false,
        lineTension: 0.1,
        backgroundColor: "rgba(41, 68, 246,0.4)",
        borderColor: "rgba(41, 68, 246,1)",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "rgba(41, 68, 246,1)",
        pointBackgroundColor: "#fff",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(41, 68, 246,1)",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        pointHoverBorderWidth: 2,
        pointRadius: 1,
        pointHitRadius: 10,
        data: chartData_Y,
        spanGaps: false,
      }
    ]
  };
  var previewChart =new Chart(elem, {
    type: type,
    data: chartData,
    options: chartOptions
});

}

var createTable= function(data,labels){
    $.each(data, function (value, key) {
    x = "<tr><td>" + key[labels[0]] + "</td><td>" + key[labels[1]]  + "</td><td>" + key[labels[2]]  + "</td></tr>";
    $('#tablePreview').children('tbody').append(x);
  });
}
 $(function () {
   $body=$('bady');
   $(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
});
    $(".datatable").DataTable();
	
	 $('.datatable2').DataTable( {
        initComplete: function () {
			var i=0;
            this.api().columns().every( function () {
                var column = this;
				//console.log(i);
				if(i==5){
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
				}
				i++;
            } );
        }
    } );
	
    $('.example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    
    $('.largeData').DataTable({ 
         "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "scrollX":true,
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": $('#req_url').val(),
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
    
    $("#chartTable").on('change',function(e){
       var val=$(this).val();
       if(val!=''){
       var formURL =$('#site_url').val()+'/charts/tableCols';
    var postData={'table':val};
        $.ajax({
        url: formURL,
      type: "POST",
      data: postData,
      dataType: 'json',
      success: function (data, status, jqXHR)
      {
         $('#dataLabel').empty();
         $('#x-axis').empty();
         $('#y-axis').empty();
         $('#dataLabel').append($('<option>').text("--Select Data Label--").attr('value', ''));
         $('#x-axis').append($('<option>').text("--Select X-Axis Label--").attr('value', ''));
         $('#y-axis').append($('<option>').text("--Select Y-Axis Label--").attr('value', ''));
        $.each(data, function(index, value) {
          $('#dataLabel').append($('<option>').text(value).attr('value', value));
      $('#x-axis').append($('<option>').text(value).attr('value', value));
      $('#y-axis').append($('<option>').text(value).attr('value', value));
});
        console.log(status);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert(textStatus);
      }
      });
       }
    });
  });

