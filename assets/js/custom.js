/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function filterToggle(cl) {
  $("." + cl).toggleClass('hidden');
}
function saveChartData(saveData){
   var formURL = $('#site_url').val() + '/users/ajaxSaveChart';
//  var submitUrl=$('#site_url').val() + '/users/profile';
//  $(x).parent('form').attr('method','post');
//  $(x).parent('form').attr('action',submitUrl);
//  $(x).parent('form').submit();

  $.ajax({
    url: formURL,
    type: "POST",
    data: saveData,
    dataType: 'json',
    success: function (data, status, jqXHR){
      if(status){
        swal('success','Save Successfully');
      }
    },
    error: function (error) {
      console.log(error);
    }
    });
}
function appyFilter(x, el) {
  var postData = $(x).parent('form').serializeArray();
  var containerObj=$(x).parents('.container');
  postData.push({
    'name':'toggle',
     'value': $("#lineChartFilter").val()
  },{
    'name':'request',
     'value': el
  },{
	  'name':'clm_x',
	  'value':containerObj.find('.chart').data('xcolum')
  },{
	  'name':'clm_y',
	  'value':containerObj.find('.chart').data('ycolum')
  },{
	  'name':'clm_label',
	  'value':containerObj.find('.chart').data('labelcolum')
  },{
	  'name':'chartTable',
	  'value':containerObj.find('.chart').data('charttable')
  }
  );
					 
  
  var formURL = $('#site_url').val() + '/users/ajaxDatarequest';
//  var submitUrl=$('#site_url').val() + '/users/profile';
//  $(x).parent('form').attr('method','post');
//  $(x).parent('form').attr('action',submitUrl);
//  $(x).parent('form').submit();

  $.ajax({
    url: formURL,
    type: "POST",
    data: postData,
    dataType: 'json',
    success: function (data, status, jqXHR){
    
     switch(el){
       case 'lineChart':
         lineChart_place(data,containerObj);
		 $(containerObj).find('.lineChart_save').removeClass('hidden').unbind('click');
         $(containerObj).find('.lineChart_save').removeClass('hidden').on('click',function(e){
           e.preventDefault();
           var saveData={
             'type':'lineChart',
             'title':$(containerObj).parents('.home-row').find(".heading-title").text(),
             'sData':data,
			 'table_name':containerObj.find('.chart').data('charttable')
           };
           saveChartData(saveData);
         });
         break;
         case 'staticsTable':
         staticsTable_place(data,containerObj);         
         break;
         case 'barChart':
         barChart_place(data,containerObj);
		 $(containerObj).find('.barChart_save').removeClass('hidden').unbind('click');
         $(containerObj).find('.barChart_save').removeClass('hidden').on('click',function(e){
           e.preventDefault();
           var saveData={
             'type':'barChart',
              'title':$(containerObj).parents('.home-row').find(".heading-title").text(),
             'sData':data,
			 'table_name':containerObj.find('.chart').data('charttable')
           };
           saveChartData(saveData);
         });
         break;
         case 'priceTable':
         priceTable_place(data.priceTable);
         earningTable_place(data.earningTable);
         $('#priceTable_save').removeClass('hidden').on('click',function(e){
           e.preventDefault();
           var saveData={
             'type':'priceTable',
             'title':"Dollar($) & Percent(%) Changes",
             'sData':data,
			 'table_name':containerObj.find('.chart').data('charttable')
           };
           saveChartData(saveData);
         });
         break;
         defalt:
         break;
     }
     
//      lineChart_place(data.lineChartData);
//      staticsTable_place(data.staticsTableData);
//      barChart_place(data.barChartData);
//      earningTable_place(data.staticsTableData);
//      priceTable_place(data.priceTableData);

    },
    error: function (error) {
      console.log(error);
    }

  });

}
var lineChart_place = function (data,containerObj) {
  var elem = $(containerObj).find('.chart');
  $(elem).html('<canvas id="lineChart"></canvas>');
  var lineChartCanvas = $(elem).children('canvas').get(0).getContext('2d');

  var lineChartData_X = data.date;
  var lineChartData_Y = data.val;
  if(data.label==undefined)
  var dataLabel = "No Data";
  else
  var dataLabel = data.label;
  var lineChartData = {
    labels: lineChartData_X,
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
        data: lineChartData_Y,
        spanGaps: false,
      }
    ]
  };
  var lChart =new Chart(lineChartCanvas, {
    type: 'line',
    data: lineChartData,
    options: lineChartOptions
});
}
var barChart_place = function (data,containerObj) {
  var elem = $(containerObj).find('.chart');
 
  $(elem).html('<canvas id="barChart"></canvas>');
  var barChartCanvas = $(elem).children('canvas').get(0).getContext('2d');
  var barChartData_X = data.days;
  var barChartData_Y = data.val;
 
   if(data.label==undefined)
	  var barChartDataLabel = "No Data";
	  else
	  var barChartDataLabel = data.label;
  var barChartData = {
    labels: barChartData_X,
    datasets: [
      {
        label: barChartDataLabel,
        backgroundColor:'green',
        data: barChartData_Y,
      }
    ]
  };

  barChartOptions.datasetFill = true;

  var bChart = new Chart(barChartCanvas, {
    type: 'bar',
    data: barChartData,
    options: barChartOptions
});
}
var staticsTable_place = function (data,containerObj) {
	
  
 
  try {
	  if((containerObj.find('.chart').data('charttable'))==undefined){
		   var y = '';
		  $('#staticsTable').children('tbody').html('');
		  $.each(data, function (value, key) {
			x = "<tr><td>" + key.company + "</td><td>" + key.ticker + "</td><td>" + key.sector + "</td><td>" + key.industry + "</td><td>" + key.market_cap + "</td><td>" + key.price_earnings + "</td><td>" + key.price_sales + "</td><td>" + key.price_book + "</td><td>" + key.price_cash + "</td><td>" + key.eps + "</td><td>" + key.short_ratio + "</td><td>" + key.roe + "</td><td>" + key.current + "</td><td>" + key.quick + "</td><td>" + key.debt_equity + "</td><td>" + key.gross_m + "</td><td>" + key.recommendation + "</td><td>" + key.earnings + "</td><td>" + key.target_price + "</td><td>" + key.adj_close + "</td><td>" + key.price_group + "</td></tr>";
			$('#staticsTable').children('tbody').append(x);
		  });
		  
		  $('#staticsTable_save').removeClass('hidden').on('click',function(e){
           e.preventDefault();
           var saveData={
             'type':'statisticsTable',
             'title':$(containerObj).parents('.home-row').find(".heading-title").text(),
             'sData':data,
			 'table_name':containerObj.find('.chart').data('charttable')
           };
           saveChartData(saveData);
         });
  	 
	  }else{
		  $(containerObj).find('.staticsTable').children('tbody').html('');
		 if(data.rawResult.length>0){
			 $.each(data.rawResult, function (key, value) {
				 
				$(containerObj).find('.staticsTable th').length;
				x = "<tr>";
				for(var propName in value) {
					if(value.hasOwnProperty(propName)) {
						var propValue = value[propName];						
						x=x+'<td>'+propValue+'</td>';
					}
				}
				
				x = x+"</tr>";
			$(containerObj).find('.staticsTable').children('tbody').append(x);
		  });
		  
		 }
		 $(containerObj).find('.staticsTable_save').removeClass('hidden').unbind('click');
		  $(containerObj).find('.staticsTable_save').removeClass('hidden').on('click',function(e){
           e.preventDefault();
           var saveData={
             'type':'statisticsTable',
             'title':$(containerObj).parents('.home-row').find(".heading-title").text(),
             'sData':data,
			 'table_name':containerObj.find('.chart').data('charttable')
           };
           saveChartData(saveData);
         });
	  }
  // $('#staticsTable').children('tbody').html(y);    
 
  }catch(err) {
    console.log(err.message);
  }
}
var earningTable_place = function (data) {
  $('#earningTable').children('tbody').html('');
  var y = '';
  $.each(data, function (value, key) {
    x = "<tr><td>" + key.company + "</td><td>" + key.price_earnings + "</td><td>" + key.target_price + "</td><td>" + key.recommendation + "</td></tr>";
    $('#earningTable').children('tbody').append(x);
  });
  // $('#staticsTable').children('tbody').html(y);    
  $('#earningTable').DataTable();
}

