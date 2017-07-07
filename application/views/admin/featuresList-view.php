<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>
       Features 
        <small>List</small>
      </h1>
       </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-80 ">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Features Data Table</h3>
              <a href="<?=site_url('plans/addfeatures')?>" class="btn btn-flat  btn-circle pull-right"><i class="fa fa-plus-circle fa-3x"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered table-hover datatable">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>     
                  <th>Order</th>             
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                
                  <?php
                  foreach($planList as $plan){
                  ?>
                  <tr>
                  <td><?=$plan->title?></td>
                  <td><?=$plan->description?></td>
                  <td><select name="orderby" data-id="<?=$plan->id?>" onchange="saveDataPort($(this));">
                  		<?php for($i=0;$i<count($planList);$i++){?>
                  		<option <?php echo $plan->orderby==$i?'selected="selected"':''?>   value="<?php echo $i?>"><?php echo $i?></option>
                        <?php }?>
                      </select>
                  </td>                  
                 <td><?=$plan->status==1?"<span class='badge bg-green'>ACTIVE</span>":"<span class='badge bg-yellow'>BLOCKED</span>"?></td>
                  <td><a  href="<?=site_url('plans/editFeatures/'.$plan->id)?>" title=""><span class="badge" data-toggle="tooltip"  data-original-title="Edit Feature"><i class="fa fa-pencil"></i></span></a>
                    <a  href="<?=site_url('plans/activateFeatures/'.$plan->id)?>" title=""><span class="badge bg-green" data-toggle="tooltip"  data-original-title="Activate Feature"><i class="fa fa-check"></i></span></a> 
                    <a  href="<?=site_url('plans/inActivateFeatures/'.$plan->id)?>" title=""><span class="badge bg-yellow" data-toggle="tooltip"  data-original-title="Block Feature"><i class="fa fa-ban"></i></span></a>
<!--                  <a  href="<?=site_url('plans/deleteFeatures/'.$plan->id)?>" title=""><span class="badge bg-red" data-toggle="tooltip"  data-original-title="Delete Plan"><i class="fa fa-trash-o"></i></span></a></td>-->
                </tr>
                  <?php }?>
               </tbody>
                <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Description</th>                  
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
<script>
function saveDataPort(obj){
	
  var featureid=$(obj).data('id');
  var ordernumber=$(obj).val();				 
  //console.log(postData);
  var formURL = $('#site_url').val() + '/plans/ajaxDatasaveFeaturelist';


  $.ajax({
    url: formURL,
    type: "POST",
    data: {featureid:featureid,ordernumber:ordernumber},
    dataType: 'json',
    success: function (data, status, jqXHR){
		//location.reload(); 
	},
    error: function (error) {
		//location.reload(); 
      //console.log(error);
    }

  });


}
</script>
<?php
include_once 'footer.php';
?>