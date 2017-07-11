<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Milestones
        <small>Form</small>
      </h1>
       </section>
 <section class="content">
      <div class="row">
<div class="col-md-80">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><!--Add New Plan--></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?=site_url('company/editMilestone/').$milestone->id?>" method="post">
              <div class="form-group">
                  <label for="email" class="col-sm-20 control-label">Industry Type*</label>

                  <div class="col-sm-40">                 
                  <select required="" name="industryType" id="industryType" class="form-control">
                  	  <option  value="">Select Industry</option>
                  	  <option <?php echo $milestone->industryType=="Accountant"?'selected="selected"':''?> value="Accountant">Accountant </option>
                      <option <?php echo $milestone->industryType=="Jewellery Professionals"?'selected="selected"':''?> value="Jewellery Professionals">Jewellery Professionals </option>
                      <option <?php echo $milestone->industryType=="Diamond grader / Assorter"?'selected="selected"':''?> value="Diamond grader / Assorter">Diamond grader / Assorter </option>
                      <option <?php echo $milestone->industryType=="Manual Jewellery Designer"?'selected="selected"':''?> value="Manual Jewellery Designer">Manual Jewellery Designer </option>
                      <option <?php echo $milestone->industryType=="CADD Jewellery Designer"?'selected="selected"':''?> value="CADD Jewellery Designer">CADD Jewellery Designer </option>
                      <option <?php echo $milestone->industryType=="Merchandiser"?'selected="selected"':''?> value="Merchandiser">Merchandiser </option>
                      <option <?php echo $milestone->industryType=="Production Manager- Diamonds"?'selected="selected"':''?> value="Production Manager- Diamonds">Production Manager- Diamonds </option>
                      <option <?php echo $milestone->industryType=="Production Manager &ndash; Jewellery"?'selected="selected"':''?> value="Production Manager &ndash; Jewellery">Production Manager &ndash; Jewellery </option>
                      <option <?php echo $milestone->industryType=="Quality Control Professional"?'selected="selected"':''?> value="Quality Control Professional">Quality Control Professional </option>
                      <option <?php echo $milestone->industryType=="Manager &ndash; Export/Import"?'selected="selected"':''?> value="Manager &ndash; Export/Import">Manager &ndash; Export/Import </option>
                      <option <?php echo $milestone->industryType=="Stock Keeper / Custodian"?'selected="selected"':''?> value="Stock Keeper / Custodian">Stock Keeper / Custodian </option>
                      <option <?php echo $milestone->industryType=="Instructors"?'selected="selected"':''?> value="Instructors">Instructors </option>
                      <option <?php echo $milestone->industryType=="Machinery and Technical Support"?'selected="selected"':''?> value="Machinery and Technical Support">Machinery and Technical Support </option>
                      <option <?php echo $milestone->industryType=="Retail Sales Professional"?'selected="selected"':''?> value="Retail Sales Professional">Retail Sales Professional </option>
                      <option <?php echo $milestone->industryType=="Corporate Sales Professional"?'selected="selected"':''?> value="Corporate Sales Professional">Corporate Sales Professional </option>
                      <option <?php echo $milestone->industryType=="Accounts and Finance Professional"?'selected="selected"':''?> value="Accounts and Finance Professional">Accounts and Finance Professional </option>
                      <option <?php echo $milestone->industryType=="Human Resource Professional"?'selected="selected"':''?> value="Human Resource Professional">Human Resource Professional </option>
                      <option <?php echo $milestone->industryType=="Marketing Professional"?'selected="selected"':''?> value="Marketing Professional">Marketing Professional </option>
                      <option <?php echo $milestone->industryType=="Communications / PR Professional"?'selected="selected"':''?> value="Communications / PR Professional">Communications / PR Professional </option>
                      <option <?php echo $milestone->industryType=="IT Professional"?'selected="selected"':''?> value="IT Professional">IT Professional </option>
                      <option <?php echo $milestone->industryType=="Data Operator"?'selected="selected"':''?> value="Data Operator">Data Operator </option>
                      <option <?php echo $milestone->industryType=="Business Development"?'selected="selected"':''?> value="Business Development">Business Development </option>
                      <option <?php echo $milestone->industryType=="Freelancer"?'selected="selected"':''?> value="Freelancer">Freelancer </option>
                      <option <?php echo $milestone->industryType=="Administrative Manager"?'selected="selected"':''?> value="Administrative Manager">Administrative Manager </option>
                      <option <?php echo $milestone->industryType=="Store manager"?'selected="selected"':''?> value="Store manager">Store manager </option>
                      <option <?php echo $milestone->industryType=="Cashier"?'selected="selected"':''?> value="Cashier">Cashier </option>  
                      <option <?php echo $milestone->industryType=="Goldsmith/silversmith"?'selected="selected"':''?> value="Goldsmith/silversmith">Goldsmith/silversmith </option>
                      <option <?php echo $milestone->industryType=="Gemologist"?'selected="selected"':''?> value="Gemologist">Gemologist </option>
                      <option>Other</option>
                  </select>
          		  <?php echo form_error('industryType'); ?>
                  </div>
                </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="f_name" class="col-sm-20 control-label">Title*</label>

                  <div class="col-sm-40">                  
                   <input  maxlength="100" id="Title" type="text" class="form-control" placeholder="Title" required="" name="Title" value="<?php echo $milestone->Title; ?>" />
                    <?php echo form_error('Title'); ?>
                  </div>
                </div>
                <div class="form-group">
                <label for="l_name" class="col-sm-20 control-label">No. Days*</label>
                <div class="col-sm-40">                  
                  <input id="l_name" maxlength="100" type="text" class="form-control numbers-only allow-decimal" required="" placeholder="days" name="days" value="<?php echo $milestone->days; ?>"/>
                  <?php echo form_error('days'); ?> </div>
              </div>
                 <div class="form-group">
                  <label for="email" class="col-sm-20 control-label">Weight*</label>

                  <div class="col-sm-40">
                  <input maxlength="100" type="text" required="required" class="form-control numbers-only allow-decimal" placeholder="weight" name="weight" value="<?php echo $milestone->weight; ?>" />
          		  <?php echo form_error('weight'); ?>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label for="phone_no" class="col-sm-20 control-label">Description</label>

                  <div class="col-sm-40">
                  <textarea name="description" class="form-control" id="description"><?php echo $milestone->description; ?></textarea>
                  
            		<?php echo form_error('description'); ?>
                   
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          
          </div>
      </div>
 </section>
</div>
<?php
include_once 'footer.php';
?>