var priceTable_place = function (data) {
  $('#priceTable').children('tbody').html('');
  $.each(data, function (value, key) {
    x = "<tr><td>" + key.ticker + "</td><td>" + parseFloat(key.percent_change_day).toFixed(2) + "</td><td>" + parseFloat(key.price_change_day).toFixed(2) + "</td><td>" + parseFloat(key.percent_change_week).toFixed(2) + "</td><td>" + parseFloat(key.price_change_week).toFixed(2) + "</td><td>" + parseFloat(key.percent_change_month).toFixed(2) + "</td><td>" + parseFloat(key.price_change_month).toFixed(2) + "</td><td>" + parseFloat(key.percent_change_quarter).toFixed(2) + "</td><td>" + parseFloat(key.price_change_quarter).toFixed(2) + "</td><td>" + parseFloat(key.percent_change_year).toFixed(2) + "</td><td>" + parseFloat(key.price_change_year).toFixed(2) + "</td></tr>";
    $('#priceTable').children('tbody').append(x);
  });
  // $('#staticsTable').children('tbody').html(y);    
  $('#priceTable').DataTable();
}

var resetFilter=function(field){
   switch(field){
      case 'industry':
             $el = $("select[name='industry']");
             //$el.selectpicker('refresh');
            $el.empty(); // remove old options
            $el.append($("<option></option>").attr("value", '').text("Select Industry"));
      case 'price_group':
             $el = $("select[name='price_group']");
            $el.empty(); // remove old options
            $el.append($("<option></option>").attr("value", '').text("Select Price Group"));       
      case 'company':
            $el = $("select[name='company']");
            $el.empty(); // remove old options
            $el.append($("<option></option>").attr("value", '').text("Select Company"));    
            
      case 'ticker':
            $el = $("select[name='ticker']");
            $el.empty(); // remove old options
            $el.append($("<option></option>").attr("value", '').text("Select TICKER"));
          break;            
        default :
          break;
          }
}

