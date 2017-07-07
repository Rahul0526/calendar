<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			New Milestones
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
					<form class="form-horizontal" action="<?=site_url('company/addMilestones')?>" method="post">
						<div class="form-group">
							<label for="email" class="col-sm-20 control-label">Industry Type*</label>
							<div class="col-sm-40">                 
								<select required="" name="industryType" id="industryType" class="form-control">
									<option value="">Select Industry</option>
									<option value="Accountant">Accountant </option>
									<option value="Jewellery Professionals ">Jewellery Professionals </option>
									<option value="Diamond grader / Assorter">Diamond grader / Assorter </option>
									<option value="Manual Jewellery Designer">Manual Jewellery Designer </option>
									<option value="CADD Jewellery Designer">CADD Jewellery Designer </option>
									<option value="Merchandiser">Merchandiser </option>
									<option value="Production Manager- Diamonds">Production Manager- Diamonds </option>
									<option value="Production Manager &ndash; Jewellery">Production Manager &ndash; Jewellery </option>
									<option value="Quality Control Professional">Quality Control Professional </option>
									<option value="Manager &ndash; Export/Import">Manager &ndash; Export/Import </option>
									<option value="Stock Keeper / Custodian">Stock Keeper / Custodian </option>
									<option value="Instructors">Instructors </option>
									<option value="Machinery and Technical Support">Machinery and Technical Support </option>
									<option value="Retail Sales Professional">Retail Sales Professional </option>
									<option value="Corporate Sales Professional">Corporate Sales Professional </option>
									<option value="Accounts and Finance Professional">Accounts and Finance Professional </option>
									<option value="Human Resource Professional">Human Resource Professional </option>
									<option value="Marketing Professional">Marketing Professional </option>
									<option value="Communications / PR Professional">Communications / PR Professional </option>
									<option value="IT Professional">IT Professional </option>
									<option value="Data Operator">Data Operator </option>
									<option value="Business Development">Business Development </option>
									<option value="Freelancer">Freelancer </option>
									<option value="Administrative Manager">Administrative Manager </option>
									<option value="Store manager">Store manager </option>
									<option value="Cashier">Cashier </option>  
									<option value="Goldsmith/silversmith">Goldsmith/silversmith </option>
									<option value="Gemologist">Gemologist </option>
									<option>Other</option>
								</select>
								<?php echo form_error('industryType'); ?>
							</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label for="f_name" class="col-sm-20 control-label">Title*</label>
								<div class="col-sm-40">                  
									<input  maxlength="100" id="Title" type="text" class="form-control" placeholder="Title" required="" name="Title" value="<?php echo set_value('Title'); ?>" />
									<?php echo form_error('Title'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="l_name" class="col-sm-20 control-label">No. Days*</label>
								<div class="col-sm-40">                  
									<input id="l_name" maxlength="100" type="text" class="form-control numbers-only" required="" placeholder="days" name="days" value="<?php echo set_value('days');?>"/>
									<?php echo form_error('days'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-20 control-label">Weight*</label>
								<div class="col-sm-40">
									<input maxlength="100" type="text" required="required" class="form-control numbers-only" placeholder="weight" name="weight" value="<?php echo set_value('weight');?>" />
									<?php echo form_error('weight'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="phone_no" class="col-sm-20 control-label">Description</label>
								<div class="col-sm-40">
									<textarea name="description" class="form-control" id="description"><?php echo set_value('description');?></textarea>
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