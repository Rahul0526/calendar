<?php
include_once 'header.php';
include_once 'left-menu.php';
?>
<link rel="stylesheet" href="<?=base_url('assets/css/dhtmlxscheduler.css')?>">
<div class="content-wrapper">
  <section class="content">
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
              <div class="dhx_cal_tab" name="agenda_tab" style="right:280px;"></div>
              <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
            </div>
            <div class="dhx_cal_header"> </div>
            <div class="dhx_cal_data"> </div>
          </div>
       
      </div>
    </div>
  </section>
</div>
<style type="text/css" media="screen">
  html, body{
		margin:0px;
		padding:0px;
		height:100%;
		overflow:hidden;
	}	

</style>
<script src="<?=base_url('assets')?>/js/dhtmlxscheduler.js"></script> 
<script src="<?=base_url('assets')?>/js/dhtmlxscheduler_agenda_view.js"></script> 
<script>
	function init() {
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		scheduler.config.show_loading = true;
		scheduler.init('scheduler_here',new Date(),"week");
		scheduler.config.details_on_create = true;		
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
		scheduler.load("<?=site_url('company/taskManagement')?>","json");
		
		var dp = new dataProcessor("<?=site_url('company/taskManagement')?>");
		dp.init(scheduler);
		
		scheduler.attachEvent("onEventSave",function(id,ev,is_new){
			//console.log(ev.milestone);
			if (!ev.text) {
				alert("Description must not be empty");
				return false;
			}
			
			if (ev.milestone==0) {
				alert("Milestone must not be empty");
				return false;
			}
			
			if (ev.employee==0) {
				alert("Employee must not be empty");
				return false;
			}
			
		 return true;
		});
		
		
		
		dp.attachEvent("onAfterUpdate", function(id,ev){
			//any custom logic here
			location.reload();
		});
		
		
	}
	$(document).ready(function(e) {
		$("#scheduler_here").width($(".outerc").width());
		$("#scheduler_here").height($("body").innerHeight()-150);
		init();
		});
  

</script>
<?php
include_once 'footer.php';
?>