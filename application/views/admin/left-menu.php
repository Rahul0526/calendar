<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets')?>/images/Logo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('name')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
          <li>
            <a  href="<?=site_url('Admin/')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
         </li>
         
         <li>
            <a  href="<?=site_url('Admin/OrderHIstory')?>">
            <i class="fa fa-dashboard"></i> <span>Order History</span>
            </a>
         </li>   
           
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Plans</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a  href="<?=site_url('plans/')?>"><i class="fa fa-circle-o"></i> Plan List</a></li>
            <!--<li><a  href="<?=site_url('plans/featureslist')?>"><i class="fa fa-circle-o"></i>Plan Features List</a></li>
            <li><a  href="<?=site_url('plans/addfeatures')?>"><i class="fa fa-circle-o"></i>Add Plan Features</a></li>-->
            <li><a  href="<?=site_url('plans/newPlan')?>"><i class="fa fa-circle-o"></i> Add Plan</a></li>
            </ul>
        </li>
       
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('charts/index')?>"><i class="fa fa-circle-o"></i> Chart list</a></li>
            <li><a href="<?=site_url('charts/addChart')?>"><i class="fa fa-circle-o"></i> Add Chart</a></li>
            
          </ul>
        </li>-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a  href="<?=site_url('Admin/users')?>"><i class="fa fa-users"></i> User List</a></li>
<!--            <li><a href=""><i class="fa fa-circle-o"></i> Users</a></li>-->
            
          </ul>
        </li>
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
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?=site_url('page/view/1/Home_content')?>"><i class="fa fa-circle-o"></i> Home Page Content</a></li>
           <!--<li><a href="<?=site_url('page/view/1/Home_content_after_login')?>"><i class="fa fa-circle-o"></i>Home content after login</a></li>-->
            <li><a href="<?=site_url('page/view/1/about')?>"><i class="fa fa-circle-o"></i> About us Content</a></li>
            <!--<li><a href="<?=site_url('page/view/1/chart_list')?>"><i class="fa fa-circle-o"></i> Chart List Content</a></li>
            <li><a href="<?=site_url('page/view/1/definitions')?>"><i class="fa fa-circle-o"></i> Definitions Content</a></li>
            <li><a href="<?=site_url('page/view/1/blog')?>"><i class="fa fa-circle-o"></i> Investment Blog Content</a></li>
            <li><a href="<?=site_url('page/view/1/portfolio')?>"><i class="fa fa-circle-o"></i> Portfolio Content</a></li>-->
            <li><a href="<?=site_url('page/view/1/privacy_policy')?>"><i class="fa fa-circle-o"></i> Privacy Policy Content</a></li>
          <!--  <li><a href="<?=site_url('page/view/1/request_chart')?>"><i class="fa fa-circle-o"></i>Request Charts  Content</a></li>
            <li><a href="<?=site_url('page/view/1/sources')?>"><i class="fa fa-circle-o"></i> Source Content</a></li>-->
           <!-- <li><a href="<?=site_url('page/view/1/stock_picker')?>"><i class="fa fa-circle-o"></i> Stock Picker Content</a></li>-->
           <!-- <li><a href="<?=site_url('page/view/1/term_of_services')?>"><i class="fa fa-circle-o"></i> Term Of Service Content</a></li>-->
            <li><a href="<?=site_url('page/view/1/term_of_use')?>"><i class="fa fa-circle-o"></i> Term Of Use Content</a></li>
            <li><a href="<?=site_url('page/view/1/How_to_Reach_Us')?>"><i class="fa fa-circle-o"></i> How to Reach Us</a></li>
            <!--<li><a href="<?=site_url('page/view/1/tech_indicators')?>"><i class="fa fa-circle-o"></i> Technical Indicator</a></li> 
            <li><a href="<?=site_url('page/view/1/Stock_Heading')?>"><i class="fa fa-circle-o"></i> Stock Heading</a></li>-->
          </ul>
          </li>
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