<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Calendar Jobs</title>
         
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
   
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link href="<?=base_url()?>assets/plugins/sweetAlert/dist/sweetalert.css" rel="stylesheet">
<!--    <link href="<?=base_url('assets')?>/plugins/ckeditor/contents.css" rel="stylesheet" />-->
    <link rel="stylesheet" href="<?=base_url('assets')?>/dist/css/AdminLTE.css" />
    <link rel="stylesheet" href="<?=base_url('assets')?>/dist/css/skins/_all-skins.min.css">  <link rel="stylesheet" href="<?=base_url('assets')?>/dist/css/custom.css">
    <!-- jQuery 2.2.3 -->
	<script src="<?=base_url('assets')?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
    
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>">
     <link rel="stylesheet" href="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.css')?>">
    
	
</head>
<body class="hold-transition skin-blue sidebar-mini">
                 
<div class="wrapper">
  <header class="main-header">

    <!-- Logo -->
    <a href="<?=site_url('Company/logout')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Augurs</b>.in</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Augurs.</b>in</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('assets')?>/images/Logo.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->userdata('password')?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('assets')?>/images/Logo.png" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('name')?>
                  <small>Last Login <?=date("M d Y h:s",  strtotime($this->session->userdata('last_login')))?></small>
                  <input type="hidden" value="<?=site_url()?>" id="site_url" />
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=site_url('Company/setting')?>" class="btn btn-default btn-flat">Setting</a>
                </div>
                <div class="pull-right">
                  <a href="<?=site_url('Company/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>

    </nav>
  </header>
  
