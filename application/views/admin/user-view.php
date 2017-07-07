<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
       Companies/Employes 
        <small>List</small>
      </h1>
       </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-80 ">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            
              <table  class="table table-bordered table-hover datatable2">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>City</th>
                  <th>Country</th>
                  <th>Occupation</th>
                  <th>Type</th>
                  <th>Plan</th>
                  <th>NEXT BILLING DATE</th>
                  <th>PROFILEID</th>
                  <th>NUM CYCLES COMPLETED</th>
                  <th>AMT</th>
                  <th>REGULAR BILLING PERIOD</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                
                  <?php
				  if(!empty($userList)){
                  foreach($userList as $user){
					  $paypalDetails=json_decode($user->Paypal_otherinformation);
                  ?>
                  <tr>
                  <td><?=$user->f_name." ".$user->l_name?></td>
                  <td><?=$user->email?></td>
                  <td><?=$user->city?></td>
                  <td><?=$user->country?></td>
                  <td><?=$user->occupation?></td>
                  <td><?=$user->type?></td>
                  <td><?=@$userPlan[$user->plan_id];?></td>
                  <td><?=$user->Paypal_NEXTBILLINGDATE?></td>
                  <td><?=@$paypalDetails->PROFILEID?></td>
                  <td style="text-align:center !important;"><?=@$paypalDetails->NUMCYCLESCOMPLETED?></td>
                  <td><?=@$paypalDetails->CURRENCYCODE?><?=@$paypalDetails->AMT?></td>
                  <td><?=@$paypalDetails->REGULARBILLINGFREQUENCY.' '.@$paypalDetails->REGULARBILLINGPERIOD?></td>
                  <td><?=$user->status==0?"<span class='badge bg-green'>ACTIVE</span>":"<span class='badge bg-yellow'>BLOCKED</span>"?></td>
                  <td><a  href="<?=site_url('admin/activateUser/'.$user->id)?>" title=""><span class="badge bg-green" data-toggle="tooltip"  data-original-title="Activate User"><i class="fa fa-check"></i></span></a> 
                    <a  href="<?=site_url('admin/inActivateUser/'.$user->id)?>" title=""><span class="badge bg-yellow" data-toggle="tooltip"  data-original-title="Block User"><i class="fa fa-ban"></i></span></a>
                  <a  href="<?=site_url('admin/deleteUser/'.$user->id)?>" title=""><span class="badge bg-red" data-toggle="tooltip"  data-original-title="Delete User"><i class="fa fa-trash-o"></i></span></a></td>
                </tr>
                  <?php } 
				  }?>
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