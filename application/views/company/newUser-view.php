<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Employee
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
            <form class="form-horizontal" action="<?=site_url('company/addUser')?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="f_name" class="col-sm-20 control-label">First Name*</label>

                  <div class="col-sm-40">                  
                   <input  maxlength="100" id="f_name" type="text" class="form-control" placeholder="Enter First Name" required="" name="f_name" value="<?php echo set_value('f_name'); ?>" />
                    <?php echo form_error('f_name'); ?>
                  </div>
                </div>
                <div class="form-group">
                <label for="l_name" class="col-sm-20 control-label">Last Name</label>
                <div class="col-sm-40">                  
                  <input id="l_name" maxlength="100" type="text" class="form-control" placeholder="Enter Last Name" name="l_name" value="<?php echo set_value('l_name');?>"/>
                  <?php echo form_error('l_name'); ?> </div>
              </div>
                 <div class="form-group">
                  <label for="email" class="col-sm-20 control-label">Email*</label>

                  <div class="col-sm-40">
                  <input maxlength="100" type="email" required="required" class="form-control" placeholder="Enter Email" name="email" value="<?php echo set_value('email');?>" />
          		  <?php echo form_error('email'); ?>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="phone_no" class="col-sm-20 control-label">Phone No.*</label>

                  <div class="col-sm-40">
                   <input maxlength="100" type="text" required="required" name="phone_no" class="form-control" placeholder="Enter Phone no." value="<?php echo set_value('phone_no');?>"/>
            		<?php echo form_error('phone_no'); ?>
                   
                  </div>
                </div>
                 <div class="form-group">
                  <label for="occupation" class="col-sm-20 control-label">Occupation*</label>

                  <div class="col-sm-40">
                   <input maxlength="100" type="text" required="required" name="occupation" class="form-control" placeholder="Enter Occupation" value="<?php echo set_value('occupation');?>"/>
                   <?php echo form_error('occupation'); ?>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="company" class="col-sm-20 control-label">Company Name*</label>

                  <div class="col-sm-40">
                 <input maxlength="100" type="text" required="required" name="company" class="form-control" placeholder="Enter Company" value="<?php echo set_value('company');?>"/>
            <?php echo form_error('company'); ?>
                        
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="address_1" class="col-sm-20 control-label">Address Line1*</label>

                  <div class="col-sm-40">
                 <input  maxlength="100" type="text" required="" name="address_1" class="form-control" placeholder="Enter Address Line 1" value="<?php echo set_value('address_1');?>" />
            <?php echo form_error('address_1'); ?>
                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="address_2" class="col-sm-20 control-label">Address Line 2</label>

                  <div class="col-sm-40">
                 <input maxlength="100" type="text"  name="address_2" class="form-control" placeholder="Enter address_2" value="<?php echo set_value('address_2');?>"/>
            <?php echo form_error('address_2'); ?>
                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="company" class="col-sm-20 control-label">City*</label>

                  <div class="col-sm-40">
                <input maxlength="100" type="text" required="required" name="city" class="form-control" placeholder="Enter City" value="<?php echo set_value('city');?>"/>
            <?php echo form_error('city'); ?>
                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="state" class="col-sm-20 control-label">State*</label>

                  <div class="col-sm-40">
                 <input maxlength="100" type="text" required="required" name="state" class="form-control" placeholder="Enter State" value="<?php echo set_value('state');?>"/>
            <?php echo form_error('state'); ?>
                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="company" class="col-sm-20 control-label">Country*</label>

                  <div class="col-sm-40">
                <input maxlength="100" type="text" required="required" name="country" class="form-control" placeholder="Enter Country" value="<?php echo set_value('country');?>"/>
            <?php echo form_error('country'); ?>
                        
                  </div>
                </div>
                <div class="form-group">
                  <label for="company" class="col-sm-20 control-label">Zip*</label>

                  <div class="col-sm-40">
                 <input maxlength="100" type="text" name="zip"  class="form-control" placeholder="Enter Zip" value="<?php echo set_value('zip');?>"/>
            <?php echo form_error('zip'); ?>
                        
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