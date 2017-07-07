<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar"> 
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar"> 
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image"> <img src="<?=base_url('assets')?>/images/Logo.png" class="img-circle" alt="User Image"> </div>
      <div class="pull-left info">
        <p>
          <?=$this->session->userdata('name')?>
        </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a> </div>
    </div>
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li> <a  href="<?=site_url('Company/')?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>
      <li><a  href="<?=site_url('Company/profile')?>"><i class="fa fa-circle-o"></i>Profile</a></li>
      <li class="treeview"> <a href="#"> <i class="fa fa-users"></i> <span>Employees</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a  href="<?=site_url('Company/users')?>"><i class="fa fa-users"></i> Employee List</a>
          <li><a href="<?=site_url('Company/addUser')?>"><i class="fa fa-circle-o"></i>Add Employee</a></li>  
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-users"></i> <span>Milestones</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a  href="<?=site_url('Company/milestones')?>"><i class="fa fa-users"></i> Milestones List</a>
          <li><a href="<?=site_url('Company/addMilestones')?>"><i class="fa fa-circle-o"></i>Add Milestones</a></li>  
        </ul>
      </li>
      <li><a  href="<?=site_url('Company/paymenthistory')?>"><i class="fa fa-dollar"></i>Payment History</a></li>
      <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>-->
     
      <li class="treeview"> 
        <!-- <a href="#">
            <i class="fa fa-files-o"></i> <span>Import CSV</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>--> 
        <!--<ul class="treeview-menu">
            <li><a href="<?=site_url('ImportCSV/companyStats')?>"><i class="fa fa-circle-o"></i> Company Stats</a></li>
            <li><a href="<?=site_url('ImportCSV/stock')?>"><i class="fa fa-circle-o"></i> Stock</a></li>
            <li><a href="<?=site_url('ImportCSV/stockReport')?>"><i class="fa fa-circle-o"></i> Stock Reports</a></li>
            <li><a href="<?=site_url('ImportCSV/stockStatus')?>"><i class="fa fa-circle-o"></i> Stock Status</a></li>
            <li><a href="<?=site_url('ImportCSV/stockHistorical')?>"><i class="fa fa-circle-o"></i> Stock Historical</a></li>
            <li><a href="<?=site_url('ImportCSV/dateDim')?>"><i class="fa fa-circle-o"></i> Date Dim</a></li>
            <li><a href="<?=site_url('ImportCSV/dailyChange')?>"><i class="fa fa-circle-o"></i> Daily Change</a></li>
            <li><a href="<?=site_url('ImportCSV/weeklyChange')?>"><i class="fa fa-circle-o"></i> Weekly Change</a></li>
            <li><a href="<?=site_url('ImportCSV/monthlyChange')?>"><i class="fa fa-circle-o"></i> Monthly Change</a></li>
            <li><a href="<?=site_url('ImportCSV/quarterlyChange')?>"><i class="fa fa-circle-o"></i> Quarterly Change</a></li>
            <li><a href="<?=site_url('ImportCSV/yearlyChange')?>"><i class="fa fa-circle-o"></i> Yearly Change</a></li>
          </ul>--> 
      </li>
    </ul>
  </section>
  <!-- /.sidebar --> 
</aside>
