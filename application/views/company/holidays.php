<?php
	include_once 'header.php';
	include_once 'left-menu.php';
	if(isset($holidays->weekOffs)) {
		$weekoffs = $holidays->weekOffs;
	} else {
		$weekoffs = "";
	}
?>
<div class="content-wrapper">
	<div class="holidays table">
		<center><h1>Week Off</h1></center>
		<div class="day">
			<input type="checkbox" value="7" class="weekoffs" id="day1" <?=(strpos($weekoffs, "7") !== false) ? "checked" : ""?> />
			<label for="day1"><span>Sunday</span></label>
		</div>
		<div class="day">
			<input type="checkbox" value="1" class="weekoffs" id="day2" <?=(strpos($weekoffs, "1") !== false) ? "checked" : ""?> />
			<label for="day2"><span>Monday</span></label>
		</div>
		<div class="day">
			<input type="checkbox" value="2" class="weekoffs" id="day3" <?=(strpos($weekoffs, "2") !== false) ? "checked" : ""?> />
			<label for="day3"><span>Tuesday</span></label>
		</div>
		<div class="day">
			<input type="checkbox" value="3" class="weekoffs" id="day4" <?=(strpos($weekoffs, "3") !== false) ? "checked" : ""?> />
			<label for="day4"><span>Wednesday</span></label>
		</div>
		<div class="day">
			<input type="checkbox" value="4" class="weekoffs" id="day5" <?=(strpos($weekoffs, "4") !== false) ? "checked" : ""?> />
			<label for="day5"><span>Thursday</span></label>
		</div>
		<div class="day">
			<input type="checkbox" value="5" class="weekoffs" id="day6" <?=(strpos($weekoffs, "5") !== false) ? "checked" : ""?> />
			<label for="day6"><span>Friday</span></label>
		</div>
		<div class="day">
			<input type="checkbox" value="6" class="weekoffs" id="day7" <?=(strpos($weekoffs, "6") !== false) ? "checked" : ""?> />
			<label for="day7"><span>Saturday</span></label>
		</div>
	</div>
	<div class="dhx_cal_navline">
		<div class="dhx_cal_date"></div>
		<div class="dhx_minical_icon" id="dhx_minical_icon" 
		onclick="show_minical()">&nbsp;</div>
	</div>
</div>
<!-- <script src="<?=base_url('assets/js/dhtmlxscheduler.js')?>"></script> -->
<!-- <script src="<?=base_url('assets/js/ext/dhtmlxscheduler_minical.js')?>"></script> -->
<script>
	// function init() {
	// 	scheduler.config.xml_date="%Y-%m-%d %H:%i";
	// 	scheduler.init('scheduler_here',new Date(2017,2,1),"day");
	// 	scheduler.load("./data/events.xml",function(){
	// 		scheduler.renderCalendar({
	// 			container:"mini_here",
	// 			date:scheduler._date,
	// 			navigation:true,
	// 			handler:function(date,calendar){
	// 				dhtmlx.alert(String(date));
	// 			}
	// 		});
	// 	});
	// }
	$(document).ready(function() {
		// init();
		$('.weekoffs').on('change', function() {
			var holidays = "";
			$('.weekoffs:checked').each(function() {
				holidays += holidays == "" ? $(this).val() : ","+$(this).val();
			});
			url = "<?=base_url('Company/addHolidays')?>?days="+holidays;
			// alert(url)
			elem = $(this);
			$.get(url, function(data) {
				if(data == 'error') {
					elem.prop('checked',false);
				}
			});
		});
	});
</script>
<?php
include_once 'footer.php';
?>