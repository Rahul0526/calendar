<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
       Payment History 
        <small>List</small>
      </h1>
       </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-80 ">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payment History Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
              <table  class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                  <th>PROFILEID</th>                  
                  <th>PROFILESTARTDATE</th>
                  <th>NEXTBILLINGDATE</th>  
                   <th>NUMCYCLESCOMPLETED</th> 
                  <th>SHIPTONAME</th>              
                  <th>AMT</th>
                   <th>STATUS</th>
                </tr>
                </thead>
               <tbody>
                
                  <?php
				  if(!empty($paypalhistoryList)){
                  foreach($paypalhistoryList as $milestones){
					  	$rwadata=(json_decode($milestones->rawdata)); 				  
                  ?>
                  <tr>
                  <td><?=@$rwadata->PROFILEID?></td>                 
                  <td><?=@$rwadata->PROFILESTARTDATE?></td>
                  <td><?=@$rwadata->NEXTBILLINGDATE?></td>
                  <td><?=@$rwadata->NUMCYCLESCOMPLETED?></td>    
                   <td><?=@$rwadata->SHIPTONAME?></td> 
                    <td><?=@$rwadata->AMT?> <?=@$rwadata->CURRENCYCODE?></td>               
                <td><?=@$rwadata->STATUS?></td>   
                </tr>
                  <?php }
				  }?>
               </tbody>
                
              </table>
              
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
  </section>  
</div>
<?php
include_once 'footer.php';
?>