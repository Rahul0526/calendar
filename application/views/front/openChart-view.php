<?php include_once 'header.php'; 
$chart=$chart[0];
?>
<?php if($chart->type == 'lineChart'){
  $stackChart=  json_decode($chart->chartData);
  //print_r($chart);die;
          
  ?>

<div class="row-border home-row">
  <section>
    <div class="col-md-30"><hr class="colorgraph"></div>
    <div class="heading-title col-md-20">
     <?php echo $chart->title?>
    </div>
    <div class="col-md-30"><hr class="colorgraph"></div>
  </section>

  <section class="container">
    <div class="row">
      <div class="col-md-80">
            <!-- LINE CHART -->
         
        <div class="panel panel-default">
        
          <div class="panel-body">
          
            <div class="chart">
              <canvas id="lineChart"  data-x=" <?=implode(",",$stackChart->date)?>" data-y=" <?=implode(",",$stackChart->val)?>" data-label="Ticker <?=$stackChart->label?>"></canvas> 
            </div>
           
          </div><!-- /.panel-body -->
        </div><!-- /.panel -->

      </div><!-- /.col (RIGHT) -->
    </div><!-- /.row -->
  </section>
</div>
<?php }?>
<?php if($chart->type == 'statisticsTable'){
  $companyData=  json_decode($chart->chartData);
 //print_r($companyData);die;
 $companyData=(isset($companyData->rawResult))?$companyData->rawResult:$companyData;
//  $companyData=$result->earningTable;
  ?>
<div class="row-border home-row">
  <section>
    <div class="col-md-30"><hr class="colorgraph"></div>
    <div class="heading-title col-md-20">
       <?php echo $chart->title?>
    </div>
    <div class="col-md-30"><hr class="colorgraph"></div>
  </section>

  <section class="container">
    <div class="row">
      <div class="col-md-80">
      
        <div class="panel ">

          <div class="panel-body">
            <table class="dataTable2 display table-bordered" cellspacing="0" width="100%">
              <thead>
                
                   <tr>
                   			 <?php foreach($companyData[0] as $key=>$row){?>                                   
                                    <th><?php echo $key?></th>                                   
                               <?php }?>
                                 
                </tr>
              </thead>
              <tbody>
                <?php foreach($companyData as $row){?>
                <tr>
                 <?php foreach($companyData[0] as $key=>$row2){?>                                   
                                    <td><?php echo $row->$key?></td>                                   
                  <?php }?>
                  
                </tr>
                <?php }?>                
              </tbody>
            </table>
          </div><!-- /.panel-body -->
        </div><!-- /.panel -->
      </div><!-- /.col (LEFT) -->

    </div><!-- /.row -->
  </section>
</div>
<?php }?>
<?php if($chart->type == 'priceTable'){
  $result=  json_decode($chart->chartData);
  $companyData=$result->earningTable;
  $priceChange=$result->priceTable;
  //print_r($historicChart);die;
  ?>
<div class="row-border home-row">
  
  <div class="col-md-35">
    <div class="row-border">
      <section>
        <div class="col-md-20"><hr class="colorgraph"></div>
        <div class="heading-title col-md-40">
          Earnings & Ratings
        </div>
        <div class="col-md-20"><hr class="colorgraph"></div>
      </section>
    </div>
  </div>
   <div class="col-md-45">
    <div class="row-border">
      <section>
        <div class="col-md-20"><hr class="colorgraph"></div>
        <div class="heading-title col-md-40">
          Dollar($) & Percent(%) Changes
        </div>
        <div class="col-md-20"><hr class="colorgraph"></div>
      </section>
    </div>
   </div>
  
  
</div>
<div class="row-border home-row">
  <div class="row-border">
      <section class="container">
 <div class="col-md-35">   
        
          <div class="col-md-80 no-padding no-margin">
            <!-- AREA CHART -->
            <div class="panel panel-default">

              <div class="panel-body">
                <table class=" dataTable2 display table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th style="width: 250px!important;">Company</th>
                      <th>Earnings</th>
                      <th>Target Price</th>
                      <th>Analyst</th>
                    </tr>
                  </thead>
              <tbody>
                     <?php foreach($companyData as $row){?>
                <tr>
                  
                   <td><?=$row->company?></td>
                   <td><?=$row->earnings?></td>
                   <td><?=$row->target_price?></td>
                   <td><?=$row->recommendation?></td>
                </tr>
                     <?php }?>
              </tbody>
                </table>
              </div><!-- /.panel-body -->
            </div><!-- /.panel -->

          </div><!-- /.col (LEFT) -->

  </div>

  <div class="col-md-45">
          <div class="col-md-80 no-padding no-margin">
            <!-- AREA CHART -->
            <div class="panel panel-default">
              <div class="panel-body">
                <table class=" dataTable2 display table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th>% Day</th>
                      <th>$ Day</th>
                      <th>% Week</th>
                      <th>$ Week</th>
                      <th>% Month</th>
                      <th>$ Month</th>
                      <th>% Quarter</th>
                      <th>$ Quarter</th>
                      <th>% Year</th>
                      <th>$ Year</th>
                    </tr>
                  </thead>
                  
                  <tbody>

                    <?php 
                    foreach($priceChange as $row){?>
                    <tr>
                      <td><?=$row->ticker?></td>                    
                      <td><?=round($row->percent_change_day,3)?>%</td>
                       <td>$<?=$row->price_change_day?></td>                     
                      <td><?=round($row->percent_change_week,3)?>%</td>
                      <td>$<?=$row->price_change_week?></td>                     
                      <td><?=round($row->percent_change_month,3)?>%</td>
                      <td>$<?=$row->price_change_month?></td>                      
                      <td><?=round($row->percent_change_quarter,3)?>%</td>
                      <td>$<?=$row->price_change_quarter?></td>                     
                      <td><?=round($row->percent_change_year,3)?>%</td>
                       <td>$<?=$row->price_change_year?></td>
                    </tr>

                    <?php  }?>
                   
                  </tbody>
                </table>
              </div><!-- /.panel-body -->
            </div><!-- /.panel -->

          </div><!-- /.col (LEFT) -->

      
  </div>
      </section>
    </div>
</div>
<?php }?>
<?php if($chart->type == 'barChart'){
   $historicChart=  json_decode($chart->chartData);
  //print_r($historicChart->days);die;
  ?>
<div class="row-border home-row">
  <section>
    <div class="col-md-30"><hr class="colorgraph"></div>
    <div class="heading-title col-md-20">
     <?php echo $chart->title?>
    </div>
    <div class="col-md-30"><hr class="colorgraph"></div>
  </section>

  <section class="container">
    <div class="row">
      <div class="col-md-80">
    <!-- BAR CHART -->
        <div class="panel panel-default">
          <div class="panel-heading with-border">
            <h3 class="panel-title text-center">Price All Time Low To All Time High</h3>
          </div>
          <div class="panel-body">
            <div class="chart">
              <canvas id="barChart"  data-x=" <?=implode(",",$historicChart->days)?>" data-y=" <?=implode(",",$historicChart->val)?>" data-label="Ticker <?=$historicChart->label?>"></canvas>
            </div>
          </div><!-- /.panel-body -->
        </div><!-- /.panel -->

      </div><!-- /.col (RIGHT) -->
    </div><!-- /.row -->
  </section>
</div>
<?php }?>

<?php include_once 'footer.php'; ?>