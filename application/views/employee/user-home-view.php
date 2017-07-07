<?php include_once 'header.php';?>
<link rel="stylesheet" href="<?=base_url('assets/css/dhtmlxscheduler.css')?>">
<section id="blog">
  <div class="container"> 
    <!--<div class="center wow fadeInDown">
      <h2>
       
      </h2>
    </div>-->
    
    <div class="blog">
      <div class="row">
        <div class="col-md-80">
          <div class="blog-item">
            <div class="row">
              <div class="col-md-80"> 
                	<h1>Task List</h1>
                <br/>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-80 outerc">
                <div id="scheduler_here" class="dhx_cal_container">
                  <div class="dhx_cal_navline">
                    <div class="dhx_cal_prev_button">&nbsp;</div>
                    <div class="dhx_cal_next_button">&nbsp;</div>
                    <div class="dhx_cal_today_button"></div>
                    <div class="dhx_cal_date"></div>
                    <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
                    <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
                    <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
                     <div class="dhx_cal_tab" name="agenda_tab" style="right:280px;"></div>
                  </div>
                  <div class="dhx_cal_header"> </div>
                  <div class="dhx_cal_data"> </div>
                </div>
              </div>
            </div>
          </div>
          <!--/.blog-item--> 
        </div>
        <!--/.col-md-8--> 
        
      </div>
    </div>
  </div>
  <!--/.container--> 
</section>
<!--/about-us-->
<style type="text/css" media="screen">
 

</style>
<script src="<?=base_url('assets')?>/js/dhtmlxscheduler.js"></script> 
<script src="<?=base_url('assets')?>/js/dhtmlxscheduler_readonly.js"></script> 
<script src="<?=base_url('assets')?>/js/dhtmlxscheduler_agenda_view.js"></script> 
<script>
	function init() {
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		scheduler.config.show_loading = true;
		scheduler.init('scheduler_here',new Date(),"week");
		//scheduler.config.details_on_create = true;		
		scheduler.config.details_on_dblclick = true;
		scheduler.locale.labels.section_employee = "Employee";		
		var employee_opts = <?php echo json_encode($Employee)?>; 
		scheduler.locale.labels.section_select = 'Milestone';
		var milestone_opts = <?php echo json_encode($Milestoelist)?>; 
			
		scheduler.config.lightbox.sections = [	
			{name:"description", height:200, map_to:"text", type:"textarea" , focus:true},
			{ name:"select", height:40, map_to:"milestone", type:"select", options:milestone_opts},
			{name:"employee", height:21, map_to:"employee", type:"select", options:employee_opts},
			{name:"time", height:72, type:"time", map_to:"auto"}	
		];
		scheduler.setLoadMode("month");
		scheduler.load("<?=site_url('Employee/taskManagement')?>","json");
		function block_readonly(id){
			if (!id) return true;
			return !this.getEvent(id).readonly;
		}
		scheduler.attachEvent("onBeforeDrag",block_readonly)
		scheduler.attachEvent("onClick",block_readonly)
		
		//var dp = new dataProcessor("<?=site_url('Employee/taskManagement')?>");
		//dp.init(scheduler);
		}
	
	$(document).ready(function(e) {
		$("#scheduler_here").width($(".outerc").width());
		$("#scheduler_here").height($("body").innerHeight()+150);
		init();
		});
  

</script>
<?php include_once 'footer.php';?>
