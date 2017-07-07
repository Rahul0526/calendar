<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Orders HIstory
			<small>List</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-80 ">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Orders Data Table</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
					
						<table  class="table table-bordered table-hover datatable">
							<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>City</th>
								<th>Country</th>                  
								<th>Plan</th>
								<th>PROFILE START DATE</th>
								<th>NEXT BILLING DATE</th>
								<th>PROFILEID</th>
								<th>NUM CYCLES COMPLETED</th>
								<th>AMT</th>
								<th>REGULAR BILLING PERIOD</th>
								<th>Status</th>
							
							</tr>
							</thead>
						 <tbody>
						 <?php
								foreach($orderList as $order) {
								$paypalDetails=json_decode($order->rawdata);
								// print_r($paypalDetails);
								?><tr data-id="<?=$order->id?>">
									<td><?=$order->f_name." ".$order->l_name?></td>
									<td><?=$order->email?></td>
									<td><?=$order->city?></td>
									<td><?=$order->country?></td>                
									<td><?=$userPlan[$order->plan_id];?></td>
									<td><?=(@$paypalDetails->PROFILESTARTDATE ? @$paypalDetails->PROFILESTARTDATE : "")?></td>
									<td><?=$order->Paypal_NEXTBILLINGDATE?></td>
									<td><?=(@$paypalDetails->PROFILEID ? @$paypalDetails->PROFILEID : "")?></td>
									<td style="text-align:center !important;"><?=(@$paypalDetails->NUMCYCLESCOMPLETED ? @$paypalDetails->NUMCYCLESCOMPLETED : "")?></td>
									<td><?=(@$paypalDetails->CURRENCYCODE ? @$paypalDetails->CURRENCYCODE : "").'&nbsp;'.(@$paypalDetails->AMT ? @$paypalDetails->AMT : "")?></td>
									<td><?=(@$paypalDetails->REGULARBILLINGFREQUENCY ? @$paypalDetails->REGULARBILLINGFREQUENCY : "").' '.(@$paypalDetails->REGULARBILLINGPERIOD ? @$paypalDetails->REGULARBILLINGPERIOD : "")?></td>
									<td><?=(@$paypalDetails->STATUS ? @$paypalDetails->STATUS : "")?></td>
								</tr>
								<?php } ?>
						 </tbody>
							<tfoot>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>City</th>
								<th>Country</th>
								<th>Occupation</th>
								<th>Company</th>
								<th>Plan</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							</tfoot>
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