var slectedbysector=false;
var copmanyHtml='';
var tickerHtml='';
$(function () {
  $('select').selectpicker();
  $body = $('body');
  $(document).on({
    ajaxStart: function () {
      $body.addClass("loading");
    },
    ajaxStop: function () {
      $body.removeClass("loading");
    }
  });
  $(".sortBy").on('change', function () {
    
    var val = $(this).val();
    //$("select[name='" + $(this).attr('name') + "']").val(val);
    $("select[name='" + $(this).attr('name') + "']").selectpicker('val', val);
    if ($(this).data('con')) {
		
	  if($(this).data('me')=='sector'){
		  slectedbysector=true;
	  }
      resetFilter($(this).data("con"));
      var postData = $(this).closest('form').serializeArray();
      postData.push({'name':'field','value':$(this).data("con")});
      console.log(postData);
      // var field=$(this).data('field');
      var me = $(this).data('me');
      var con = $(this).data("con");
      var formURL = $('#site_url').val() + '/users/filterDataAjax';
      if (val != '') {
//        var postData = {'field': con,
//          'val': me + "='" + val + "'"};
        $.ajax({
          url: formURL,
          type: "POST",
          data: postData,
          dataType: 'json',
          success: function (data, status, jqXHR)
          {
		   
		   //unset value company and ticker
		   	if((me=='company' || me=='ticker') && slectedbysector==false){
				
			   
			   //set value for selector			   
			   $("select[name='sector']").val(data['sector']);
			   $("select[name='sector']").selectpicker('render');
               $("select[name='sector']").selectpicker('refresh');
			   
			   //set value of industry
			   var $el = $("select[name='industry']");
				$el.empty(); // remove old options
				$el.append($("<option></option>")
						.attr("value", '').text("Industry"));
				$.each(data['industry'], function (value, key) {
				  $el.append($("<option></option>")
						  .attr("value", key).text(key));
				  $el.val(key);
				});
				
				$el.selectpicker('render');
				$el.selectpicker('refresh');
				
				//set value of price group
			   var $el = $("select[name='price_group']");
				$el.empty(); // remove old options
				$el.append($("<option></option>")
						.attr("value", '').text("Price Group"));
				$.each(data['price_group'], function (value, key) {
				  $el.append($("<option></option>")
						  .attr("value", key).text(key));
				  $el.val(key);
				});
				$el.selectpicker('render');
				$el.selectpicker('refresh');
				
				//set ticker value
				var $el = $("select[name='ticker']");
					$el.empty(); // remove old options
					$el.append($("<option></option>")
							.attr("value", '').text("SELECT TICKER" ));
					$.each(data['ticker'], function (value, key) {
					  $el.append($("<option></option>")
							  .attr("value", key).text(key));
					});
					  $el.selectpicker('render');
					  $el.selectpicker('refresh');
					  
					  
			   return false;
		   
			}else{
				var $el = $("select[name='" + con + "']");
				$el.empty(); // remove old options
				$el.append($("<option></option>")
						.attr("value", '').text("SELECT " + con.toUpperCase()));
				$.each(data[con], function (value, key) {
				  $el.append($("<option></option>")
						  .attr("value", key).text(key));
				});
				$el.selectpicker('render');
				$el.selectpicker('refresh');
			}
           // $el.selectpicker('val',data[con]);
		  
           if(con != 'company' && me!='company'){
              var $el = $("select[name='company']");
            $el.empty(); // remove old options
            $el.append($("<option></option>")
                    .attr("value", '').text("SELECT COMPANY" ));
            $.each(data['company'], function (value, key) {
              $el.append($("<option></option>")
                      .attr("value", key).text(key));
            });
              $("select[name='company']").selectpicker('render');
              $("select[name='company']").selectpicker('refresh');
            }
            if(con != 'ticker'){
           var $el = $("select[name='ticker']");
            $el.empty(); // remove old options
            $el.append($("<option></option>")
                    .attr("value", '').text("SELECT TICKER" ));
            $.each(data['ticker'], function (value, key) {
              $el.append($("<option></option>")
                      .attr("value", key).text(key));
            });
              $el.selectpicker('render');
              $el.selectpicker('refresh');
           }
            
				//secter if selectc industry
				if(me=='industry'){
				   $("select[name='sector']").val(data['sector']);
				   $("select[name='sector']").selectpicker('render');
				   $("select[name='sector']").selectpicker('refresh');
				}
          
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(textStatus);
          }
        });
      }
    }


  });
  $(".lineChartFilter").on('change', function () { 
    var val = $(this).val();
    if (val != '') {
     var ticker= $(this).parents('.container').find("select[name='ticker']").val();
	 var containerObj=$(this).parents('.container');
      var formURL = $('#site_url').val() + '/users/lineReportToggle';
      var postData = {'toggle': val, 
	  				 'ticker':ticker,
					 'clm_x':containerObj.find('.chart').data('xcolum'),
					 'clm_y':containerObj.find('.chart').data('ycolum'),
					 'clm_label':containerObj.find('.chart').data('labelcolum'),
					 'chartTable':containerObj.find('.chart').data('charttable')
					 };
      $.ajax({
        url: formURL,
        type: "POST",
        data: postData,
        dataType: 'json',
        success: function (data, status, jqXHR)
        {

          lineChart_place(data,containerObj);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          // alert(textStatus);
        }
      });
    }
  });
// set update for ticker 
 $("select[name='ticker']").on('change',function(){
  if(slectedbysector==false && $(this).val()!=''){
	 var formURL = $('#site_url').val() + '/users/filterDataAjax';	 
     var postData = $(this).closest('form').serializeArray();
      postData.push({'name':'field','value':'byticker'});
        $.ajax({
          url: formURL,
          type: "POST",
          data: postData,
          dataType: 'json',
          success: function (data, status, jqXHR)
          {
		   
		   
			   //set value for selector			   
			   $("select[name='sector']").val(data['sector']);
			   $("select[name='sector']").selectpicker('render');
               $("select[name='sector']").selectpicker('refresh');
			   
			   //set value of industry
			   var $el = $("select[name='industry']");
				$el.empty(); // remove old options
				$el.append($("<option></option>")
						.attr("value", '').text("Industry"));
				$.each(data['industry'], function (value, key) {
				  $el.append($("<option></option>")
						  .attr("value", key).text(key));
				  $el.val(key);
				});
				
				$el.selectpicker('render');
				$el.selectpicker('refresh');
				
				//set value of price group
			   var $el = $("select[name='price_group']");
				$el.empty(); // remove old options
				$el.append($("<option></option>")
						.attr("value", '').text("Price Group"));
				$.each(data['price_group'], function (value, key) {
				  $el.append($("<option></option>")
						  .attr("value", key).text(key));
				  $el.val(key);
				});
				$el.selectpicker('render');
				$el.selectpicker('refresh');
				
				//set company value
				$("select[name='company']").val(data['company']);
			    $("select[name='company']").selectpicker('render');
                $("select[name='company']").selectpicker('refresh');
					  
					  
			   return false;
		   
			  
            
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(textStatus);
          }
        });
      
	 }
 });
 
    // set update for ticker 
   $("button[type='reset']").on('click',function(){
	          //reset industry
	            var $el = $("select[name='industry']");
				$el.empty(); // remove old options
				$el.append($("<option></option>")
						.attr("value", '').text("Industry"));	
				$el.append(industryHtml);			
				$el.selectpicker('render');
				$el.selectpicker('refresh');
			//reset group	
				var $el = $("select[name='price_group']");
				$el.empty(); // remove old options
				$el.append($("<option></option>")
						.attr("value", '').text("Price Group"));				
				$el.selectpicker('render');
				$el.selectpicker('refresh');
				
			//reset group	
				var $el = $("select[name='sector']");
				$el.val('');			
				$el.selectpicker('render');
				$el.selectpicker('refresh');
		   //reset company
		   		var $el = $("select[name='company']");
				$el.empty(); // remove old options
				//$el.append($("<option></option>")
					//	.attr("value", '').text("Company"));
				$el.append(copmanyHtml);				
				$el.selectpicker('render');
				$el.selectpicker('refresh');
		 //reset ticker
		   		var $el = $("select[name='ticker']");
				$el.empty(); // remove old options
				//$el.append($("<option></option>")
					//	.attr("value", '').text("SELECT TICKER"));
				$el.append(tickerHtml);				
				$el.selectpicker('render');
				$el.selectpicker('refresh');
				
		slectedbysector=false;		
   });
});

