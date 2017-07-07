<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>
<?=$title?>
</title>

<!-- core CSS -->
<link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/plugins/sweetAlert/dist/sweetalert.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/animate.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/prettyPhoto.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
<link href="<?=base_url()?>assets/css/main.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/responsive.css" rel="stylesheet">
<link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet">
<script src="<?=base_url()?>assets/js/jquery.js"></script> 
<!--[if lt IE 9]>
    <script src="<?=base_url()?>assets/js/html5shiv.js"></script>
    <script src="<?=base_url()?>assets/js/respond.min.js"></script>
    <![endif]-->
<link rel="shortcut icon" href="<?=base_url()?>assets/images/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>assets/images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>assets/images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>assets/images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?=base_url()?>assets/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body class="homepage">
<header id="header"> 
  
  <!--    /.top-bar-->
  
  <nav class="navbar navbar-inverse" role="banner">
    <div class="container">
    <div class=" col-xs-10 hidden-xs logo-top">
    <?php if($this->session->userdata('uid')){
                     $homeUrl=site_url('Employee/index');
                   }
                   else{
                      $homeUrl=site_url('Employee/home');
                   }
?>
    <a class="navbar-brand" href="<?=$homeUrl?>"><img src="<?=base_url()?>assets/images/Logo.png" alt="Log"/></a>
    
    </div>
    
    <div class=" col-xs-10 hidden-lg hidden-sm hidden-md logo-top" style="margin:0 auto; float:none;">
    
    <a class="navbar-brand" href="<?=$homeUrl?>"><img src="<?=base_url()?>assets/images/Logo.png" alt="Log"/></a>
    
    </div>
	<div class=" col-sm-42 col-xs-80">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
       
        <input type="hidden" value="<?=site_url()?>" id="site_url" />
        <div class=" col-sm-80">
        <a class="navbar-brand" href="<?=$homeUrl?>">Augurs.In</a></div>
        <div class=" clearfix"></div>
        <div class=" col-sm-80">
        <span class="text-primary text-bold">Task Schedule | data | calendar with jobs</span> 
        </div>
        </div>
    
    
    
    </div>  
    
    <div class=" col-sm-26 col-xs-80 pull-right">
    <div class=" navbar-right">
        <ul class="nav navbar-nav">
          <?php if($this->session->userdata('uid')){?>
          <li class="dropdown "> <a href="<?=$homeUrl?>" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i>
            <?=$this->session->userdata('name')?>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?=site_url('Employee/profile')?>">Profile</a></li>           
              <li ><a href="<?=site_url('Employee/setting')?>">Settings</a></li>
              <li><a href="<?=site_url('Employee/logout')?>">Logout</a></li>
              <li class="small"><a >Last Login-
                <?=date("M d Y h:s", strtotime($this->session->userdata('last_login')))?>
                </a></li>
            </ul>
          </li>
          <?php }else{?>
          <li><a class="btn btn-signin" href="<?=site_url('Employee/login')?>">Sign In</a></li>
          <?php }?>
          <?php if($this->session->userdata('uid')){
                     		   $StockhomeUrl=site_url('users/portfolio');
						   }
						   else{?>
							   
						   <?php }?>
          
        </ul>
      </div>
    
    
    
    </div>  
    
      <div class="clearfix"></div>
      
    </div>
    <!--/.container--> 
    
  </nav>
  <!--/nav-->
   <div class="clearfix"></div>
  <div class="container-box "> 
    <!--                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                </div>-->
    
    <div class="collapse navbar-collapse navbar-right m-bottom-50">
      <ul class="nav  navbar-nav-2 ">
      	
       
          <?php if(!$this->session->userdata('uid')){?>
      
        <?php }?>
        <li><a href="<?=site_url('Employee/about')?>">About</a></li>
        <li><a href="<?=site_url('Employee/contactus')?>">Contact</a></li>
      </ul>
    </div>
  </div>
  <!--/.container--> 
  
</header>
<!--/header--> 
