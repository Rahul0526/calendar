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
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <?php if($this->session->userdata('uid')){
                     $homeUrl=site_url('users/myHome');
                   }
                   else{
                      $homeUrl=site_url('/home');
                   }
?>
        <input type="hidden" value="<?=site_url()?>" id="site_url" />
        <a class="navbar-brand" href="<?=$homeUrl?>">STOCKSREALLY.COM</a><br />
        <span class="text-primary text-bold">charts | data | analysis for today's investor</span> </div>
      <div class=" navbar-right">
        <ul class="nav navbar-nav">
          <?php if($this->session->userdata('uid')){?>
          <li class="dropdown "> <a href="<?=$homeUrl?>" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i>
            <?=$this->session->userdata('name')?>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?=site_url('users/profile')?>">Profile</a></li>
              <li><a href="<?=site_url('users/mycharts')?>">My Charts</a></li>
              <li ><a href="<?=site_url('users/setting')?>">Setting</a></li>
              <li><a href="<?=site_url('users/logout')?>">Logout</a></li>
              <li class="small"><a >Last Login-
                <?=date("M d Y h:s", strtotime($this->session->userdata('last_login')))?>
                </a></li>
            </ul>
          </li>
          <?php }else{?>
          <li><a class="btn btn-signin" href="<?=site_url('/login')?>">Sign In</a></li>
          <?php }?>
          <?php if($this->session->userdata('uid')){
                     		   $StockhomeUrl=site_url('users/portfolio');
						   }
						   else{
							    $StockhomeUrl=site_url('/plan');
						   }?>
          <li><a class="btn btn-followUs" href="<?=$StockhomeUrl?>">Follow A Stock</a></li>
        </ul>
      </div>
    </div>
    <!--/.container--> 
    
  </nav>
  <!--/nav-->
  
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
      	<li><a href="<?=site_url('/welcome/techIndicators')?>">Technical Indicators</a></li>
        <li><a href="<?=site_url('/charts')?>">Charts List</a></li>
        <li><a href="<?=site_url('/requestChart')?>">Request Chart</a></li>
        <li><a href="<?=site_url('/blog')?>">Investment Blog</a></li>
        <?php if(!$this->session->userdata('uid')){?>
        <li><a href="<?=site_url('/portfolio')?>">Portfolio</a></li>
        <?php }else{?>
        <li><a href="<?=site_url('users/portfolio')?>">Portfolio</a></li>
        <?php }?>
        <li><a href="<?=site_url('/definitions')?>">Definitions</a></li>
        <li><a href="<?=site_url('/source')?>">Source</a></li>
        
        <li><a  href="<?=site_url('/stockPicker')?>" style="font-weight: bold; color: blue;">StockPicker</a></li>
        
        <li><a href="<?=site_url('/about')?>">About</a></li>
        <li><a href="<?=site_url('/contactus')?>">Contact</a></li>
      </ul>
    </div>
  </div>
  <!--/.container--> 
  
</header>
<!--/header--> 