$(document).ready(function(e) {
	slectedbysector=false;
     copmanyHtml=$("select[name='company']").html();
     tickerHtml=$("select[name='ticker']").html();
	 industryHtml=$("select[name='industry']").html();
});
//portfoleya page js
$(document).ready(function(e) {
    $("#portfoleyadiv").find(".dataTables_scrollFoot").css('overflow','unset');
});

$("select[name='portfoleyaTicker']").on('change',function(){
	
	$("#tfoot").find(".volume").html(0);
	$("#tfoot").find(".adjclose").html(0);
	$("#tfoot").find(".maxdate").html(0);
	$("#tfoot").find(".maxdate").html(0);
	
	$("#tfoot").find(".inputnotesInput").val('');
	$("#tfoot").find(".EstimatedInput").val('');
	$("#tfoot").find(".currentvalue").html(0);
  if($(this).val()!=''){
	 var formURL = $('#site_url').val() + '/users/ajaxDatarequest';	 
     
	  
        $.ajax({
          url: formURL,
          type: "POST",
          data: {chartTable:'stock',		  		
				company:'AdvisorShares WCM/BNY MlnFcsd GR ADR ETF',
				industry:'Exchange Traded Fund',
				price_group:'$30 to $50',
				request:'lineChart',
				sector:'Financial',
				ticker:$(this).val(),
				toggle:'Daily'},
          dataType: 'json',
          success: function (data, status, jqXHR)
          {
			  if(data.rawResult.length>0){
				  
				  $("#tfoot").find(".volume").html(data.rawResult[data.rawResult.length-1]['volume']);
				  $("#tfoot").find(".adjclose").html(data.rawResult[0]['adj_close']);
				  $("#tfoot").find(".maxdate").html(data.rawResult[data.rawResult.length-1]['date']);
				  $("#tfoot").find(".latestadjclose").html(data.rawResult[data.rawResult.length-1]['adj_close']);
				  $("#tfoot").find(".pricegain").html((parseFloat(data.rawResult[data.rawResult.length-1]['adj_close'])-parseFloat(data.rawResult[0]['adj_close'])).toFixed(2)); 
				  $("#DataTables_Table_0").find('tfoot').remove()
			  }
		  },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(textStatus);
          }
        });
      
	 }
 });