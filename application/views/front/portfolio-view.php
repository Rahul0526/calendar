<?php include_once 'header.php'; ?>
<style>
.dataTables_scrollFoot{ overflow:auto}

</style>
<section id="about-us">
  <div class="container">
    <div class="center wow fadeInDown">
      <h2>Stock Tracker Portfolio</h2>
    </div>
    <div class="panel" id="portfoleyadiv">
      <div class="panel-body">
      <form id="portfolioform">
        <table class="dataTable2 ">
          <thead>
            <tr>
              <td>Symbol</td>
              <td>Saved Date</td>
              <td>Volume</td>
              <td>Adj Close</td>
              <td>Input Notes</td>
              <td>Max Date</td>
              <td>Latest Day Adj Close</td>
              <td>Price Gain / Loss</td>
              <td>Estimated Shares Purchased (Input)</td>
              <td>Current Value</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($chartList)){?>
            <?php foreach($chartList as $chart){?>
            <?php 
		   $graphData=json_decode($chart->chartData,true);		   
		   //print_r($graphData);
		  	$maxAdjClose=0;
    		for($i=0; $i<count($graphData['rawResult']); $i++)
			{
        		if (!$maxAdjClose || (float)($graphData['rawResult'][$i]['high']) > (float)($maxAdjClose))
            		$maxAdjClose = $graphData['rawResult'][$i]['high'];
    		}
		  ?>
            <tr id="<?php echo $chart->id?>">
              <td><?=$graphData['label']?><input type="hidden" name="Symbol[<?php echo  $chart->id?>]" value="<?=$graphData['label']?>"></td>
              <td><?=date("Y-m-d",strtotime($chart->trans_dt))?></td>
              <td><?php echo number_format($graphData['rawResult'][count($graphData['rawResult'])-1]['volume'])?></td>
              <td><?php echo $graphData['rawResult'][0]['close']?></td>
              <td><input type="text"  name="Input_Notes[<?php echo  $chart->id?>]" value="<?php echo  $chart->Input_Notes?>"></td>
              <td><?php echo $graphData['rawResult'][count($graphData['rawResult'])-1]['date']?></td>
              <td><?php echo $maxAdjClose?></td>
              <td class="pricegain"><?php echo $maxAdjClose-$graphData['rawResult'][0]['close']?></td>
              <td><input class="EstimatedInput" onKeyUp="calEstimated($(this));" type="text" style="width:40px;" name="EstimatedSharesPurchased[<?php echo  $chart->id?>]" value="<?php echo  $chart->EstimatedSharesPurchased?>"></td>
              <td class="currentvalue"><?php echo ($graphData['rawResult'][count($graphData['rawResult'])-1]['close']-$graphData['rawResult'][0]['close'])*$chart->EstimatedSharesPurchased?></td>
              <td></td>
            </tr>
            <?php }
		   }?>
          </tbody>
          <tfoot id="tfoot">
            <tr>
              <td class="ticker"><div class="clearfix"></div>
                <div class="row">
                  <select name="portfoleyaTicker" id="portfoleyaTicker" class="form-control sortBy" data-live-search="true" data-live-search-placeholder="Search">
                    <option value="">Ticker</option>
                    <?php foreach ($companyDataAll as $cdata) { ?>
                    <option value="<?= $cdata->ticker ?>">
                    <?= $cdata->ticker ?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="clearfix"></div></td>
              <td class="saveDate"><?=date("Y-m-d")?></td>
              <td class="volume">0</td>
              <td class="adjclose">0</td>
              <td class="inputnotes"><input type="text" class="inputnotesInput"  value=""></td>
              <td class="maxdate">0</td>
              <td class="latestadjclose">0</td>
              <td class="pricegain">0</td>
              <td class="Estimated"><input class="EstimatedInput" type="text" style="width:40px;" onKeyUp="calEstimated($(this));"  value=""></td>
              <td class="currentvalue">0</td>
              <td><button type="button" onClick="addRow($(this));">Add</button></td>
            </tr>
          </tfoot>
        </table>
        <div class="row">
          <div class="col-md-80">
            <div class="panel panel-default">
              <div class="panel-footer clearfix"> <a id="" onClick="saveDataPort();" href="javascript:void(0);" class="lineChart_save btn btn-sm btn-danger pull-right">Save</a> </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!--/.container--> 
</section>
<!--/about-us--> 
<script>
function addRow(obj){
	var rowdata=$(obj).parents('tr');
	if($("#portfoleyaTicker").val()==''){
		alert("select ticker");
		return false;
	}
	//console.log(rowdata.find('.saveDate').html());
	$("#DataTables_Table_0").find('tbody').append('<tr><td><input type="hidden" name="newSymbol[]" value="'+$("#portfoleyaTicker").val()+'">'+$("#portfoleyaTicker").val()+'</td><td>'+$(rowdata).find('.saveDate').html()+'</td><td>'+$(rowdata).find('.volume').html()+'</td><td>'+$(rowdata).find('.adjclose').html()+'</td><td><input type="text" name="newInput_Notes[]" value="'+$(rowdata).find('.inputnotesInput').val()+'"></td><td>'+$(rowdata).find('.maxdate').html()+'</td><td>'+$(rowdata).find('.latestadjclose').html()+'</td><td>'+$(rowdata).find('.pricegain').html()+'</td><td><input type="text" class="EstimatedInput" onKeyUp="calEstimated($(this));" style="width:40px;" name="newEstimatedSharesPurchased[]" value="'+$(rowdata).find('.EstimatedInput').val()+'"></td><td>'+$(rowdata).find('.currentvalue').html()+'</td><td><button onClick="$(this).parents(\'tr\').remove();">Delete</button></td></tr>');
	
}
function calEstimated(obj){
	var pricegain=$(obj).parents('tr').find('.pricegain').html();
	pricegain=parseFloat(pricegain);	
	var EstimatedInput=$(obj).parents('tr').find('.EstimatedInput').val();
	EstimatedInput=parseFloat(EstimatedInput);
	console.log(EstimatedInput);
	currentvalue=pricegain*EstimatedInput;
	$(obj).parents('tr').find('.currentvalue').html(currentvalue.toFixed(2));
}


function saveDataPort(){
	
  var postData = $("#portfolioform").serializeArray();					 
  //console.log(postData);
  var formURL = $('#site_url').val() + '/users/ajaxDatasavePortfolio';


  $.ajax({
    url: formURL,
    type: "POST",
    data: postData,
    dataType: 'json',
    success: function (data, status, jqXHR){
		location.reload(); 
	},
    error: function (error) {
		location.reload(); 
      //console.log(error);
    }

  });


}

</script>
<?php include_once 'footer.php'; ?>
