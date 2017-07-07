<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url('assets')?>"><b>Admin</b> Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?=site_url('Admin/login')?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php echo form_error('email'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('password'); ?>
      </div>
      <div class="row">
        <div class="col-xs-80">
          <div class="row">  <?php if($this->session->flashdata('error'))
                {?>
                 <div class="alert alert-danger" data-dismiss="alert" data-hideInteval="3">
                        <?=$this->session->flashdata('error')?>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>  
                <?php }
                 if($this->session->flashdata('success'))
                {?>
                 <div class="alert alert-success">
                        <?=$this->session->flashdata('success')?>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>  
                <?php }?>
                <script type="text/javascript">
                setTimeout(function() {
        $('.alert').fadeOut('slow');
             }, 1500); 
                </script>
                                                </div>
          <div class="checkbox icheck pull-right">
<!--            <label>
              <input type="checkbox"> Remember Me
            </label>-->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-25">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

      <!-- /.social-auth-links -->

    <a href="#" data-toggle="modal" data-target="#fpModal">I forgot my password</a><br>
      </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<div class="modal fade" id="fpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
      </div>
       <form role="form" action="<?=site_url('admin/forgotPassword')?>" method="post">
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

<!-- jQuery 2.2.3 -->
<script src="<?=base_url('assets')?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url('assets')?>/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url('assets')?>/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
