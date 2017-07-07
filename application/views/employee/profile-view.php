<?php
include_once 'header.php';
?>
<section>
  <div class="container">
 
  <div class="col-xs-70 col-md-offset-5">
     <form action="<?=site_url('Employee/profile');?>" method="post" name="userProfile">
        <div class="panel panel-default">
          <div class="panel-heading">
          <h2 class="no-margin"> User Profile</h2>
          </div>
          <div class="panel-body">
           
          <div class="col-md-40">
          <div class="form-group">
            <label class="control-label">First Name*</label>
            <input  maxlength="100" type="text" class="form-control" placeholder="Enter First Name" required="" name="f_name" value="<?=$userInfo->f_name?>" />
            <?php echo form_error('f_name'); ?>
          </div>
          <div class="form-group">
            <label class="control-label">Last Name</label>
            <input maxlength="100" type="text" class="form-control" placeholder="Enter Last Name" name="l_name" value="<?=$userInfo->l_name?>"/>
            
          </div>
          <div class="form-group">
            <label class="control-label">Email*</label>
            <input maxlength="100" type="email" required="required" class="form-control" placeholder="Enter Email" name="email" value="<?=$userInfo->email?>" readonly=""/>
            <?php echo form_error('email'); ?>
          </div>
          <div class="form-group">
            <label class="control-label">Phone No.*</label>
            <input maxlength="100" type="text" required="required" name="phone_no" class="form-control" placeholder="Enter Phone no." value="<?=$userInfo->phone_no?>"/>
            <?php echo form_error('phone_no'); ?>
          </div>
           <div class="form-group">
            <label class="control-label">Occupation*</label>
            <input maxlength="100" type="text" required="required" name="occupation" class="form-control" placeholder="Enter Occupation" value="<?=$userInfo->occupation?>"/>
            <?php echo form_error('occupation'); ?>
          </div>
             <div class="form-group">
            <label class="control-label">Company Name*</label>
            <input maxlength="100" type="text" required="required" name="company" class="form-control" placeholder="Enter Company" value="<?=$userInfo->company?>"/>
            <?php echo form_error('company'); ?>
          </div>      
           
          </div>
           <div class="col-md-40">
          <div class="form-group">
            <label class="control-label">Address Line1*</label>
            <input  maxlength="100" type="text" required="" name="address_1" class="form-control" placeholder="Enter Address Line 1" value="<?=$userInfo->address_1?>" />
            <?php echo form_error('address_1'); ?>
          </div>
          <div class="form-group">
            <label class="control-label">Address Line 2</label>
            <input maxlength="100" type="text" name="address_2" class="form-control" placeholder="Enter Address Line 2" value="<?=$userInfo->address_2?>"/>
          </div>
          <div class="form-group">
            <label class="control-label">City*</label>
            <input maxlength="100" type="text" required="required" name="city" class="form-control" placeholder="Enter City" value="<?=$userInfo->city?>"/>
            <?php echo form_error('city'); ?>
          </div>
          <div class="form-group">
            <label class="control-label">State*</label>
            <input maxlength="100" type="text" required="required" name="state" class="form-control" placeholder="Enter State" value="<?=$userInfo->state?>"/>
            <?php echo form_error('state'); ?>
          </div>
             <div class="form-group">
            <label class="control-label">Country*</label>
            <input maxlength="100" type="text" required="required" name="country" class="form-control" placeholder="Enter Country" value="<?=$userInfo->country?>"/>
            <?php echo form_error('country'); ?>
          </div>
             <div class="form-group">
            <label class="control-label">Zip*</label>
            <input maxlength="100" type="text" name="zip"  class="form-control" placeholder="Enter Zip" value="<?=$userInfo->zip?>"/>
            <?php echo form_error('zip'); ?>
          </div>
           <div class="form-group">
            <label class="control-label">Employer Name</label>
            <input maxlength="100" type="text" name="" readonly="readonly"  class="form-control" placeholder="Billing" value="<?=$employerDetails->f_name?> <?=$employerDetails->l_name?>"/>
           
          </div> 
            
          </div>
            
          </div>
          <div class="panel-footer clearfix">
        <div class="pull-right">
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" >Update</button>
          </div>
          </div>
         
      </div>
     </form>
    </div>
  </div>
</section>

<?php 
include_once 'footer.php';
?>