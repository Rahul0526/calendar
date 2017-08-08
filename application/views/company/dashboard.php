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
<script src="<?=base_url('assets')?>/js/ext/dhtmlxscheduler_multiselect.js"></script>
<script src="<?=base_url('assets')?>/js/ext/dhtmlxscheduler_editors.js"></script>
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
		scheduler.templates.event_class=function(start, end, event){
			var css = "";
			if(event.subject) // if event has subject property then special class should be assigned
				css += "event_"+event.subject;

			if(event.id == scheduler.getState().select_id) {
				css += " selected";
			}
			return css;
		};

		// creating popup
		var milestones = [];
		controls = [{name:"description", height:200, map_to:"text", type:"textarea" , focus:true}];
		priorityOptions = [,];
		// priorityOptions[0] = {'key':"",'label':""};
		for (var i = 0; i < milestone_opts.length; i++) {
			priorityOptions[i] = {'key':i,'label':i+1};
		}
		$.each(milestone_opts, function(i, value) {
			milestones[value['key']] = value['label'];
			controls.push({name: value['label'], map_to: "milestone"+value['key'], type: "checkbox", checked_value:value['key'], height: 40});
			controls.push({name: value['label'] + " weight", map_to: "weight"+value['key'], type: "textarea", height: 40});
			controls.push({name: value['label'] + " priority", height:30, map_to:"priority"+value['key'], type:"select", options:priorityOptions});
		})

		controls.push({name:"milestones", height:30, map_to:"employee", type:"select", options:milestone_opts});
		controls.push({name:"employee", height:30, map_to:"employee", type:"select", options:employee_opts});
		controls.push({name:"time", height:72, type:"time", map_to:"auto"});

		
		scheduler.config.lightbox.sections = controls;
		scheduler.config.icons_select=["icon_details","icon_delete"]; //removing edit button from event option icons
		scheduler.setLoadMode("month");
		scheduler.load("<?=site_url('company/taskManagement')?>","json");
		var dp = new dataProcessor("<?=site_url('company/taskManagement')?>");
		dp.init(scheduler);
		
		//disable events dragging to prevent accidental update in event
		scheduler.attachEvent("onBeforeDrag", function(id, mode, e){
			return false;
		});
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
			var priorities = ",";
			var _return = true;
			$('.dhx_wrap_section.active:nth-child(3n+1)').each(function() {
				if(_return != false) {
					priority = $(this).find('select').val();
					if(priorities != "," && priority == "") {
						alert("Priority must not be empty.");
						_return = false;
					} else if(~priorities.indexOf(","+priority+",")) {
						console.log(priorities + " - " + priority);
						alert("Two or more milestones must not have same priority");
						_return = false;
					}
					priorities += priority + ",";
				}
			})
			// console.log(ev);
			// return false;
		 return _return;
		});
	    //disabling double click editing on events
		scheduler.attachEvent("onDblClick", function(id,ev){
		    return false;
		});
		// toggle lightbox view for edit and create new
		scheduler.attachEvent("onLightbox",function(id){
		    $('[role="dialog"]').removeClass('edit');
			$('.dhx_cal_larea').find('input[type=checkbox]').each(function() {
				$(this).closest('.dhx_wrap_section').addClass('newEventOption').next().addClass('newEventOption weight').next().addClass('newEventOption priority');
			});
		    var section = scheduler.formSection("time");
			section.control.disabled = false;
		    var milestone = scheduler.getEvent(id)['milestone'];
			if($.trim(milestone) != "") {
			    $('[role="dialog"]').addClass('edit');
			    $('.dhx_wrap_section:nth-last-child(3) select').val(milestone);
   				section.control.disabled = true;
			}
		});
		// reseting lightbox input fields
		scheduler.attachEvent("onAfterLightbox", function (id){
			scheduler.resetLightbox();
			return true;
		});
		// reloading page after adding new events
		dp.attachEvent("onAfterUpdate", function(id,ev){
			location.reload();
		});
	}
	$(document).ready(function(e) {
		$("#scheduler_here").width($(".outerc").width());
		$("#scheduler_here").height($("body").innerHeight()-150);
		init();
		$('.dhx_cal_larea').find('input[type=checkbox]').each(function() {
			$(this).closest('.dhx_wrap_section').addClass('newEventOption').next().addClass('newEventOption weight').next().addClass('newEventOption priority');
		});
		$("body").on("change", ".dhx_wrap_section input[type=checkbox]", function() {
			if($(this).prop('checked') == true) {
				$(this).closest(".dhx_wrap_section").next().addClass('active').next().addClass('active')
			} else {
				$(this).closest(".dhx_wrap_section").next().removeClass('active').next().removeClass('active')
			}
		})
	});
</script>
<?php
include_once 'footer.php';
?>