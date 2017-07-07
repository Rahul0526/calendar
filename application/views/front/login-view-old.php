  <?php include_once 'header.php';?>
<section>
<div class="container">
  
<div class="center">  
                <h2>Company Login</h2>
                
            </div> 
<div class="row" style="margin-top:20px">
    <div class="col-xs-80 col-sm-60 col-md-40 col-sm-offset-10 col-md-offset-20">
      <form role="form" action="<?=site_url('users/login')?>" method="post">
			<fieldset>
				<h2>Please Sign In</h2>
				<hr class="colorgraph">
                                <div class="row">  <?php if($this->session->flashdata('error'))
                {?>
                 <div class="alert alert-danger" data-dismiss="alert" data-hideInteval="3">
                        <?=$this->session->flashdata('error')?>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>  
                <?php }
                 ?>
                 
                <script type="text/javascript">
                setTimeout(function() {
        $('.alert').fadeOut('slow');
             }, 2000); 
                </script>
                                                </div>
				<div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
                    <?php echo form_error('email'); ?>
				</div>
				<div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
                    <?php echo form_error('password'); ?>
				</div>
				<div class="row">
					<a href="" class="btn btn-link pull-right" data-toggle="modal" data-target="#fpModal">Forgot Password?</a>
                                </div>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-40 col-sm-40 col-md-40">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
					</div>
					<div class="col-xs-40 col-sm-40 col-md-40">
						<a href="<?=site_url('plan')?>" class="btn btn-lg btn-primary btn-block">Register</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>

</div>
</section>
<div class="modal fade" id="fpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
      </div>
       <form role="form" action="<?=site_url('users/forgotPassword')?>" method="post">
      <div class="modal-body">
       
       <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">@</span>
  <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1" required="">
</div>
        
        
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
</form>
    </div>
  </div>
</div>
  <?php include_once 'footer.php';?>